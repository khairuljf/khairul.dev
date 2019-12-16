<?php
/**
 * Created by PhpStorm.
 * User: khairul
 * Date: 12/10/2019
 * Time: 3:41 AM
 */


add_action('wp_ajax_nopriv_sunlight_load_more', 'sunlight_load_more');
add_action('wp_ajax_sunlight_load_more', 'sunlight_load_more');

function sunlight_load_more(){

    $pages = $_POST['page'];

    $query =  new WP_Query( array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged'     => $pages+1,
    ) );



    if( $query->have_posts() ):

        while ( $query->have_posts()) : $query->the_post();

            get_template_part('template-parts/content', get_post_format());

        endwhile;
    endif;

    wp_reset_postdata();

    die();
}