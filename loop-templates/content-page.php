<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php if (get_field('show_title') == true) { ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php } ?>
	</header>

	<?php echo get_the_post_thumbnail( $post->ID, get_field('featured_image_size') ); ?>

	<div class="entry-content">
        <?php if (get_field('subtitle')) { ?>
            <h6><?php the_field('subtitle'); ?></h6>
        <?php 
        } 
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
