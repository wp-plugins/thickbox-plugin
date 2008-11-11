<?php
/*
Plugin Name: Shadowbox Plugin 1.0
Plugin URI: http://www.fuego-azul.com/
Feed URI:
Description: Versión 1.0 de Shadowbox Plugin
Version: 1.0
Author: Víctor Simental (vicmx)
Author URI: http://www.fuego-azul.com
*/

/*******************************************************************
*	DON'T EDIT THIS FILE UNLESS YOU KNOW WHAT YOU ARE DOING
*******************************************************************/

// function for outputting styles
function shadowbox_header() {
	$shadowbox_pluginpath = get_settings('siteurl')."/wp-content/plugins/shadowbox-plugin";
	$shadowboxHead = "<link rel=\"stylesheet\" href=\"".$shadowbox_pluginpath."/css/shadowbox.css\" type=\"text/css\" media=\"all\" />\n";
	$shadowboxHead.= "<script type=\"text/javascript\" src=\"".$shadowbox_pluginpath."/js/lib/yui-utilities.js\"></script>\n";
	$shadowboxHead.= "<script type=\"text/javascript\" src=\"".$shadowbox_pluginpath."/js/adapter/shadowbox-yui.js\"></script>\n";
	$shadowboxHead.= "<script type=\"text/javascript\" src=\"".$shadowbox_pluginpath."/js/shadowbox.js\"></script>\n";
	$shadowboxHead.= "<script type=\"text/javascript\">
window.onload = function(){
	Shadowbox.init();
};
</script>\n";
	print($shadowboxHead);
}

function shadowbox_replacer($content)
{
	return preg_replace('/<a(.*?)href=(.*?).(jpg|jpeg|png|gif|bmp|ico)"(.*?)>/i', '<a$1href=$2.$3" $4 rel="shadowbox">', $content);
}

// Output to the <head> section of the page
add_action('wp_head', 'shadowbox_header');
// Run the thickbox replacer upon the content
add_filter('the_content', 'shadowbox_replacer', 2);
?>