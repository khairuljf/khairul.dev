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

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    // Activate nav menu option
    function sunlight_register_nav_menu(){
        register_nav_menu('main_menu','Add menu for header option');
    }

    add_action('after_setup_theme','sunlight_register_nav_menu');


    /**
     *  ========================
        Blog Loop custom function
        ========================
     */

    function sunlight_posted_meta(){

        $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp'));
        $categories = get_the_category();

        $separator =  ',';
        $output = '';

        if(!$categories):

            foreach ($categories as $category) {
                $output .= '<a href="'.esc_url( get_the_category_link($category->term_id) ).'" alt="'.esc_attr('View All  Posts in %s', $category->name).'">'.esc_html( 'View All  Posts in %s', $category->name).'</a>';
            }
            endif;

        return '<span class="posted-on">  Posted <a href="'.esc_url( get_permalink() ).'"> '.$posted_on.' </a>  </span>
                <span class="posted-in"> '. get_the_category(',') .' </span>';
    }

    function sunlight_posted_footer(){
        return 'Tag list & comment list';
    }











?>