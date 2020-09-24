<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package On_Reading
 */

?>
<div class="container-xl">
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'on-reading' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'on-reading' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'on-reading' ), 'on-reading', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
		<div class="d-block d-sm-none">
			XS
		</div>
		<div class="d-none d-sm-block d-md-none">
			SM
		</div>
		<div class="d-none d-md-block d-lg-none">
			MD
		</div>
		<div class="d-none d-lg-block d-xl-none">
			LG
		</div>
		<div class="d-none d-xl-block">
			XL
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div>
</body>
</html>
