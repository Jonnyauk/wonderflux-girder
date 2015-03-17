<?php
/*

This is an example child theme for the Wonderflux theme framework.

Configure the layout options in admin> Appearance > Wonderflux
Drop by http://wonderflux.com/getting-started for more information.

If you want to create your own child theme for Wonderflux:

1 - Duplicate the whole wfx-girder (this!) directory with all contained files.
2 - Change the name of the directory (the one you duplicated in step 1).
3 - Call your theme something different in style.css (Theme Name: My Theme).
4 - Search and replace text string 'wfxgider' in all files
	to replace the text domain for translation.
5 - You are good to go!


////  CONTENTS
1 - Wonderflux theme building functions
2 - Manipulate Wonderflux from child theme examples
3 - Examples of filtering layout values
4 - Editable WordPress navigation menus
5 - External scripts


////  OTHER NOTES
- Text domain for translation: 'wfxgider'


////  1  //////////// Wonderflux theme building functions


/*
 *
 * Setup some Wonderflux layout options
 *
 */
function my_wfx_layout() {

	// Configure background divs as required
	wfx_background_divs('depth=1&location=site');
	wfx_background_divs('depth=1&location=main');
	wfx_background_divs('depth=2&location=header');
	wfx_background_divs('depth=2&location=footer');

	// Remove the sidebar using filter
	//layout div's adapt automatically - cool!
	//add_filter('wflux_sidebar_1_display', 'wfx__N' );

	// Inserts JQuery and Cycle Javascript
	//Configure using file js/cycle/jquery.cycle.config.js
	// Removed - need to make responsive with Cycle2 upgrade
	//wfx_js_cycle('config=theme');

}
add_action('get_header', 'my_wfx_layout', 1);


/*
 * Defines and inserts widget area using the Wonderflux display hook system
 * Set "location" parameter to 'my_custom_theme_code' to stop auto-insertion
 * IMPORTANT - if you use 'my_custom_theme_code' location, you must insert this
 * using standard WordPress theme code for your widgets to show in your theme!
 *
 */
function my_wfx_widgets() {

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
				"containerclass" => "box-1-1 widget-box widget-box-above-content",
				"titlestyle" => "h2"
			)

		)
	);

}
add_action( 'wp_loaded', 'my_wfx_widgets' );


////  2  //////////// Manipulate Wonderflux from child theme examples


/*
 * EXAMPLE 1 - ADDING A FILTER
 * Core Wonderflux functionality can be filtered from child theme
 *
 */
function my_wfx_filter_my_wf_functions() {
	// Appears at the bottom of the page as a HTML comment (view source)
	return 'Designed by me! Powered by WordPress and the Wonderflux theme framework - GPL ROCKS!';
}
add_filter( 'wflux_comment_code_credit', 'my_wfx_filter_my_wf_functions' );


/*
 * EXAMPLE 2 - REMOVING A CORE WONDERFLUX FUNCTION (Remove comment to activate)
 * Displays sizing configuration as comment in <head> of document output
 *
 */
function my_wfx_unhook_core_functions() {
	remove_action('wf_head_meta', 'wfx_display_css_info');
}
//add_action('init','my_wfx_unhook_core_functions');


/**
 *
 * Adds additional responsive CSS classes via Wonderflux filters
 * to sidebar and main content
 * @param  [string] [$input] Core Wonderflux CSS classes
 * @return [string] normal classes+new RWD CSS class
 *
 */
function my_wfx_filter_layout_responsive( $input ){

	return $input . ' mq-small-min-box-1-1';

}
add_filter( 'wflux_sidebar_1_with_content_1', 'my_wfx_filter_layout_responsive' );
add_filter( 'wflux_content_1_with_sidebar_1', 'my_wfx_filter_layout_responsive' );


/*
 * EXAMPLE 3 - REPLACING A CORE WONDERFLUX FUNCTION (Remove comment to activate)
 * By using the same function name as used in the Wonderflux functions.php file,
 * we can override the existing core Wonderflux function. Often filters will be
 * your best choice for tasks like this rather than replacing whole function.
 *
 * Wonderflux also is fully OOP structured for more advanced modification,
 * please see Wonderflux source files for more information (wf-includes directory)
 *
 */
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


////  3  //////////// Examples of filtering layout values


/*
Un-comment the code below to override the options set in admin > Wonderflux > Stylelab
NOTE THAT FILTERS ALWAYS TAKE PRIORITY over saved admin options
*/


/**
 *
 * Insert primary navigation in a fancy way by hooking into layout
 * outside of main container (for full screen width)
 * NOTE: Won't render a menu if not set (or menu is empty)
 * in admin > Appearance > Menus / Manage locations
 *
 */
// function my_wfx_size_sidebar() { return 'quarter'; }
// function my_wfx_size_content() { return 'three_quarter'; }
// add_filter('wflux_sidebar_1_size', 'my_wfx_size_sidebar');
// add_filter('wflux_content_1_size', 'my_wfx_size_content');


////  4  //////////// Editable WordPress navigation menus


/*
Menus will not show automatically unless you configure them in:
admin > Appearance > Menus > Manage locations

WordPress normally defaults to showing all of your page links when a menu
is not configured. This theme will simply not show anything - much neater!
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
 * Insert primary navigation in a fancy way by hooking into layout
 * outside of main container (for full screen width)
 * NOTE: Won't render a menu if not set (or menu is empty)
 * admin > Appearance > Menus / Manage locations
 *
 */
function my_wfx_insert_primary_nav() {

	// Setup menu data
	// Check if it has been set or is empty - no-one likes showing all links!
	$this_menu = wp_nav_menu(
		array(
			'container_class'	=> 'header-navigation clearfix',
			'menu_id'			=> 'primary-header-nav', /*Need to add ID to target for slicknav.js*/
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
 * Insert footer navigation by using a Wonderflux hook
 * Could be removed and just inserted straight into template file as normal
 * NOTE: Won't render a menu if not set (or menu is empty)
 * Admin > Appearance > Menus / Manage locations
 *
 */
function my_wfx_insert_footer_nav() {

	// Setup menu data
	// Check if it has been set or is empty - no-one likes showing all links!
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


////  5  //////////// External scripts


/**
 *
 * Register all additional CSS
 * You could register further files here
 *
 */
function my_wfx_register_files() {

	wp_register_style(
		'g-font-1',
		'http://fonts.googleapis.com/css?family=Signika',
		'',
		'1.0',
		'screen, projection'
	);

}
add_action( 'wp_enqueue_scripts', 'my_wfx_register_files' );


/**
 *
 * Enqueue all additional CSS
 * You could enqueue further files here
 *
 */
function my_wfx_enqueue_files() {

	// Signika Google font
	wp_enqueue_style( 'g-font-1' );

}
add_action( 'wp_enqueue_scripts', 'my_wfx_enqueue_files' );


/**
 *
 * Enqueue all js... do it!
 *
 */
function mywfx_enqueue_scripts() {
	wp_enqueue_script( 'slicknav', WF_THEME_URL . '/js/jquery.slicknav.min.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'theme-js', WF_THEME_URL . '/js/functions.js', array( 'jquery' ), '100', true );
}

add_action( 'wp_enqueue_scripts', 'mywfx_enqueue_scripts' );
?>