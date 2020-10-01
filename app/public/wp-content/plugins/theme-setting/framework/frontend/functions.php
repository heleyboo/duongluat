<?php
// Check layout setting is boxed or not
if ( !function_exists('is_boxed_layout' ) ) {
    function is_boxed_layout() {
        return ('boxed' === ts_get_option(DefaultSetting::TS_LAYOUT_TYPE));
    }
}

// Get background pattern
if ( !function_exists('get_current_background_pattern' ) ) {
    function get_current_background_pattern() {
        return ts_get_option(DefaultSetting::TS_BACKGROUND_PATTERN);
    }
}