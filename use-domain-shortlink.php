<?php 
/*
Plugin Name: Use Domain Shortlink (for Twitter Tools)
Plugin URI: http://2skewed.net 
Description: Use wp_get_shortlink() to send the site's internal short URL (i.e. http://domain.com/?p=1234) to twitter. Requires Twitter Tools.
Version: 1
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
	//since this only gets fired if Twitter Tools is active, we don't need to check for it.
	//Do I need to check for wp_get_shortlink again though?...
	global $post;
	$shortlink = wp_get_shortlink($post->ID, 'post');
	return $shortlink;
}
function rpm_uds_option_field() { ?>
	<h2>Use Domain Shortlink</h2>
	<?php 
	//check to make sure that the function we rely on is availible. If it is, show the setting field so the user can turn it on.
	if (function_exists( 'wp_get_shortlink' ) ) { ?>
		<p>Check this box if you wish to use the site's internal shortlink (e.g. <?php echo home_url(); ?>/?p=1234, where 1234 is the post's ID).</p>
		<form method='post' action='options.php'>
			<?php settings_fields( 'rpm_uds_setting' ); 
			//we only have one option, so let's not bother with a full blown table ?>
			<p>Enable Internal Shortlink <input type='checkbox' name='rpm_uds_active' <?php if( get_option( 'rpm_uds_active' ) == 'on') echo "checked='checked' "; ?> /></p>
			<p class="submit">
				<input type="submit" class="button-secondary" value="Save Changes" />
			</p>
		</form>
	<?php }
	//if the function we need doesn't exist, tell the user that they need to update WordPress
	else {
	global $wp_version; ?>
	<p>The function this plugin relies on does not exist. This could mean that you are using an outdated version of WordPress, or have an incomplete installation.<br />
	This plugin requires at least WordPress 3.0 in order to function. You are currently using WordPress <?php echo $wp_version; ?>; please consider <a href='<?php echo get_admin_url();?>update-core.php' title='Update WordPress'>updating to the latest version</a>. If you are using WordPress 3.0 or greater, you should <a href='<?php echo get_admin_url();?>update-core.php'>reinstall WordPress</a></p>
	<?php }

}
if ( is_admin() ) {
	add_action( 'aktt_options_form', 'rpm_uds_option_field' );
	add_action( 'admin_init', 'rpm_register_uds_setting' );
}

//only add the filter if the plugin is activated and turned on (via the setting)
if ( get_option( 'rpm_uds_active' ) == 'on' ) {
	add_filter( 'tweet_blog_post_url', 'rpm_uds_use_shortlink' );
}

function rpm_register_uds_setting() {
	register_setting( 'rpm_uds_setting', 'rpm_uds_active' );
}
?>
