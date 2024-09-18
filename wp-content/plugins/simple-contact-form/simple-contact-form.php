<?php
/*
Plugin Name: Simple Contact Form PoC
Description: A proof of concept for a simple contact form plugin
Version: 0.1
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit;
}

function scf_init() {
    add_action('wp_enqueue_scripts', 'scf_enqueue_scripts');
    add_shortcode('contact_form', 'scf_contact_form_shortcode');
    add_action('wp_ajax_scf_submit_form', 'scf_handle_form_submission');
    add_action('wp_ajax_nopriv_scf_submit_form', 'scf_handle_form_submission');
}
add_action('plugins_loaded', 'scf_init');

// Bao gồm các hàm khác
require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/form-rendering.php';
require_once plugin_dir_path(__FILE__) . 'includes/form-handling.php';