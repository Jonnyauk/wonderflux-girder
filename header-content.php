<?php
/**
 * Header display content used as a fallback in all conditions when a header-content-LOCATION.php doesn't exist in this child theme
 * @package Wonderflux Girder child theme
 */
?>

<?php //////// Main full-width header box start //////// ?>
<div <?php wfx_css('size=full&id=header-content'); ?>>

	<?php //////// Three-quarter box start //////// ?>
	<div <?php wfx_css('size=three_quarter&class=header-primary'); ?>>
		<div class="box-header">
			<h1 class="col-light"><a href="<?php echo home_url(); ?>/" title="Return to <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> homepage" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
			<h3 class="col-light"><?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></h3>
		</div>
	</div>
	<?php //////// Three-quarter box end //////// ?>

	<?php //////// Quarter box start ////////
	// Note: We have 2 'quarters' above, this is followed by a 'half' below - making a full width row of columns
	// You need to set the parameter "last" to "Y" on the last column in a row when using wfx_css('')
	?>
	<div <?php wfx_css('size=quarter&class=header-secondary&last=Y'); ?>>
		<div class="box-header">
			<h4 class="col-light">Welcome beta testers! This is the WFX Girder demonstration child theme for Wonderflux - rockin!</h4>
		</div>
	</div>
	<?php //////// Quarter box end //////// ?>

</div>