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

        $output = '';

        if($categories):

            foreach ($categories as $category) {

                if($output){
                    $output .= ', ';
                }

                $output .= '<a href="'.esc_url( get_category_link($category->term_id) ).'" alt="'.esc_attr('View All  Posts in %s', $category->name).'">'.esc_html($category->name).'</a>';
            }
            endif;

        return '<span class="posted-on">  Posted <a href="'.esc_url( get_permalink() ).'"> '.$posted_on.' </a>  ago</span> /
                <span class="posted-in"> '. $output .' </span>';
    }




    function sunlight_posted_footer(){

        $comments_num = get_comments_number();

        if(comments_open()){
            if($comments_num == 0){
                $comments = __('No Comments');
            }elseif($comments_num>1){
                $comments = $comments_num . __('Comments');
            }else{
                $comments = __('1 Comment');
            }
            $comments = '<a href="' . get_comments_link() . '"> ' .$comments. ' <span class="icon-folder-download"></span><a>';
        }else{
            $comments = __('Comments are closed');
        }




        return '<div class="post-footer-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-6"> ' . get_the_tag_list('<div class="tag-list"><span class="icon-profile sunset-tag"></span> ',' ' , '</div>') . ' </div> 
                            <div class="col-12 col-sm-6"> ' .$comments. '  </div> 
                        </div> 
                    </div>
                 </div>';
    }



function sunlight_get_attachment(){

    $output = '';
    if( has_post_thumbnail() ):
        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    else:
        $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => 1,
            'post_parent' => get_the_ID()
        ) );
        if( $attachments ):
            foreach ( $attachments as $attachment ):
                $output = wp_get_attachment_url( $attachment->ID );
            endforeach;
        endif;

        wp_reset_postdata();

    endif;

    return $output;
}
