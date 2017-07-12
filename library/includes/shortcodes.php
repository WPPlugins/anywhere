<?php

/**
 * Shortcodes
 */
	add_shortcode( 'anywhere-title', 'anywhere_title_shortcode' );
	add_shortcode( 'anywhere-link', 'anywhere_shortlink_shortcode' );
	add_shortcode( 'twitter-handle', 'anywhere_twitter_handle_shortcode' );


/**
 * @Anywhere title shortcode
 * @since 0.2.4
 */
function anywhere_title_shortcode() {
	return get_the_title();
}

/**
 * @Anywhere short-link shortcode
 * @since 0.2.4
 */
function anywhere_shortlink_shortcode() {
	global $post, $anywhere;
	if ( function_exists( 'twitter_link' ) ) {
		$short = twitter_link();
	} elseif ( function_exists( 'prlipro_pretty_link' ) && ( prlipro_pretty_link() != '' && !is_attachment() ) ) {
		$short = prlipro_pretty_link(); //pretty-link-pro.php (line 1726)
	} elseif ( function_exists( 'minifyshortcode_function' ) ) {
		$short = minifyshortcode_handler(); //pretty-link-pro.php (line 1726)
	} else {
		$ID = get_permalink( $post->ID );
		$url = url_to_postid( $ID );
		if ( is_page() )
			$short = get_bloginfo('url') . '/?page_id=' . $id;
		elseif ( is_attachment() )
			$short = get_bloginfo('url') . '/?attachment_id=' . $id;
		else
			$short = get_bloginfo('url') . '/?p=' . $url;
	}	
	return $short;
}


/**
 * @Anywhere twitter handle shortcode
 * @since 0.2.4
 */
function anywhere_twitter_handle_shortcode() {
	global $anywhere;
	$handle = $anywhere['twitter_handle'];
	
	return $handle;
}

?>