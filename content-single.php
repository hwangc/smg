<?php
/**
 * @package SMG
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<header class="entry-header">
			<?php if(!has_post_thumbnail()): ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<?php smg_posted_on(); ?>
			</div> <!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'smg' ),
					'after'  => '</div>',
				) );
			?>
			<?php 
				if(function_exists('userpro') && is_user_logged_in()) {
					global $userpro_fav;

					echo '<div class="smg_bookmark">';
					echo '<div class="sharedaddy"><h3 class="sd-title">Bookmark this:</h3></div>';
					echo $userpro_fav->bookmark();
					echo '</div>';
				}
			 ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php smg_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</section>
</article><!-- #post-## -->
