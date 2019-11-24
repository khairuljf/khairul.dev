<h1>Sunlight Contact Form</h1>
<?php settings_errors(); ?>


<?php

$profile = esc_attr( get_option( 'profile_image' ) );
$firstName = esc_attr( get_option( 'first_name' ) );


?>
<div class="sunlight-user-preview">
    <div class="sunlight-user">
        <h1><?php //echo $fullName ?></h1>
    </div>
    <div class="sunlight-desc">
        <h2><?php //echo $descriptoin ?></h2>
    </div>
</div>



<form method="post" action="options.php" class="user-form">
    <?php settings_fields( 'sunlight-contact-options' ); ?>
    <?php do_settings_sections( 'sunlight-contact-form' ); ?>
    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>
