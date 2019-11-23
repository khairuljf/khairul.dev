<?php

/*
	
@package sunlighttheme
	
	========================
		Theme Support Options
	========================
*/


	$options = get_option( 'post_format' );

	foreach ($options as $option=>$val){
        $output[] = $option;
    }

    if(!empty($options)){
        add_theme_support( 'post-formats', $output  );
    }

    $custom_bg = get_option( 'custom_background' );
    $custom_header = get_option('custom_header');

    if($custom_header){
            add_theme_support( 'custom-header' );
    }
    if($custom_bg){
        add_theme_support( 'custom-background' );
    }











	?>