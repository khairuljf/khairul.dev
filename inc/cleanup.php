<?php
/*

@package sunlighttheme

	========================
		Remove generator version number
	========================
*/

// Remove version string from js & css
function sunlight_remove_wp_version_string( $src){

    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if( !empty( $query['var'] ) && $query['var'] == $wp_version ){
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter('script_loader_src','sunlight_remove_wp_version_string');
add_filter('style_loader_src','sunlight_remove_wp_version_string');

// Remove meta tag
function sunset_remove_meta_version(){
    return '';
}

add_filter('the_generator','sunset_remove_meta_version');