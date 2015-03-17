<?php
/**
 * Header display content - a template part inside header.php
 * Used when file 'header-content-{location}.php' doesn't exist in this child theme.
 * - Using additional 'header-content-{location}.php' examples (see documentation for all):
 * header-content-page.php
 * header-content-single.php
 * header-content-404.php
 * @package Girder child theme for Wonderflux framework
 */
?>

<?php /* IMPORTANT - Mobile menu gets added to div id="header-content" via slicknav.js */ ?>
<div class="row" id="header-content">

	<?php
	/*
	Note the use of Flux Layout CSS rules (sizes are relative to parent container)
	Inside our 'row' we have some divs using the following classes:
	- box-1-4 (1 quarter width)
	- box-3-4 (3 quarters width)
	- mq-small-min-box-1-1 (At media query 'small' minimum and smaller, go full width)

	You can mix and match values if the CSS rule exists, please see Flux Layout
	output in <head> of site for additional CSS rules: wf-css-flux-layout.php
	 */
	?>

	<div class="box-3-4 mq-small-min-box-1-1 header-primary">
		<h1 class="col-light"><a href="<?php echo home_url(); ?>/" title="Return to <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> homepage" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
		<h3 class="col-light">Welcome beta testers! This is the WFX Girder demonstration child theme for Wonderflux - rockin!</h3>
	</div>

	<div class="box-1-4 mq-small-min-box-1-1 header-secondary">
		<?php get_search_form(); ?>
		<h4 class="col-light"><?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></h4>
	</div>

</div>