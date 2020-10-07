<?php

add_filter('ts_setting_items', 'register_theme_setting_items');

function register_theme_setting_items($items) {
    $skins = array();

    for ($i = 1; $i <= 7; $i++) {
        $skins['skin-' . $i] = get_template_directory_uri() . '/spa/images/skins/skin' . $i . '.png';
    }

    $items[] = array (
        'title' => 'Contact Info',
        'icon' => 'dashicons-admin-appearance',
        'items' => array(
            array(
                'header' => 'Basic Information',
                'options' => array (
                    array(
                        "name"		=> __( 'Company Name', 'duongluat' ),
                        "id"		=> Setting::COMPANY_NAME,
                        "type"		=> InputType::TYPE_TEXT,
                    ),
                    array(
                        "name"		=> __( 'Office Address', 'duongluat' ),
                        "id"		=> Setting::OFFICE_ADDRESS,
                        "type"		=> InputType::TYPE_TEXT,
                    ),
                    array(
                        "name"		=> __( 'Email', 'duongluat' ),
                        "id"		=> Setting::EMAIL,
                        "type"		=> InputType::TYPE_TEXT,
                    ),
                    array(
                        "name"		=> __( 'Phone Number', 'duongluat' ),
                        "id"		=> Setting::PHONE_NUMBER,
                        "type"		=> InputType::TYPE_TEXT,
                    ),
                    array(
                        "name"		=> __( 'Google Map URL', 'duongluat' ),
                        "id"		=> Setting::MAP_URL,
                        "type"		=> InputType::TYPE_TEXT,
                    ),
                )
            )
        )
    );

    return $items;
}
