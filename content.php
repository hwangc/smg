<?php
/**
 * @package SMG
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php smg_posted_on(); ?>
		</div><!-- .entry-meta -->
		<div>
			<?php 
			if(!is_singular('page','post' )){
				smg_entry_footer(); 
			}
			?>
		</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if(is_single() || is_page()){
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'smg' ), 
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'smg' ),
				'after'  => '</div>',
			) );
		}
		else {
			the_excerpt();
		}
		?>
	</div><!-- .entry-content -->
	<?php 
	if(is_single() || is_page()) {
		echo '<footer class="entry-footer">';
		smg_entry_footer(); 
		echo '</footer><!-- .entry-footer -->';
	}
	?>
</article><!-- #post-## -->
