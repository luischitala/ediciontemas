<?php
// Nuevo rol
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
            'publish_posts' => true,
            'delete_posts' => true,
            'edit_published_posts' => true,
        ]
        );
};

//add the wporg_simple_role
add_action('init', 'add_role_desarrollador');