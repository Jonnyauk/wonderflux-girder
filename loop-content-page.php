<?php
/**
 * Loop display content for page display
 * @package Girder child theme for Wonderflux framework
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="entry-title"><?php the_title(); ?></h2>

	<div class="entry-content">

		<?php
		the_content('');
		wfx_edit_meta('intro=N&adminlink=N&postcontrols=N&pagecontrols=Nwfcontrols=N&widgetslink=N');
		wp_link_pages( array( 'before' => '<div class="nav-posts">' . __( 'Pages:', 'wfxgirder' ), 'after' => '</div>' ) );
		?>

	</div>

	<?php comments_template( '', true ); ?>

</div>