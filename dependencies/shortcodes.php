<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

function irongforce_shortcode_function($atts) {
    // Retrieve the job board token value from the settings page
    $gjl_job_board = get_option('gjl_job_board');

    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'job_board' => $gjl_job_board, // Set the default value to the value from the settings page
        ),
        $atts,
        'irongforce'
    );

    // Retrieve the 'job_board' parameter
    $job_board = $atts['job_board'];

    // Check if 'job_board' is provided
    if (empty($job_board)) {
        // If 'job_board' is not provided, return a warning message
        return '<p style="color: red; text-align: center;">Please add the "job_board" attribute to the [irongforce_light] shortcode or set it in the Iron gForce settings page.</p>';
    }

    // Construct the Greenhouse HTML and script
    $output = '<div id="grnhse_app"></div>';
    $output .= '<script src="https://boards.greenhouse.io/embed/job_board/js?for=' . esc_attr($job_board) . '"></script>';

    return $output;
}

// Register the shortcode with WordPress
add_shortcode('irongforce_light', 'irongforce_shortcode_function');
