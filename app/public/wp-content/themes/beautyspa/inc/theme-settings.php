<?php

add_filter('ts_setting_items', 'register_theme_setting_items');

function register_theme_setting_items($items) {
    $skins = array();

    for ($i = 1; $i <= 7; $i++) {
        $skins['skin-' . $i] = get_template_directory_uri() . '/spa/images/skins/skin' . $i . '.png';
    }

    $items[] = array (
        'title' => 'Styles',
        'icon' => 'dashicons-admin-appearance',
        'items' => array(
            array(
                'header' => 'Theme skin',
                'options' => array (
                    array(
                        "name"		=> __( 'Skin', 'beautyspa' ),
                        "id"		=> "ts_theme_skin",
                        "type"		=> InputType::TYPE_IMAGESELECT,
                        "options"	=> $skins
                    ),
                )
            )
        )
    );

    return $items;
}
