<?php
	/**
	 * Plugin Name: ScanCircle
	 * Plugin URI: https://wordpress.org/plugins/scancircle
	 * Description: Shortcode for the scan widget on ScanCircle partner websites. Only for registered ScanCircle partners.
	 * Version: 2.0
	 * Note: IMPORTANT *** always keep this version number in sync with the one in the function below ***
	 * Author: Arnoud Klaren
	 */
	add_shortcode('scancircle', 'scancircle_handler');

	function scancircle_handler( $atts ) {
		// *** IMPORTANT: always keep this version number in sync with the one in the header above ***
		$version = '2.0';
		$options = '?plugin=WordPress'.$version;
		$partner = '';
		$language = 'en';
		$secure = 's';
		$env = '';
		$deps = array();
		foreach($atts as $key => $val) {
			switch($key) {
				case 'partner':
					$partner = $val;
					break;
				case 'language':
					$language = $val;
					break;
				case 'https':
					if($val === '0') $secure = '';
					break;
				case 'env':
					$env = $val;
					break;
				case 'speedometer':
					$deps[] = 'jquery';
					// do not break
				default:
					$options .= '&amp;'.$key.'='.rawurlencode($val);
			}
		}

		if(!$partner) return '*** ERROR: ScanCircle shortcode without partner parameter ***';
		
		wp_enqueue_script('scancircle-script',
			"http$secure://$partner.scancircle.com$env/$language/scancircle.js$options", 
			$deps, NULL, true);

		return <<< EOL
<div id="scancircle">
	<a href="http://$partner.scancircle.com$env/$language/scan" id="scancircle_button" title="ScanCircle Scan">ScanCircle</a>
</div>
EOL;
	}

	add_shortcode('scancircle_results', 'results_handler');

	function results_handler( $atts ) {
		$partner = '';
		$param = '';
		$attribs = '';
		foreach($atts as $key => $val) {
			switch($key) {
				case 'partner':
					$partner = $val;
					break;
				case 'param':
					$param = $val;
					break;
				default:
					if(strtolower($key) != 'src') $attribs .= ' '.$key.'='. htmlentities($val);
			}
		}
		if(!$partner || !$param) return 'Syntax: [scancircle_results partner="PARTNER-CODE" param="URL-PARAMETER" [IFRAME-ATTRIBUTES]]';
		if(!preg_match('/^[a-z0-9]+$/i', $partner)) return 'Invalid partner code: '.$partner;
		if(!isset($_GET[$param])) return 'Missing URL-parameter: '.$param;
		if(!filter_var($url = $_GET[$param], FILTER_VALIDATE_URL)) return 'Invalid URL: '.htmlentities($url);
		if(!preg_match('/^https?:\/\/'.$partner.'\.scancircle\.com\//i', $url)) return "Only valid for ScanCircle URL's for partner: ".$partner;
		return '<iframe src="'.$url.'"'.$attribs.'></iframe>';
	}

	add_shortcode('phpvar', 'phpvar_handler');

	function phpvar_handler( $atts ) {
		extract( shortcode_atts( array(
			'get' => '',
			'post' => '',
			'server' => ''
		), $atts ) );

		if($get)	return $_GET[$get];
		if($post)	return $_POST[$post];
		if($server)	return $_SERVER[$server];
		return 'Syntax: [phpvar get|post|server="var"]';
	}
