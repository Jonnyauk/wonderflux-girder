<?php
/**
 * Loop display content when viewing a category
 * @package Wonderflux Girder child theme
 */
?>

<div id="post-<?php the_ID(); ?>" <?php wfx_post_class(''); ?>>

	<div class="entry-title">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Read %s', 'wfxgirder' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>

	</div>


	<div class="entry-content">

		<p><?php wfx_excerpt('limit=20'); ?></p>

		<?php wfx_perma_img('img=button-read-more-alt-sml.png&width=100&height=20'); ?>

	</div>

</div>