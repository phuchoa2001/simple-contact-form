<?php 

function scf_handle_form_submission() {
  check_ajax_referer('scf_nonce', 'nonce');

  $name = sanitize_text_field($_POST['name']);
  $email = sanitize_email($_POST['email']);
  $message = sanitize_textarea_field($_POST['message']);

  // Validate email
  if (!is_email($email)) {
      wp_send_json_error('Invalid email address');
  }

  // Here you would typically send an email, but for PoC we'll just return a success message
  wp_send_json_success('Form submitted successfully!');
}
