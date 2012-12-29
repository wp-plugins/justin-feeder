<?php
/*
Plugin Name: JustIn Feeder
Plugin URI: http://www.blogtogo.de/
Description: Via Shortcode Content in einen Artikel oder eine Seite einfügen, der nur wahlweise nur im Feed oder auch nicht im Feed angezeigt wird.
Author: Marcel Schmilgeit
Version: 1.0.0
Author URI: http://www.blogtogo.de
*/

define("WPAPPBOX_PLUGIN_NAME", 'JustIn Feeder'); 
define("WPAPPBOX_PLUGIN_VERSION", '1.0.0');
define("PLUGIN_BASE_DIR", basename(dirname(dirname(__FILE__))));		


function JustInFeeder_add_buttons($buttons) {
	array_push($buttons, "separator", "JustinFeeder_Button");
	return $buttons;
}


function JustInFeeder_register($plugin_array) {
	$plugin_array["justinfeeder"] = plugins_url('btn.js', __FILE__);
	return $plugin_array;
}


function JustInFeeder_shortcode_infeed($atts, $content = null) {
	if(is_feed()) { return $content; }
}


function JustInFeeder_shortcode_notinfeed($atts, $content = null) {
	if(!is_feed()) { return $content; }
}


add_shortcode('infeed', 'JustInFeeder_shortcode_infeed');
add_shortcode('notinfeed', 'JustInFeeder_shortcode_notinfeed');
 
add_filter('mce_external_plugins', "JustInFeeder_register");
add_filter('mce_buttons', 'JustInFeeder_add_buttons', 0);

?>