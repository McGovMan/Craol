<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );

function enqueue_parent_theme_style() {

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
//ADD TO CALENDAR CSS
function add_to_calendar_style() {

    wp_enqueue_style('atc-style', 'http://addtocalendar.com/atc/1.5/atc-style-blue.css');

}

add_action('wp_enqueue_scripts', 'add_to_calendar_style');

//ADD GOOGLE MAPS SCRIPTS
function google_map_scripts() {
    wp_enqueue_script( 'google-map', '//maps.googleapis.com/maps/api/js?key=AIzaSyA1oXI8EynVbFrt8VA8FZ7T30HtG0S9NiM', array(), '3', true );
    wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri().'/library/js/google-maps.js', array('google-map', 'jQuery'), '0.1', true );
}

add_action( 'wp_enqueue_scripts', 'google_map_scripts' );

function addtomap_scripts() {
    wp_enqueue_script( 'addtocalendar-init', get_stylesheet_directory_uri().'/library/js/addtocalendar.js', '0.1', true );
}

add_action( 'wp_enqueue_scripts', 'addtomap_scripts' );

function footer_signup_widget_init() {
    register_sidebar( array(
        'name' => __( 'Footer Signup', 'footersignup' ),
        'id' => 'footer-signup',
        'before_widget' => '<div class="container" id="footer-signup">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'footer_signup_widget_init' );

// Add google maps api key
function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyA1oXI8EynVbFrt8VA8FZ7T30HtG0S9NiM';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function course_countdown_date(){

    $courseDate = '<script>
                    jQuery.get( "http://limitlesshealth.ie/crossfit-fundamentals/sign-up/", function( data ) {
                      console.log (new Date((jQuery(data).find("#course-countdown").attr("data-end-timestamp")*1000)));
                    });</script>';
    echo "{$courseDate}";
}

add_shortcode('countdown-date', 'course_countdown_date');

require_once( __DIR__ . '/includes/single-station-shortcodes.php'); //include all shortcodes for single station template
require_once( __DIR__ . '/includes/single-event-shortcodes.php'); //include all shortcodes for single template