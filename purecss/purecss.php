<?php
/* 
Plugin Name: Pure CSS
Plugin URI: http://purecss.io
Description: Include individual Pure CSS stylesheets
Version: 1.0
Author: Daniel Wichers
Author URI: http://danielwichers.nl
License: GPLv2 or later
*/

// Pure CSS settings
    $purecss_version = "0.3.0";
    $purecss_minified = false;
    $purecss_source = "http://yui.yahooapis.com/pure/";	//cdn
    #$purecss_source = plugin_dir_url( __FILE__ ;	//local

// Pure CSS functions
    function purecss_version() {
	global $purecss_version;
	return $purecss_version;
    }
    
    function purecss_minified() {
	global $purecss_minified;
	if($purecss_minified == true) {
	    return '-min';
	}
    }
    
    function purecss_source() {
	global $purecss_source;
	return $purecss_source;
    }

	// Construct correct path to files
	function purecss_construct_url($purecss_package) {
	    global $purecss_version;
	    global $purecss_minified;
	    global $purecss_source;
	    
	    $purecss_url = $purecss_source;
	    $purecss_url.= $purecss_version;
	    $purecss_url.= '/';
	    $purecss_url.= $purecss_package;
	    $purecss_url.= purecss_minified();
	    $purecss_url.= '.css';
	    
	    return $purecss_url;
	}
/*
Base
*/
function purecss_include_base(){
    if (!is_admin()) {
	wp_register_style('buttons',purecss_construct_url("base"), array(), purecss_version()); 
	wp_enqueue_style('base');
    }
}

/*
Buttons
*/
function purecss_include_buttons(){
    if (!is_admin()) {
	wp_register_style('buttons',purecss_construct_url("buttons"), array(), purecss_version()); 
	wp_enqueue_style('buttons');
    }
}

/*
Forms (Responsive)
*/
function purecss_include_forms_responsive(){
    if (!is_admin()) {
	wp_register_style('forms_responsive',purecss_construct_url("forms"), array(), purecss_version()); 
	wp_enqueue_style('forms_responsive');
    }
}

/*
Forms (Non-Responsive)
*/
function purecss_include_forms(){
    if (!is_admin()) {
	wp_register_style('forms',purecss_construct_url("forms-nr"), array(), purecss_version()); 
	wp_enqueue_style('forms');
    }
}

/*
Grids (Responsive)
*/
function purecss_include_grids_responsive(){
    if (!is_admin()) {
	wp_register_style('grids_responsive',purecss_construct_url("grids"), array(), purecss_version()); 
	wp_enqueue_style('grids_responsive');
    }
}

/*
Grids (Non-Responsive)
*/
function purecss_include_grids(){
    if (!is_admin()) {
	wp_register_style('grids',purecss_construct_url("grids-nr"), array(), purecss_version()); 
	wp_enqueue_style('grids');
    }
}

/*
Menus (Responsive)
*/
function purecss_include_menus_responsive(){
    if (!is_admin()) {
	wp_register_style('menus_responsive',purecss_construct_url("menus"), array(), purecss_version()); 
	wp_enqueue_style('menus_responsive');
    }
}

/*
Menus (Non-Responsive)
*/
function purecss_include_menus(){
    if (!is_admin()) {
	wp_register_style('menus',purecss_construct_url("menus-nr"), array(), purecss_version()); 
	wp_enqueue_style('menus');
    }
}

/*
Tables
*/
function purecss_include_tables(){
    if (!is_admin()) {
	wp_register_style('tables',purecss_construct_url("tables"), array(), purecss_version()); 
	wp_enqueue_style('tables');
    }
}

# add_action('init', purecss_include_base);
# add_action('init', purecss_include_buttons);
add_action('init', purecss_include_forms_responsive);
# add_action('init', purecss_include_forms);
# add_action('init', purecss_include_grids_responsive);
# add_action('init', purecss_include_grids);
# add_action('init', purecss_include_menus_responsive);
# add_action('init', purecss_include_menus);
# add_action('init', purecss_include_tables);
?>