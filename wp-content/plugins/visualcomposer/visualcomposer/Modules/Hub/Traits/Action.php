<?php

namespace VisualComposer\Modules\Hub\Traits;

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

use VisualComposer\Helpers\Filters;
use VisualComposer\Helpers\Traits\EventsFilters;

trait Action
{
    use EventsFilters;

    public function __construct()
    {
        $this->addFilter('vcv:hub:process:action:' . $this->actionName, 'processAction');
    }

    protected function processAction($response, $payload, Filters $filterHelper)
    {
        if (!vcIsBadResponse($response) && $payload['data']) {
            $hubHelper = vchelper($this->helperName);
            /** @var $hubHelper \VisualComposer\Helpers\Hub\Bundle */
            $hubHelper->setTempBundleFolder(
                VCV_PLUGIN_ASSETS_DIR_PATH . '/temp-bundle-' . str_replace('/', '-', $payload['action'])
            );
            $hubHelper->removeTempBundleFolder();
            $archive = $hubHelper->requestBundleDownload($payload['data']['url']);
            if (!vcIsBadResponse($archive)) {
                $archive = $this->readBundleJson($archive, $payload);
                $response['status'] = $archive !== false;
                if ($archive) {
                    $response = $filterHelper->fire(
                        'vcv:hub:download:bundle:' . $payload['action'],
                        $response,
                        ['archive' => $archive, 'actionData' => $payload],
                        true
                    );
                }
            } else {
                return false;
            }
            $removeResult = $hubHelper->removeTempBundleFolder();
            if (vcIsBadResponse($removeResult)) {
                return false;
            }
        }

        return $response;
    }

    protected function readBundleJson($archive, $payload)
    {
        $hubHelper = vchelper($this->helperName);
        $loggerHelper = vchelper('Logger');

        /** @var \VisualComposer\Helpers\Hub\Bundle $hubHelper */
        $result = $hubHelper->unzipDownloadedBundle($archive);
        if (vcIsBadResponse($result)) {
            return false;
        }

        if (isset($payload['checksum']) && !empty($payload['checksum'])) {
            $mdOriginalFile = md5_file($archive);
            if ($mdOriginalFile !== $payload['checksum']) {
                $loggerHelper->log(
                    sprintf(
                        __(
                            'A zip file of Visual Composer extension is broken. Checksum check failed. Please check your Internet connection, run Reset in Visual Composer Settings and try again.

If the problem still occurs, visit %smy.visualcomposer.com/support%s for technical assistance.
',
                            'visualcomposer'
                        ),
                        '<a href="https://my.visualcomposer.com/support/?utm=vcwb-editor&utm-source=error-message&utm_campaign=support" target="_blank">',
                        '</a>'
                    )
                );

                return false;
            }
        }

        return $hubHelper->readBundleJson($hubHelper->getTempBundleFolder('bundle.json'));
    }
}
