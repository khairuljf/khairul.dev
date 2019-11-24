<?php

/*

@package sunlighttheme

	========================
		Custom post type
	========================
*/


$activeContct = get_option( 'active_contact_form' );

if($activeContct){
    add_action('init', 'sunglight_contact_ctp');
}

/*CONTACT CPT*/

function sunglight_contact_ctp(){

    $labels = array(
        'name'             => 'Message',
        'singular_name'    => 'Message',
        'menu_name'        => 'Messages',
        'name_admin_bar'   => 'Message'
    );

    $args = array(
        'labels'           => $labels,
        'show_ui'          => true,
        'show_in_menu'     => true,
        'capability_type'  => 'post',
        'hierarchical'     => false,
        'menu_postion'     =>26,
        'menu_icon'        => 'dashicons-email-alt',
        'supports'         =>array('title', 'editor', 'author')

    );

    register_post_type('sunlight-contact', $args);

}

