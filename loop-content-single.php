<?php
/**
 * Loop display content for a single post
 * @package Girder child theme for Wonderflux framework
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="entry-title"><?php the_title(); ?></h2>

	<div class="entry-content">

		<?php
		the_content('');
		wp_link_pages( array( 'before' => '<div class="nav-posts">' . __( 'Pages:', 'wfxgirder' ), 'after' => '</div>' ) );
		wfx_edit_meta('intro=N&adminlink=N&postcontrols=N&pagecontrols=Nwfcontrols=N&widgetslink=N');
		?>

	</div>

	<div class="meta-content">

		<?php
		echo '<p class = "meta">Posted in: ' . get_the_category_list( ', ' );
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			echo ' | ';
			echo '<p class = "meta">Tagged with: ' . $tag_list . '</p>';
		}
		echo '<p>' . 'Written by ' . ucwords(get_the_author_link()) . '</p>';
		?>

	</div>

	<?php comments_template( '', true ); ?>

	<div id="nav-posts" class="navigation">
		<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wfxgirder' ) . '</span> %title' ); ?></div>
		<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wfxgirder' ) . '</span>' ); ?></div>
	</div>

</div>