=== Use Domain Shortlink ===
Contributors: RyanMurphy
Tags: shortlink, twitter tool
Requires at least: 3.0
Tested up to: 3.2
Stable tag: 0.1

Use wp_get_shortlink() to send the site's internal short URL (i.e. http://domain.com/?p=1234) to twitter. Requires Twitter Tools.

== Description ==
This plugin hooks into Twitter Tools to use the shortlink that your WordPress powered site already has internally to WordPress (the software). This allows you to keep your brand when tweeting, while not running into the 140 character limit. Where is used to tweet the link as `http://your.domain.com/2010/04/this-is-some-funny-or-creative-title/`, it will instead use `http://your.domain.com/?p=1234`, where `1234` is the post's ID that is used internally.

== Installation ==
1. Upload the `Use Domain Shortlink` directory to your `wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to your Twitter Tools settings, and enable the option (unlike WordPress Core, I like options. Plus, it gives me a chance to test for the required fuction and prompt users to upgrade WordPress if needed.)
1. There is no 4. Enjoy.

== Frequently Asked Questions ==
= It doesn't work! =
Do you have Twitter Tools installed and activated? Did you enable to UDS option? Are you using WordPress 3.0 or higher?

If you answered 'yes' to all three questions, check your error log for any errors. If there aren't any, feel free to [contact me](http://2skewed.net/contact/).

== Changelog ==
= 1.0 =
* Initial release.
