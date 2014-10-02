<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SMG
 */
?>

				</div><!-- #content -->

				<footer id="colophon" class="site-footer" role="contentinfo">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'smg' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'smg' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'smg' ), 'SMG', '<a href="http://hwangc.com" rel="designer">HwangC</a>' ); ?>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->

			</div><!-- /scroller-inner -->
		</div><!-- /scroller -->
	</div><!-- /pusher -->
</div><!-- /container -->


<?php wp_footer(); ?>

</body>
</html>
