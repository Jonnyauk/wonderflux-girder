<?php
/*

A demonstration responsive child theme for the Wonderflux WordPress theme framework (requires Wonderflux version 2 minimum)
Could be used as a starter child theme, take a look at the code - lots of comments for you to learn how to use Wonderflux!
REQUIRES the free, Open Source Wonderflux theme framework - available from https://github.com/Jonnyauk/Wonderflux
PLEASE view readme file for more info.


////  CONTENTS
1 - Wonderflux theme building functions
2 - Manipulate Wonderflux from child theme examples
3 - Editable WordPress navigation menus
4 - External scripts


////  OTHER NOTES
- Text domain for translation: 'wfx-girder'


/*
	  #
	 ##
	# #
	  #
	  #
	  #
	#####

	Wonderflux theme building functions

*/


/**
 *
 * Wonderflux debug functionality
 * Uncomment this (and be logged in as admin level user) to turn on debug mode in Wonderflux.
 * 1) Reveals all hooks in layout
 * 2) New menu under top admin menu - Wonderflux > Files in use - shows template files and source
 *
 */
//define( 'WF_DEBUG', true );


/**
 *
 * Setup some Wonderflux layout options
 *
 */
function my_wfx_layout() {

	// Configure background divs as required
	wfx_background_divs('depth=1&location=site');
	wfx_background_divs('depth=1&location=main');
	wfx_background_divs('depth=2&location=header');
	wfx_background_divs('depth=3&location=footer');

	// Remove the sidebar using filter
	//layout div's around main content adapt automatically - cool!
	//add_filter('wflux_sidebar_1_display', 'wfx__N' );

	// Inserts JQuery and Cycle Javascript
	//Configure using file js/cycle/jquery.cycle.config.js
	// Removed - need to make responsive with Cycle2 upgrade
	//wfx_js_cycle('config=theme');

}
add_action('get_header', 'my_wfx_layout', 1);


/**
 *
 * Defines and automatically inserts widget areas using the Wonderflux display hook system.
 * If no 'location' set, you insert widget area as normal in theme file.
 *
 */
function my_wfx_widgets() {

	wfx_widgets(
		array (

			/* All parameters - hooked into wfsidebar_before_all, so no template code */
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

			/* Special - hooked into wfsidebar_after_home, so no template code */
			array (
				"name" => __( 'Below homepage sidebar', 'wfxgider' ),
				"description" => __( 'Drag widgets here to be shown below the sidebar, ONLY on the homepage.', 'wfxgider' ),
				"location" => "wfsidebar_after_home",
				"titleclass" => "sidebar-title",
				"containerclass" => "widget-box",
				"titlestyle" => "h4"
			),

			/* Special - hooked into wfloop_after_found_posts_home, so no template code */
			array (
				"name" => __( 'Below content', 'wfxgider' ),
				"location" => "wfloop_after_found_posts_home",
				"description" => __( 'Drag widgets here to be shown below the main content, ONLY on the homepage.', 'wfxgider' ),
				"containerclass" => "box-1-1 widget-box widget-box-below-content",
				"titlestyle" => "h2"
			),

			/* Simple example - no auto insertion (no $location param) so have to put standard WP code in footer to appear */
			array (
				"name" => __( 'Footer primary 1', 'wfxgider' ),
				"description" => __( 'Drag widgets here to be shown in the footer area (small left area)', 'wfxgider' ),
				"titleclass" => "sidebar-title",
				"containerclass" => "widget-box",
				"titlestyle" => "h4"
			),

			/* Simple example - no auto insertion (no $location param) so have to put standard WP code in footer to appear */
			array (
				"name" => __( 'Footer primary 2', 'wfxgider' ),
				"description" => __( 'Drag widgets here to be shown in the footer area (small right area)', 'wfxgider' ),
				"titleclass" => "sidebar-title",
				"containerclass" => "widget-box",
				"titlestyle" => "h4"
			)

		)
	);

}
add_action( 'widgets_init', 'my_wfx_widgets' );


/*
	 #####
	#     #
	      #
	 #####
	#
	#
	#######

	Manipulate Wonderflux from child theme examples

*/


/**
 *
 * EXAMPLE 1 - ADDING A FILTER
 * Core Wonderflux functionality can be filtered from child theme
 *
 */
