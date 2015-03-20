<?php
/**
 * Footer display content - a template part inside footer.php
 * Used when file 'footer-content-{location}.php' doesn't exist in this child theme.
 * - Using additional 'footer-content-{location}.php' examples (see documentation for all):
 * footer-content-page.php
 * footer-content-single.php
 * footer-content-404.php
 * @package Girder child theme for Wonderflux framework
 */
?>

<div class="row" id="footer-content">

	<?php
	/*
	Note the use of Flux Layout CSS rules (sizes are relative to parent container)
	Inside our 'row' we have some divs using the following classes:
	- box-1-4 (1 quarter width)
	- box-1-2 (1 half width)
	- mq-small-min-box-1-1 (At media query 'small' minimum and smaller, go full width)
	- mq-small-box-1-2 (At media query 'small', go 1 half width)
	- mq-tiny-box-1-1 (At media query 'tiny', go full width)

	You can mix and match values if the CSS rule exists, please see Flux Layout
	output in <head> of site for additional CSS rules: wf-css-flux-layout.php
	 */
	?>

	<div class="box-1-4 mq-small-min-box-1-1 footer-primary-left">

		<div class="inside-std">

			<?php
			// Check if we have widgets, if not show different content
			if ( !dynamic_sidebar( 'Footer primary 1' ) ) : 
				echo '<h4>Footer primary 1</h4>';
				echo '<p>I can contain any WordPress widgets instead of this text, which will disappear if you use the Footer primary 1 widget area</p>';
			endif;
			?>

		</div>

	</div>

	<div class="box-1-4 mq-small-box-1-2 mq-tiny-box-1-1 footer-primary-mid">

		<div class="inside-std">

			<?php
			// Check if we have widgets, if not show different content
			if ( !dynamic_sidebar( 'Footer primary 2' ) ) : 
				echo '<h4>Footer primary 2</h4>';
				echo '<p>I can contain any WordPress widgets instead of this text, which will disappear if you use the Footer primary 2 widget area</p>';
			endif;
			?>

		</div>

	</div>

	<div class="box-1-2 mq-small-box-1-2 mq-tiny-box-1-1 footer-primary-right">

		<div class="inside-std">
			<h4>Footer primary right</h4>
			<p>I could contain any content you like - or why not put in a WordPress widget area?</p>
		</div>

	</div>

</div>

<div class="row" id="footer-secondary">
	<div class="inside-std">
		<p><?php wfx_login_logout('');?></p>
	</div>
</div>