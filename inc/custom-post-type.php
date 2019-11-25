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

    add_filter('manage_sunlight-contact_posts_columns','sunlight_set_contact_columns'); // manage_WillCtpName_posts_columns
    add_action('manage_sunlight-contact_posts_custom_column', 'sunlight_contact_custom_column', 10, 2);

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

// Colums modified
function sunlight_set_contact_columns($columns){

    $newColums = array();
        $newColums['title'] = 'Full name';
        $newColums['message'] = 'Message';
        $newColums['email'] = 'Email';
        $newColums['date'] = 'Date';

    //unset( $columns['author'] ); author  will remove from lists

    return $newColums;
}

function sunlight_contact_custom_column($column, $post_id){

    switch( $column ){
        case  'message' :
            echo get_the_excerpt();
            break;

        case  'email' :
            echo 'email addresh';
            break;
    }
}