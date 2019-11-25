<?php

/*
	
@package sunlighttheme
	
	========================
		ADMIN PAGE
	========================
*/

function sunlight_add_admin_page() {
	
	//Generate sunlight Admin Page
	add_menu_page( 'sunlight Theme Options', 'Sunlight', 'manage_options', 'alecaddd_sunlight', 'sunlight_theme_create_page','dashicons-hammer', 110 );

	//Generate sunlight Admin Sub Pages
	add_submenu_page( 'alecaddd_sunlight', 'sunlight Theme Options', 'Settings', 'manage_options', 'alecaddd_sunlight', 'sunlight_theme_create_page');

	//Theme Support parent submenu
	add_submenu_page( 'alecaddd_sunlight', 'Theme Supports', 'Support', 'manage_options', 'theme-support-options','my_theme_support' );

    //Theme Support parent submenu
    add_submenu_page( 'alecaddd_sunlight', 'Contact Form', 'Contact Form', 'manage_options', 'sunlight-contact-form','my_theme_contact_page' );


    //Generate sunlight Admin Sub Pages
	add_submenu_page( 'alecaddd_sunlight', 'sunlight CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunlight_css', 'sunlight_theme_settings_page');

    //Activate custom settings
    add_action( 'admin_init', 'sunlight_custom_settings' );
}

add_action( 'admin_menu', 'sunlight_add_admin_page' );


function sunlight_custom_settings() {
    //My theme General Setting Group
    register_setting( 'sunlight-settings-group', 'profile_image' );
    register_setting( 'sunlight-settings-group', 'first_name' );
    register_setting( 'sunlight-settings-group', 'last_name' );
    register_setting( 'sunlight-settings-group', 'user_description' );
    register_setting( 'sunlight-settings-group', 'twitter','sanitize_twitter' );
    register_setting( 'sunlight-settings-group', 'facebook' );
    register_setting( 'sunlight-settings-group', 'google_plus' );

    // theme General Setting Section
    add_settings_section( 'sunlight-sidebar-options', 'Sidebar Option', 'sunlight_sidebar_options', 'alecaddd_sunlight');

    // theme General Setting Fields

    add_settings_field( 'sidebar-profile', 'Profile Picture ', 'sunlight_sidebar_profile', 'alecaddd_sunlight', 'sunlight-sidebar-options');
    add_settings_field( 'sidebar-name', 'Full Name', 'sunlight_sidebar_name', 'alecaddd_sunlight', 'sunlight-sidebar-options');
    add_settings_field( 'sidebar-desc', 'Descripton', 'sunlight_sidebar_description', 'alecaddd_sunlight', 'sunlight-sidebar-options');
    add_settings_field( 'sidebar-twitter', 'Twitter Profile', 'sunlight_sidebar_twitter', 'alecaddd_sunlight', 'sunlight-sidebar-options');
    add_settings_field( 'sidebar-facebook', 'Facebook Profile', 'sunlight_sidebar_facebook', 'alecaddd_sunlight', 'sunlight-sidebar-options');

    //my theme support setting groupsunlight_sidebar_options
    register_setting( 'theme-support', 'post_format' );
    register_setting('theme-support', 'custom_header');
    register_setting('theme-support', 'custom_background');

    // My theme Support Section
    add_settings_section( 'section_theme_support', 'Customize Your Support Options', 'theme_support_section_cb', 'theme-support-options' );

    // theme Support Setting Fields
    add_settings_field( 'post-formats', 'Post Formats', 'theme_post_format', 'theme-support-options', 'section_theme_support');
    add_settings_field('custom_header_support','Custom Header', 'custom_header_field_cb','theme-support-options','section_theme_support');
    add_settings_field('custom_background', 'Custom background', 'custom_bg_cb', 'theme-support-options', 'section_theme_support');


    // contact form options
    register_setting('sunlight-contact-options', 'active_contact_form');

    add_settings_section('sunglit-contact-section','Active/ Deactive form','sunligt_contact_cb', 'sunlight-contact-form');

    add_settings_field('sunlight-contact-form','Contact Form', 'sunlight_contact_cb','sunlight-contact-form','sunglit-contact-section');

    // custom css opton
    register_setting('sunglit-custom-css-option', 'sunlight_css');

    add_settings_section('sunlight-css-section', '', 'sunlight_custom_css_cb', 'alecaddd_sunlight_css');

    add_settings_field('sunset-css-filed','Enter your own css','sunscet_css_field_cb', 'alecaddd_sunlight_css', 'sunlight-css-section');


}

/**
 * Secction callback functions
 * */
//Theme Support section callback function 
function theme_support_section_cb(){

}