function my_wfx_filter_my_wf_functions() {
	// Appears at the bottom of the page as a HTML comment (view source)
	return 'Designed by me! Powered by WordPress and the Wonderflux theme framework - GPL ROCKS!';
}
add_filter( 'wflux_comment_code_credit', 'my_wfx_filter_my_wf_functions' );


/**
 *
 * EXAMPLE 2 - ADDING A FILTER
 * Adds additional responsive CSS classes via Wonderflux filters to sidebar and main content
 * @param  [string] [$input] Core Wonderflux CSS classes
 * @return [string] existing classes+new RWD CSS class
 *
 */
function my_wfx_filter_layout_responsive( $input ){
	return $input . ' mq-small-min-box-1-1';
}
add_filter( 'wflux_sidebar_1_with_content_1', 'my_wfx_filter_layout_responsive' );
add_filter( 'wflux_content_1_with_sidebar_1', 'my_wfx_filter_layout_responsive' );


/**
 *
 * EXAMPLE 3 - UNHOOKING A CORE WONDERFLUX FUNCTION
 * Displays sizing configuration as comment in <head> of document output
 * TODO: Core functionality needs updating for Wonderflux v2
 *
 */
function my_wfx_unhook_core_functions() {
	remove_action('wf_head_meta', 'wfx_display_css_info');
}
add_action('init','my_wfx_unhook_core_functions');


 /**
  * EXAMPLE 4 - REPLACING A CORE WONDERFLUX FUNCTION (Remove comment to activate)
  * By using the same function name as used in the Wonderflux functions.php file,
  * we can override the existing core Wonderflux function. Often filters will be
  * your best choice for tasks like this rather than replacing the whole function.
  *
  * Wonderflux also is fully OOP structured for more advanced modification,
  * please see Wonderflux source files for more information (wf-includes directory)
  */
// function wfx_display_head_title() {

// 	$this_title = esc_attr( get_bloginfo( 'title', 'display' ) );
// 	$this_desc = esc_attr( get_bloginfo( 'description', 'display' ) );

// 	$output = '<title>';
// 	$output .= $this_title.' - All about '.$this_desc;
// 	$output .= '</title>';

// 	echo $output;

// }


/**
 * EXAMPLE 5 - FILTER AND CHANGE SIZE DEFINITIONS (Remove comment to activate)
 * Needs updating and checking for Flux Layout (Wonderflux v2)
 *
 * Un-comment the code below to override the options set in admin > Wonderflux > Stylelab
 * NOTE THAT FILTERS ALWAYS TAKE PRIORITY over saved admin options
 */
// function my_wfx_size_sidebar() { return 'quarter'; }
// function my_wfx_size_content() { return 'three_quarter'; }
// add_filter('wflux_sidebar_1_size', 'my_wfx_size_sidebar');
// add_filter('wflux_content_1_size', 'my_wfx_size_content');


/*
	 #####
	#     #
	      #
	 #####
	      #
	#     #
	 #####

	Editable WordPress navigation menus

*/


/*
Menus will not show automatically unless you configure them in:
admin > Appearance > Menus > Manage locations

WordPress normally defaults to showing all of your page links when a menu
is not configured. This theme will simply not show anything - much neater!
*/


/**
 *
 * Setup menus
 *
 */
function my_wfx_register_nav(){
	register_nav_menus( array(
		'primary' => __( 'Primary navigation', 'wfx-girder' ),
		'secondary' => __( 'Secondary navigation', 'wfx-girder' ),
	) );
}
add_action( 'wp_loaded', 'my_wfx_register_nav' );


/**
 *
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
 *
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


/*
	#
	#    #
	#    #
	#    #
	#######
	     #
	     #

	External scripts

*/


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
		null,
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
	$this_theme = wp_get_theme()->get( 'Version' );
	$this_theme = (empty($this_theme)) ? '1.0' : $this_theme;
	wp_enqueue_script( 'slicknav', WF_THEME_URL . '/js/jquery.slicknav.min.js', array( 'jquery' ), $this_theme, true );
	wp_enqueue_script( 'theme-js', WF_THEME_URL . '/js/functions.js', array( 'jquery' ), $this_theme, true );
}

add_action( 'wp_enqueue_scripts', 'mywfx_enqueue_scripts' );
?>