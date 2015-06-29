<?php 
/*
Plugin Name: LS Social Connect
Plugin URI: https://badworldandme.wordpress.com/wordpress/plugins/ls-social-connect/
Description: LSSC (Little Sparrow Social Connect ) is a very easy and simple Plugin for showing your social links like follow us/follow me and share buttons using widget, shortcode & custom admin page.
Version: 1.0.0
Author: Puni Charana
Author URI: https://badworldandme.wordpress.com/about
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
add_action('wp_head','hook_font_awesome_css');
function hook_font_awesome_css(){
	wp_enqueue_style( 'ls-font-awesome-style', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' ); 
}
include_once plugin_dir_path(__FILE__).'/inc/lssc-db.php';
include_once plugin_dir_path(__FILE__).'/inc/lssc-sc.php';
include_once plugin_dir_path(__FILE__).'/inc/lssc-w.php';