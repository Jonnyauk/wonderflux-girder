<?php

/*
In this file you will find some examples of what can be done with a Wonderflux child theme.

I KNOW ITS BORING BUT PLEASE READ the readme.md file in the Wonderflux directory
Wonderflux has a-lot under the hood for you to use and you don't want to miss the goodies do you?
Also drop by http://wonderflux.com/getting-started/ for, well how to get started!

If you want to create your own child theme for Wonderflux:
1 - Duplicate the wfx-girder (this!) folder with all contained files.
2 - Change the name of the folder that holds the theme (the one you duplicated in step 1).
3 - Call your theme something different in style.css (Theme Name: YOUR NEW THEME NAME HERE).
5 - Search and replace 'wfxgider' in all files to replace the text domain for translation.
4 - You are good to go!
*/

/*
CONTENTS
1 - Setup main layout css
2 - Configure some Wonderflux functionality
3 - Configure theme setup using Wonderflux theme building functions
4 - Manipulate Wonderflux from child theme examples
5 - Editable WordPress navigation menus
6 - External scripts
*/

/*
OTHER NOTES
- Text domain for translation: 'wfxgider'
*/

////  1  //////////// Setup main layout css

// Un-comment the code below if you wish to override the options set in the admin area - filters always take priority!

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

	// With this filter you can remove (or conditionally remove) the sidebar
	// Don't worry - the rest of the layout div's adapt to accomodate this automatically - cool!
	//add_filter('wflux_sidebar_1_display', 'N');

	// Insert IE6 PNG fix
	wfx_ie6_png('location=footer');

	// Insert the Cycle JQuery plugin and supporting files
	// 'config' argument allows use of custom cycle configuration file in wfx-girder/js/cycle/jquery.cycle.config.js
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
				"name" => __( 'Above sidebar', 'wfxgider' ),
				"description" => __( 'Drag widgets here to be shown above the sidebar on all pages.', 'wfxgider' ),
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
				"name" => __( 'Below homepage sidebar', 'wfxgider' ),
				"description" => __( 'Drag widgets here to be shown below the sidebar on just the homepage.', 'wfxgider' ),
				"location" => "wfsidebar_after_home",
				"titleclass" => "sidebar-title",
				"containerclass" => "widget-box",
				"titlestyle" => "h4"
			),

			/* Even simpler example! */
			array (
				"name" => __( 'Above content', 'wfxgider' ),
				"location" => "wfloop_before",
				"description" => __( 'Drag widgets here to be shown above all content.', 'wfxgider' ),
				"containerclass" => "widget-box-main-content"
			),

			/* Another widget - as simple as it gets! */
			array (
				"name" => __( 'Below content', 'wfxgider' ),
				"location" => "wfloop_after",
				"description" => __( 'Drag widgets here to be shown below all content.', 'wfxgider' )
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
//add_action('init','my_wfx_unhook_core_functions');


////  EXAMPLE 3 - REPLACING A CORE WONDERFLUX FUNCTION


// By using the same function name as used in the Wonderflux functions.php file, we can over-ride the existing core Wonderflux function
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


////  5  //////////// Editable WordPress navigation menus


/*
The way the menus are inserted means that if you want to remove a menu,
simply go to admin > Appearance > Menus > Manage locations and don't select a menu ('-- Select a Menu --' option)
WordPress normally would then show a navigation with all of your page links in as default.
This theme will simply not show anything - much neater!
*/


/**
 * Setup menus
 */
function my_wfx_add_navigation(){
	register_nav_menus( array(
		'primary' => __( 'Primary navigation', 'wfxgirder' ),
		'secondary' => __( 'Secondary navigation', 'wfxgirder' ),
	) );
}
add_action( 'wp_loaded', 'my_wfx_add_navigation' );


/**
 * Insert primary navigation in a fancy way by hooking into layout outside of main container
 * NOTE: Won't render a menu if not set (or menu is empty) in admin > Appearance > Menus / Manage locations
 */
function my_wfx_insert_primary_nav() {

	// Setup menu data
	// Check if it has been set, or is empty - no-one likes showing all links!
	$this_menu = wp_nav_menu(
		array(
			'container_class'	=> 'header-navigation clearfix',
			'theme_location'	=> 'primary',
			'echo'				=> false,
			'fallback_cb'		=> '__return_false'
		)
	);

	if ( !empty($this_menu) ){
		echo '<div class="wrapper header-navigation-container">';
		echo '<div class="container">';
		echo $this_menu;
		echo '</div>';
		echo '</div>';
	}

}
add_action('wfmain_before_all_container','my_wfx_insert_primary_nav', 2);


/**
 * Insert footer navigation in a simpler way using a Wonderflux hook
 * Function could be removed and just inserted straight into template file as normal
 * NOTE: Won't render a menu if not set (or menu is empty) in admin > Appearance > Menus / Manage locations
 */
function my_wfx_insert_footer_nav() {

	// Setup menu data
	// Check if it has been set, or is empty - no-one likes showing all links!
	$this_menu = wp_nav_menu(
		array(
			'container_class'	=> 'footer-navigation clearfix',
			'theme_location'	=> 'secondary',
			'echo'				=> false,
			'fallback_cb'		=> '__return_false'
		)
	);

	echo ( !empty($this_menu) ) ? $this_menu : '';

}
add_action('wffooter_before_content','my_wfx_insert_footer_nav', 2);


////  6  //////////// External scripts


/**
 *
 * Register all additional CSS
 * You could register further CSS (if absolutely required!) here
 *
 */
function my_wfx_register_css() {

	wp_register_style(
		'g-font-1',
		'http://fonts.googleapis.com/css?family=Signika',
		'',
		'1.0',
		'screen, projection'
	);

}
add_action( 'wp_enqueue_scripts', 'my_wfx_register_css' );


/**
 *
 * Enqueue all additional CSS
 *
 */
function my_wfx_enqueue_css() {

	// Signika Google font
	wp_enqueue_style( 'g-font-1' );

}
add_action( 'wp_enqueue_scripts', 'my_wfx_enqueue_css' );
?>