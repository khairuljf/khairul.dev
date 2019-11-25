<?php

/*
	
@package sunlighttheme
	
	========================
		Load adminc sript
	========================
*/

function sunlight_load_admin_script( $hook){

	// for different admin page css

	if('toplevel_page_alecaddd_sunlight' == $hook ){
        wp_enqueue_style('sunlight_admin', get_template_directory_uri().'/css/admin.css',  array(), '1.0', $media = 'all');

        wp_enqueue_media();

        wp_enqueue_script('admin_script', get_template_directory_uri().'/js/admin.js',array('jquery'), '1.0.0',  true);

	}elseif ( 'sunlight_page_alecaddd_sunlight_css' == $hook ){
        wp_enqueue_script('aceedit-script', get_template_directory_uri().'/js/ace/ace.js',array('jquery'), '1.0.0',  true);
        wp_enqueue_script('aceactive-script', get_template_directory_uri().'/js/aceEditor.js',array('jquery'), '1.0.0',  true);
    }

	else{
        return ;
    }




}

add_action( 'admin_enqueue_scripts', 'sunlight_load_admin_script' );



