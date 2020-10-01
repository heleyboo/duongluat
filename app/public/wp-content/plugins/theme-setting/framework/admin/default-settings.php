<?php

add_filter('ts_setting_items', 'register_settings');
function get_background_patterns() {
    $patterns = array();
    for ($i = 1; $i <= 52; $i++) {
        $patterns[$i] = get_plugin_uri() . '/framework/admin/images/pattern' . $i . '.png';
    }
    return $patterns;
}



function register_settings($items) {
    $items[] = array (
        'title' => 'General',
        'icon' => 'dashicons-admin-generic',
        'items' => array(
            array(
                'header' => __('Layout type', 'ts'),
                'options' => array (
                    array(
                        "name"		=> __( 'Layout type', 'beautyspa' ),
                        "id"		=> DefaultSetting::TS_LAYOUT_TYPE,
                        "type"		=> InputType::TYPE_IMAGESELECT,
                        "options"	=> array(
                            "boxed"	=> get_plugin_uri() . '/framework/admin/images/boxed-all.png' ,
                            "full"	=> get_plugin_uri() . '/framework/admin/images/full.png',
                        ),
                    ),
                )
            ),
        )
    );

    $items[] = array (
        'title' => 'Background',
        'icon' => 'dashicons-admin-generic',
        'items' => array(
            array(
                'header' => __('Background pattern', 'ts'),
                'options' => array (
                    array(
                        "name"		=> __( 'Background pattern', 'beautyspa' ),
                        "id"		=> DefaultSetting::TS_BACKGROUND_PATTERN,
                        "type"		=> InputType::TYPE_IMAGESELECT,
                        "options"	=> get_background_patterns(),
                        "image_value" => true
                    ),
                )
            )
        )
    );

    return $items;
}
