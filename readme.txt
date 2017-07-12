=== Anywhere ===
Contributors: austyfrosty
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CN9BU5LAYCXV8
Tags: twitter, api, admin, javascript, hovercards, linkify, anywhere, @anywhere, tweetbox
Requires at least: 2.7
Tested up to: 3.2
Stable tag: trunk


== Description ==

Adds Twitter @anywhere javascript code to your blog, 
enabling `Hovercards` and `linkification` of @usernames.

**In order to use @anywhere, you must first register for a free API key with Twitter. You can do so at: [http://dev.twitter.com/apps](http://dev.twitter.com/apps)**

**New in version `0.3`**
Allows for different shortlink uses. Can use:
1. [Twitter friendly links](http://wordpress.org/extend/plugins/twitter-friendly-links/)
2. [Pretty Link](http://austinpassy.com/pretty-link/)
3. [Minify Link](http://wordpress.org/extend/plugins/minifylink/)


== Installation ==

Follow the steps below to install the plugin.

1. Upload the `anywhere` folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings/anywhere to edit your settings.


== Frequently Asked Questions ==

= Why create this plugin? =
I created this plugin to allow for easy integration of [@anywhere](http://dev.twitter.com/anywhere/).

= I think i want to uninstall but... =
Be sure to click the uninstall script that you **manually** add a value to `define( 'UNINSTALL_ANYWHERE', '' )` on line 29. That means `1` OR like this: `define( 'UNINSTALL_ANYWHERE', '1' )`. After that run the script and all options should be uninstalled. 
** THIS SCRIPT IS NO LONGER IN PLACE ** *simply uninstall and delete ;)*


== Screenshots ==

1. Admin options panel in `0.1`

2. Custom tweetbox &amp; hovercards


== Changelog ==

= Version 0.3.4 (3/30/11) =

* Dashboard widget updated.

= Version 0.3.3 (3/15/11) =

* Securuty fixes.
* removed javascript(s) uless on singular page.

= Version 0.3.2 (2/24/11) =

* Removed javscript link causing hang-ups.

= Version 0.3.1 (2/9/11) =

* Updated the feed parser to comply with deprecated `rss.php` and use `class-simplepie.php`

= Version 0.3  = 
* Updated shortcodes to use [Twitter friendly links](http://wordpress.org/extend/plugins/twitter-friendly-links/), [Pretty Link](http://austinpassy.com/pretty-link/) or
[Minify Link](http://wordpress.org/extend/plugins/minifylink/).

= Version 0.2.7  = 
* Array slice error fix

= Version 0.2.6  =  

* changes uninstall script (only necassary for WP<3).
* Moved HTML

= Version 0.2.5.1 =  

* Added missing `else` where pages are filtered out.

= Version 0.2.5 =  

* Added ability to place the tweetbox: before, after or manually

= Version 0.2.4.1 =  

* Fixed show/hide error in jQuery, admin settings
* Cleaned up code


= Version 0.2.4 =  

* Added custom "content box"
* Bug fix: replaced `the_title()` with `get_the_title()`
* Added your twitter handle field
* Content box allows for shortcode input
* Added custom shortcodes

= Version 0.2.3 =  

* Fixed incorrect closing tag

= Version 0.2.2 =  

* Added author link love + removal option
* Fixed compatibility with dashboard widget

= Version 0.2.1 =  

* Changed CSS ID's
* Removed double `&quot;`
* Cleaned up admin HTML
* Changed conflicting script names

= Version 0.2 =  

* Remove twitter javascript from wp-admin.
* Fixed options shown when API key not entered.
* Added new jQuery rules.
* Added new CSS rules.
* Fixed missing `&quot;` in settings page.

= Version 0.1.1 =  

* Added in some admin jQuery.
* Working on implementing a `tweetbox` *coming in version `0.2`.

= Version 0.1 =  

* Initial release.


== Upgrade Notice ==

= 0.2.5.1 =
Important, missing `else` removed page content

= 0.2 =
Cleaned up settings with jQuery and CSS.
Added the tweetbox (tweet from your site)

= 0.1 =
No need to upgrade, just install.