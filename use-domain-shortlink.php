<?php 
/*
Plugin Name: Use Domain Shortlink (for Twitter Tools)
Plugin URI: http://wordpress.org/extend/plugins/use-domain-shortlink/
Description: Use wp_get_shortlink() to send the site's internal short URL (i.e. http://domain.com/?p=1234) to Twitter. Requires Twitter Tools.
Version: 1.1.2
Author: Ryan Murphy
Author URI: http://2skewed.net
*/

/*
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED `AS IS` AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
*/

function rpm_uds_use_shortlink() {
	//get the post, find the shortlink, and return it
	global $post;
	$shortlink = wp_get_shortlink($post->ID, 'post');
	return $shortlink;
}

//Add admin notices if WP<3.0 or Twitter Tools not installed/activated.
function rpm_uds_setup_notice() {
	if( !function_exists( 'wp_get_shortlink' ) ) {
		echo '<div class="updated fade"><p><strong>Notice:</strong> Use Domain Shortlink requires at least WordPress 3.0. Please <a href="'. get_admin_url().'"update-core.php">update or reinstall</a> if you see this notice.</p></div>';
	}
	if( !is_plugin_active( 'twitter-tools/twitter-tools.php' ) ) {
		echo '<div class="updated"><p><strong>Notice:</strong> It appears that <a href="http://wordpress.org/extend/plugins/twitter-tools/" title="Twitter Tools &laquo; WordPress Plugins">Twitter Tools</a> is not installed. <strong>Use Domain Shortlink</strong> requires Twitter Tools to be <a href="'. get_admin_url().'"plugin-install.php">installed</a> and <a href="'. get_admin_url().'"plugins.php">activated</a> to function.</p></div>';
	}
}

if ( is_admin() ) {
	add_action( 'admin_notices', 'rpm_uds_setup_notice' );
}

//only add the filter if wp_get_shortlink() exists.
if ( function_exists( 'wp_get_shortlink' ) ) {
	add_filter( 'tweet_blog_post_url', 'rpm_uds_use_shortlink' );
}
//EOF