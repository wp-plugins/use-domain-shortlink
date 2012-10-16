<?php 
/*
Plugin Name: Use Domain Shortlink (for Twitter Tools)
Plugin URI: http://wordpress.org/extend/plugins/use-domain-shortlink/
Description: Plugin is no longer needed as of Twitter Tools 3.0. 
Version: 1.1.3
Author: Ryan Murphy
Author URI: http://2skewed.net
*/

/*
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED `AS IS` AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
*/


//Add admin notices if WP<3.0 or Twitter Tools not installed/activated.
function rpm_uds_setup_notice() {
	echo '<div class="updated fade"><p><strong>Notice:</strong> URL shortening for <i>Twitter Tools</i> is now handled by the <i>Social</i> plugin, which already uses the same method as <i>Use Domain Shortlink</i>. Please feel free to delete it, and thank you for using it.</p></div>';
}

if ( is_admin() ) {
	add_action( 'admin_notices', 'rpm_uds_setup_notice' );
}
//EOF