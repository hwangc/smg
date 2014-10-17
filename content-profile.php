<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package SMG
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
				if(function_exists('userpro')) {
					echo do_shortcode('[userpro template=view]');
				} 
			?>
			<?php the_content(); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'smg' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'smg' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</section>
</article><!-- #post-## -->
