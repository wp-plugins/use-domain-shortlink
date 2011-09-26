=== Use Domain Shortlink ===
Contributors: RyanMurphy
Tags: shortlink, twitter tools, domain
Requires at least: 3.0
Tested up to: 3.3
Stable tag: 1.1.1

Use wp_get_shortlink() to send the site's internal short URL (i.e. http://domain.com/?p=1234) to twitter. Requires Twitter Tools.

== Description ==
This plugin hooks into Twitter Tools to use the shortlink that your WordPress powered site already has internally to WordPress (the software). This allows you to keep your brand when tweeting, while not running into the 140 character limit (or at least, that's what we hope). Where is used to tweet the link as `http://your.domain.com/2010/04/this-is-some-funny-or-creative-title/`, it will instead use `http://your.domain.com/?p=1234`, where `1234` is the post's ID that is used internally.

== Installation ==
1. Upload the `Use Domain Shortlink` directory to your `wp-content/plugins/` directory. Alternately, search for 'use domain shortlink' on the Add New Plugin page, and click install.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Enjoy blogging!

== Changelog ==
= 1.1.1 =
 * Adds an Upgrade Notice to the readme, which was an afterthought *right after* tagging 1.1

= 1.1 =
* Removes the single option that the plugin originally had.
* Moves the notice about not using WP 3.0 from the Twitter Tools setting page to an Admin Notice.

= 1.0 =
* Initial release.

== Upgrade Notice ==
* There have been no functional changes to the plugin. There have been changes in the backend, however, so it is recommended that you upgrade, but not required.
