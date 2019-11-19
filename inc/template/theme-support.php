<?php

/*
	
@package sunlighttheme
	
	========================
		Theme Support Options
	========================
*/


	$options = get_option( 'post_format' );
	$formats = array('aside', 'gallery', 'link', 'image', 'qoute', 'status', 'video', 'audio', 'chat');
		foreach ($formats as $format ) {
		$output[] = ( @$options[$format] == 1 ? $format : '' );

		if(!empty($options)){
			
			add_theme_support( 'post-formats', $output  );

		}

	}





	?>