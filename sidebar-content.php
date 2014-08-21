<?php
/**
 * Sidebar display content used as a fallback in all conditions when a sidebar-content-LOCATION.php doesn't exist in this child theme
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

<?php wfx_edit_meta('wfcontrols=Y&div=Y&divclass=sidebar-box');?>