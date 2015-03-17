<?php
/**
 * Sidebar display content - a template part inside sidebar.php
 * Used when file 'sidebar-content-{location}.php' doesn't exist in this child theme.
 * - Using additional 'sidebar-content-{location}.php' examples (see documentation for all):
 * sidebar-content-page.php
 * sidebar-content-single.php
 * sidebar-content-404.php
 * @package Girder child theme for Wonderflux framework
 */
?>

<div class="sidebar-box">

	<h4 class="sidebar-title">Pages</h4>
	<ul>
		<?php wp_list_pages('title_li=' ); ?>
	</ul>

</div>

<div class="sidebar-box">

	<h4 class="sidebar-title">Categories</h4>
	<ul>
		<?php wp_list_categories('show_count=1&title_li='); ?>
	</ul>

</div>

<div class="sidebar-box">

	<h4 class="sidebar-title">Archives</h4>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

</div>