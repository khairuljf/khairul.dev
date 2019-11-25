<h1>Sunlight Custom CSS</h1>
<?php settings_errors(); ?>

<form method="post" id="save-cusotm-css" action="options.php" class="user-form">
    <?php settings_fields( 'sunglit-custom-css-option' ); ?>
    <?php do_settings_sections( 'alecaddd_sunlight_css' ); ?>
    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>
