<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package smg
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://newharvestsarang.org/', 'smg' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'smg' ), 'NHM' ); ?></a>
			<br>
			<?php printf( __( 'Made by %1$s.', 'smg' ), '<a href="http://hwangc.com" rel="designer">HwangC</a>' ); ?>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	<nav id="site-navigation" class="smg-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary','container' => false, 'items_wrap' => '<li class="mm-close-menu"><i class="fa fa-times"></i></li><ul id="%1$s" class="%2$s">%3$s</ul>' ) ); ?>
	</nav><!-- #site-navigation -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
