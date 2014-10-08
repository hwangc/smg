<?php
/**
 * @package SMG
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<section class="paper">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
				<?php smg_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
				if(has_post_thumbnail()) {
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
					echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
					the_post_thumbnail( 'medium', array( 'class' => 'aligncenter' ) );
					echo '</a>';
					// the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) );
				}
			?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'smg' ),
					'after'  => '</div>',
				) );
			?>
			<?php 
				if(function_exists('userpro')) {
					global $userpro_fav;
					echo '<div class="smg_bookmark">';
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
