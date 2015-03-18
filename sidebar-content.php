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

	<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

		<?php
		$args = array(
			'show_option_none' => __( 'Select category' ),
			'show_count'       => 1,
			'orderby'          => 'name',
			'echo'             => 0,
		);
		?>

		<?php $select  = wp_dropdown_categories( $args ); ?>
		<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
		<?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>

		<?php echo $select; ?>

		<noscript>
			<input type="submit" value="View" />
		</noscript>

	</form>

</div>

<div class="sidebar-box">

	<h4 class="sidebar-title">Archives</h4>

	<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
	  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
	</select>

</div>