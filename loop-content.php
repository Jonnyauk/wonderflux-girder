<?php
/**
 * Loop display content used as a fallback in all conditions when a loop-content-LOCATION.php doesn't exist in this child theme
 * @package Girder child theme for Wonderflux framework
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Read %s', 'wfxgirder' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>

	<div class="entry-content">

		<?php

		// Content
		the_content('');

		// Edit link
		wfx_edit_meta('intro=N&adminlink=N&postcontrols=N&pagecontrols=Nwfcontrols=N&widgetslink=N');

		?>

	</div>

	<?php
	// Link pages
	wp_link_pages( array( 'before' => '<div class="nav-posts">' . __( 'Pages:', 'wfxgirder' ), 'after' => '</div>' ) );
	?>

</div>


