=== ScanCircle ===
Contributors: aklaren
Tags: scancircle, scan, widget, button, shortcode
Requires at least: 2.5
Tested up to: 6.6
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Shortcode handler for the scan widget on ScanCircle partner websites.

== Description ==
Only for registered ScanCircle partners. See the [ScanCircle partner program](https://www.scancircle.com/en/scancircle/partner-program).

Login to your ScanCircle partner page and select the Scan Widget tab to generate the required ScanCircle shortcode and copy/paste it into your post.

== Installation ==
Manual installation:

1. Upload the folder `scancircle` to the `/wp-content/plugins/` directory
2. Activate the `scancircle` plugin through the 'Plugins' menu in WordPress
3. Place the `[scancircle ...]` or `[scancircle_results ...]` shortcode in your posts

== Frequently Asked Questions ==
= How can I change the styling of the scan button or the text? =
See [this post](https://www.scancircle.com/forum/showthread.php?tid=154) in the ScanCircle partner forum
= What is the [scancircle_results ...] shortcode for? =
Using this shortcode, you can show the results in an IFRAME on your own website.
1. Set the "Own results page" to e.g. https://domain.com/results?language=%s&advice=%s&reference=%s
2. On this page include the shortcode [scancircle_results partner="PARTNER-CODE" param="URL-PARAMETER" IFRAME-ATTRIBUTES], where 
- PARTNER-CODE is your partner code (this prevents cross site scripting with non-ScanCircle URLs: only http(s)://PARNER-CODE.scancircle.com/... allowed)
- URL-PARAMETER is the URL parameter containing the results URL (in this example "advice")
- IFRAME-ATTRIBUTES are optional IFRAME attributes (e.g. width="X", height="Y")
= Can I use the shortcodes in a template? =
Yes, but you need the do_shortcode function as in: &lt;?php echo do_shortcode('[scancircle...]'); ?>&gt;

== Screenshots ==
1. Scan widget wizard to generate the shortcode with the options you need.

== Changelog ==
= 2.0 - 2020-07-23 =
* Added shortcode [scancircle_results partner="PARTNER-CODE" param="URL-PARAMETERS" IFRAME-ATTRIBUTES]

= 1.43 - 2018-11-14 =
* Load ScanCircle JavaScript using wp_enqueue_script to ensure jQuery is loaded (if needed)

= 1.32 - 2015-12-16 =
* Generalized the plugin to cater for future options so new options do not require a new version of the plugin.
* The `[phpvar]` shortcode has been deprecated as there are standard ways and plugins to do this (functionality will remain for the time being)

= 1.31 - 2015-11-02 =
* For some reason, version 1.27 actually still used v1.24. Updated version number to force a new update and updated support to WP4.3.1.

= 1.27 - 2015-03-23 =
* Changed `https` option to load scancircle.js using HTTPS by default unless https=0 is specified. Link to partner environment always uses HTTP (only used if JavaScript is not loaded correctly)

= 1.24 - 2014-10-13 =
* Load scancircle.js and/or link to partner environment using https, `https` option added to select which: 2=both, 1=JavaScript only, 0=none (default)

= 1.23 - 2014-08-04 =
* `category` option added to indicate the purpose of the scan page and/or reference code, entered data will be prepended to the reference code (separated by a colon)

= 1.20 - 2013-11-18 =
* `inputs` option added to support multiple input fields (names separated by semicolon), entered data will be joined (separated by semicolons)
* `validation` option added to check input field for required data, e-mail address, phone number, any regular expression or using a custom function
* `require` option now deprecated (converted to `prompt` option and `validation="required"` for backward compatibility)
* `jquery` option added to run script when document.ready (mainly for Joomla web sites which requires <script> tag in header)

= 1.19 - 2013-11-04 =
* Added `[phpvar]` shortcode to retrieve the PHP superglobals $_GET, $_POST and $_SERVER
* Required to get the value of URL parameters, post variables, initiating web pages, etc.
* Added because they may be needed for ScanCircle and I could not find an easy way or simple plugin to achieve this

= 1.18 - 2013-10-07 =
* First release

== Upgrade Notice ==
= 1.32 =
* Upgrade if you want to use new options

= 1.31 =
* Upgrade if https does not work by default

= 1.27 =
* Upgrade if you want to use https by default

= 1.24 =
* Upgrade if your website uses https

= 1.23 =
* Only need to upgrade if you want to use the `category` option

= 1.20 =
* Upgrade if you want to validate the data entered into the input field and/or want to use multiple input fields

= 1.19 =
* Only need to upgrade if you need to access PHP variables

= 1.18 =
* First release
