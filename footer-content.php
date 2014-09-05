<?php
/**
 * Footer display content - a template part inside footer.php
 * used when a footer-content-LOCATION.php doesn't exist in this child theme
 * @package Girder child theme for Wonderflux framework
 */
?>

<?php //////// Main full-width footer box start //////// ?>
<div <?php wfx_css('size=full&id=footer-content'); ?>>

	<?php //////// Quarter box start //////// ?>
	<div <?php wfx_css('size=quarter&class=footer-secondary-left'); ?>>

		<div class="box-footer">
			<div class="wfx-cycle slideshow-1">
				<div class="clearfix">
					<h3>Welcome!</h3>
					<p>I am demonstrating the JQuery cycle plugin, which will cycle through divs (see source footer-content.php)</p>
				</div>
				<div class="clearfix">
					<h3>A Demonstration!</h3>
					<p>This is the WFX Girder demonstration child theme for Wonderflux - rockin!</p>
				</div>
				<div class="clearfix">
					<h3>A test!</h3>
					<p>You could put any content you wish here, widgets, display functions, plugins (see source footer-content.php)</p>
				</div>
			</div>
		</div>

	</div>
	<?php //////// Quarter box end //////// ?>

	<?php //////// Quarter box start //////// ?>
	<div <?php wfx_css('size=quarter&class=footer-secondary-right'); ?>>

		<div class="box-footer">
			<p>I could contain any content you like - or why not put in a WordPress widget area?</p>
		</div>

	</div>
	<?php //////// Quarter box end //////// ?>

	<?php //////// Half box start ////////
	/*Note: We have 2 'quarters' above, this is followed by a 'half' below - making a full width row of columns
	  You MUST SET THE PARAMETER "last" to "Y" on the last column in a row when using wfx_css() */
	?>
	<div <?php wfx_css('size=half&class=footer-primary&last=Y'); ?>>

		<div class="box-footer">
			<h3>Some content</h3>
			<p>Here is some more demonstration content for you to edit.</p>
		</div>

	</div>
	<?php //////// Half box end //////// ?>

</div>

<?php //////// Secondary full-width footer box start //////// ?>
<div <?php wfx_css('size=full&id=footer-secondary'); ?>>
		<div class="box-footer">
			<p><?php wfx_login_logout('');?></p>
		</div>
</div>