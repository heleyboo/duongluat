<?php
// function that runs when shortcode is called
function why_vietnam_shortcode() {

// Things that you want to do.
    $message = 'Hello world!';

// Output needs to be return
    return $message;
}
// register shortcode
add_shortcode('whyvn', 'why_vietnam_shortcode');