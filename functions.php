<?php

/*
In this file you will find some examples of what can be done with a Wonderflux child theme.

If you want to create your own child theme for Wonderflux:
1) Duplicate the wonderflux-girder (this!) directory and all files
2) Change directory name
3) Call your theme something different in style.css
4) You are good to go!
*/

/*
CONTENTS
1 - Setup main layout css
2 - Configure some Wonderflux functionality
3 - Configure theme setup using Wonderflux theme building functions
4 - Manipulate Wonderflux from child theme examples
*/

////  1  //////////// Setup main layout css

// Uncomment the code below if you wish to override the options set in the admin area - filters always take priority! 

// function my_wfx_size_sidebar() { return 'quarter'; }
// function my_wfx_size_content() { return 'three_quarter'; }
// add_filter('wflux_sidebar_1_size', 'my_wfx_size_sidebar');
// add_filter('wflux_content_1_size', 'my_wfx_size_content');


////  2  //////////// Configure some Wonderflux functionality


// No add_action required on the my_wfx_layout function below, it is already hooked up for you ready to go!
function my_wfx_layout() {

	// Configure background divs as required
	wfx_background_divs('depth=1&location=site');
	wfx_background_divs('depth=1&location=main');
	wfx_background_divs('depth=3&location=header');
	wfx_background_divs('depth=2&location=footer');

	add_filter('wflux_sidebar_1_display', 'N');

	// Insert IE6 PNG fix
	wfx_ie6_png('location=footer');

	// Insert the Cycle JQuery plugin and supporting files
	// 'config' argument allows use of custom cycle configuration file in wonderflux-girder/js/cycle/jquery.cycle.config.js
	wfx_js_cycle('config=theme');

}


////  3  //////////// Configure theme setup using Wonderflux theme building functions


// IMPORTANT - Just include everything you need for Wonderflux child theme setup in one function
function my_wfx_theme_config() {

	// wfx_widgets() defines and inserts your widget area in one function using the Wonderflux display hook system
	// Supply the "location" parameter the value "my_custom_theme_code" to stop the auto-insertion
	// IMPORTANT - if you use "my_custom_theme_code" location, you must insert this using standard WordPress theme code for your widgets to show in your theme!
	wfx_widgets(
		array (

			/* All parameters */
			array (
				"name" => "Above sidebar",
				"description" => "Drag widgets here to be shown below the sidebar on all pages.",
				"location" => "wfsidebar_before_all",
				"container" => "div",
				"containerclass" => "widget-box",
				"titlestyle" => "h4",
				"titleclass" => "sidebar-title",
				"before" => "",
				"after" => ""
			),

			/* Simpler example */
			array (
				"name" => "Below homepage sidebar",
				"description" => "Drag widgets here to be shown below the sidebar on just the homepage.",
				"location" => "wfsidebar_after_home",
				"titleclass" => "sidebar-title",
				"containerclass" => "widget-box",
				"titlestyle" => "h4"
			),

			/* Even simpler example! */
			array (
				"name" => "Above content",
				"location" => "wfloop_before",
				"description" => "Drag widgets here to be shown above all content.",
				"containerclass" => "widget-box-main-content"
			),

			/* Another widget */
			array (
				"name" => "Below content",
				"location" => "wfloop_after",
				"description" => "Drag widgets here to be shown below all content."
			)

		)
	);

}
// Do Wonderflux theme setup helper function
add_action( 'wp_loaded', 'my_wfx_theme_config' );


////  4  //////////// Manipulate Wonderflux from child theme examples


////  EXAMPLE 1 - ADDING A FILTER


// Core functionality can be filtered from child theme - allowing us to change and manipulate stuff easily while still keeping the original functionality intact.
function my_wfx_filter_my_wf_functions() {
	// Just a simple text string to appear at the bottom of the page in the code as a HTML comment (view source)
	return 'Designed by me! Powered by WordPress and the Wonderflux theme framework - GPL ROCKS!';
}
// 'wflux_comment_footer_credit' is the name of the item setup for filtering
add_filter( 'wflux_comment_code_credit', 'my_wfx_filter_my_wf_functions' );


////  EXAMPLE 2 - REMOVING A CORE WONDERFLUX FUNCTION (Remove comment to activate)


// Example of removing a function called in the core Wonderflux theme code
// If you want to remove more, simply add them to the my_wf_unhook_core_functions below, no need to create more functions!
function my_wfx_unhook_core_functions() {

	// 'wf_display_css_info' is a core Wonderflux display function
	// It displays the current design configuration as set under Wonderflux -> Style Lab options in admin area
	// Visit the site and 'view source' to see sizing configuration other important information
	// Shown as comment in <head> of document output
	remove_action('wf_head_meta', 'wfx_display_css_info');
}
add_action('init','my_wfx_unhook_core_functions');


////  EXAMPLE 3 - REPLACING A CORE WONDERFLUX FUNCTION


// By using the same name as used in the Wonderflux functions.php file, we can over-ride the existing core Wonderflux function
// Often filters will be your best choice, but if you really want to do something fancy, you can using this method
// UNCOMMENT OUT TO USE wfx_display_head_title creates the <TITLE></TITLE> tag content in your page output
/*
function wfx_display_head_title() {

	$this_title = esc_attr( get_bloginfo( 'title', 'display' ) );
	$this_desc = esc_attr( get_bloginfo( 'description', 'display' ) );

	$output = '<title>';
	$output .= $this_title.' - All about '.$this_desc;
	$output .= '</title>';

	echo $output;

}
*/
?>