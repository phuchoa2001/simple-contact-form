<?php

function scf_enqueue_scripts() {
  wp_enqueue_style('scf-styles', plugins_url('../dist/css/main.css', __FILE__));
  wp_enqueue_script('scf-scripts', plugins_url('../dist/js/main.js', __FILE__));
  wp_localize_script('scf-scripts', 'scf_ajax', array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('scf_nonce')
  ));
}
add_action('wp_enqueue_scripts', 'scf_enqueue_scripts');
