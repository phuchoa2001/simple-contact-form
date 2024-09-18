<?php

function scf_render_form_field($name, $label, $type) {
    ?>
    <div class="scf_c-contact-form__field">
        <label for="scf-<?php echo esc_attr($name); ?>" class="scf_c-contact-form__label"><?php echo esc_html($label); ?></label>
        <?php if ($type === 'textarea'): ?>
            <textarea id="scf-<?php echo esc_attr($name); ?>" name="<?php echo esc_attr($name); ?>" class="scf_c-contact-form__input" required></textarea>
        <?php else: ?>
            <input type="<?php echo esc_attr($type); ?>" id="scf-<?php echo esc_attr($name); ?>" name="<?php echo esc_attr($name); ?>" class="scf_c-contact-form__input" required>
        <?php endif; ?>
    </div>
    <?php
}

function scf_render_form() {
    ?>
    <div class="scf_o-container">
        <form class="scf_c-contact-form scf_js-contact-form" method="post">
            <?php scf_render_form_field('name', 'Name:', 'text'); ?>
            <?php scf_render_form_field('email', 'Email:', 'email'); ?>
            <?php scf_render_form_field('message', 'Message:', 'textarea'); ?>
            <div class="scf_c-contact-form__field">
                <button type="submit" class="scf_c-button scf_c-button--primary">Send</button>
            </div>
        </form>
    </div>
    <?php
}

function scf_contact_form_shortcode() {
    ob_start();
    scf_render_form();
    return ob_get_clean();
}

