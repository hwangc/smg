<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package SMG
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<section class="paper">	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
				if(function_exists('userpro')) {
					echo do_shortcode('[userpro template=view]');
				} 
			?>
			<?php //the_content(); ?>
			<?php if(is_user_logged_in()): ?>
				<?php 
					// WP_Query arguments
					$args = array (
						'author' => get_current_user_id( ),
					);

					// The Query
					$query = new WP_Query( $args );
				 ?>

				<?php if($query->have_posts()) : ?>
					<h1 style="text-align:center;">The Author's Article</h1>
					<ol>
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<li>
							<a href="<?php the_permalink()?>">
								<?php the_title(); ?>
							</a>
							<?php comments_number( '', '<i class="fa fa-comment-o"></i> 1', '<i class="fa fa-comment-o"></i> %' ); ?>
						</li>
					<?php endwhile; // end of the loop. ?>
					</ol>
				<?php endif; ?>
			<?php endif; ?>
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
