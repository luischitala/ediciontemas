<?php

function add_role_desarrollador()
{
    remove_role('desarrollador');

    add_role(
        'desarrollador',
        'Desarrollador',
        [
            'read' => true,
            'edit_posts' => true,
            'upload_files' => true,

        ]
        );
};

//add the wporg_simple_role
add_action('init', 'add_role_desarrollador');