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











	?>