// General Setting section callback function
function sunlight_sidebar_options() {
    echo 'Customize your Sidebar Information';
}

// Header Setting section callback function
function custom_header_section_cb(){
}

//Theme conact form  section callback function
function sunligt_contact_cb(){
}

//custom css secon callback function
function sunlight_custom_css_cb(){
}


/**
 * Input feilds section
 * */

//Theme Support Setting fields
function theme_post_format(){
    $options = get_option( 'post_format' );
    $formats = array('aside', 'gallery', 'link', 'image', 'qoute', 'status', 'video', 'audio', 'chat');
    $output='';
    foreach ($formats as $format ) {
        $checked = ( @$options[$format] ? 'checked' : '' );
        $output .='<label><input type="checkbox"  '.$checked.' name="post_format['.$format.']" value="1"> '.$format.' </label> <br> ';
    }
    echo $output;

}
//Theme Support custom header fields
function custom_header_field_cb(){
    $custom_bg = get_option('custom_background');
    $checkded =  ($custom_bg? 'checked' : '');
    echo '<label><input type="checkbox"  '.$checkded.'  name="custom_background" value="1"> Active custom Backgorund </label>';
}

// Theme support cusotm backgorund fields
function custom_bg_cb(){
    $custom_header = get_option('custom_header');
    $checkded =  ($custom_header? 'checked' : '');
    echo '<label><input type="checkbox"  '.$checkded.'  name="custom_header" value="1"> Active custom header </label>';
}

// Cusotm css filed callback function
function sunscet_css_field_cb(){
    $custom_css = get_option('sunlight_css');
    $custom_css =  ($custom_css? $custom_css : '/* Enter custom css */');

    echo '<div id="customCss" style="position: relative; width: 500px; height: 500px;">'.$custom_css.'</div> <textarea id="sunlight_css" name="sunlight_css" style="display: none;visibility: hidden ">'.$custom_css.'</textarea>';

}

// Contact form field function
function sunlight_contact_cb(){
    $contactForm =  get_option('active_contact_form');
    $checkded =  ($contactForm ? 'checked' : '');
    echo '<label><input type="checkbox"  '.$checkded.'  name="active_contact_form" value="1"> Active contact form </label>';
}

function sunlight_sidebar_profile(){
	$profile = esc_attr( get_option( 'profile_image' ) );

	if(empty($profile )){

		echo '
		  <input type="button" value="Upload Photo" class="button button-secondary" id="upload-photo" >
		  <input type="hidden" name="profile_image" id="profile-picture" value=""/> 
	';
	}
	else{
			echo '
		  <input type="button" value="Replace Photo" class="button button-secondary" id="upload-photo" >
		  <input type="hidden" name="profile_image" id="profile-picture" value="'.$profile.'"/>
		  <input type="button" value="Remove" class="button button-secondary" id="remove-photo">
		 
	';

	}
	
	
}

function sunlight_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />
		  <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />
	';
}

function sunlight_sidebar_description(){
	$descriptoin=esc_attr( get_option( 'user_description' ) );
	echo '<textarea rows="3" cols="50" name="user_description" placeholder="Write about you" >'.$descriptoin.'</textarea>
	<p>Write something about You :)</p>';
}

function sunlight_sidebar_twitter(){
	$twitter_link=esc_attr( get_option( 'twitter' ) );
	echo '<input type="text" value="'.$twitter_link.'" name="twitter" placeholder="Twitter profile link">
	<p>Input the Twtter name without @ Charecter</p>';
}

function sunlight_sidebar_facebook(){
	$facebook_pro= esc_attr(get_option( 'facebook' ));
	echo '<input type="text" name="facebook" value="'.$facebook_pro.'" placeholder="Facebook profile link">';
}


/**
 * sanitize  settings - remove any charector from output
 * */
//
function sanitize_twitter($input){
	// all data will back in here from input from twitter register- setting function
	
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output ); // remove @ from string 
	return $output;


}


/**
 *Menu & Submenu Callback file Functions
 */

// General Callback function
function sunlight_theme_create_page() {
	require_once( get_template_directory() . '/inc/template/sunlight-admin-dashboard.php' );
}

// Theme Support cotnact form function
function my_theme_contact_page(){
    require_once( get_template_directory() . '/inc/template/sunlight-contact-form.php' );
}

// Theme Support Callback function
function my_theme_support(){
	require_once( get_template_directory(). '/inc/template/my-theme-support.php');

}

// Css Callback function
function sunlight_theme_settings_page() {

    require_once( get_template_directory() . '/inc/template/sunlight-custom-css.php' );
	
}

















