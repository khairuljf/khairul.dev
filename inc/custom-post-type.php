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

    add_action( 'add_meta_boxes', 'sunlight_contact_add_meta_box' );
    add_action('save_post', 'sunlight_save_contact_email_data');

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

// Colums data show
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

/*Contact meta boxes*/
function sunlight_contact_add_meta_box(){
    add_meta_box('contact_email', 'User Email','sunlight_contact_email_cb' , 'sunlight-contact', 'side', 'default' );
}

// Meta box callback function
function sunlight_contact_email_cb($post){
    wp_nonce_field('sunlight_save_contact_email_data','sunlight_contact_meta_box_nonce');
    $value = get_post_meta($post->ID, '_contact_email_value_key', true  ); // Need must _ before key
    echo '<label for="sunlight_contact_email_field">User Email Adress: </label>';
    echo '<input id="sunlight_contact_email_field" name="sunlight_contact_email_field" type="email"  value="'.esc_attr($value).'" size="30" /> ';
}

// Nonce action function
function sunlight_save_contact_email_data( $post_id ) {


    if( ! isset($_POST['sunlight_contact_meta_box_nonce']) ){
        return;
    }

//    if( ! wp_verify_nonce('sunlight_contact_meta_box_nonce','sunlight_save_contact_email_data') ){
//        return;
//    }

    if( define('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return ;
    }

    if( ! current_user_can('edit_post', $post_id) ) {
        return;
    }

    if( !isset( $_POST['sunlight_contact_email_field'] )){
        return;
    }

    $my_data =  sanitize_text_field( $_POST['sunlight_contact_email_field'] );

    var_dump($my_data);

    update_post_meta($post_id,'_contact_email_value_key',$my_data);
}