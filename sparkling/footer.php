<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>

	</div><!-- close .container -->
</div><!-- close .main-content -->
	<div id="footer-area">
		<div class="container footer-inner">
			<div class="row">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container">
				<div class="row">
					<div id="logo2" class="col-md-12 logo-area">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
							<img class="company-logo" src="<?php bloginfo( 'template_url' ); ?>/images/sbgi-logo-light.png"  alt="<?php bloginfo( 'name' ); ?>"/>
						</a>
					</div><!-- end of #logo -->
				</div>
				<div class="row">
					<?php sparkling_social(); ?>
					<nav role="navigation" class="col-md-12 footer-navigation">
						<?php sparkling_footer_links(); ?>
					</nav>
				</div>
				<div class="row">
					<div class="copyright col-md-12">
						<?php echo of_get_option( 'custom_footer_text'); ?>
						<?php //sparkling_footer_info(); ?>
					</div>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if ( is_page('tv-channels')) { ?>
<!-- Load scripts for Stations Tiles -->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/inc/js/jquery.isotope.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/inc/js/stations-masonary.js"></script>		
<?php } ?>
<script type='text/javascript' src='<?php bloginfo( 'template_url' ); ?>/inc/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/inc/js/greyscale-functions.js"></script>
<script type='text/javascript' src='<?php bloginfo( 'template_url' ); ?>/inc/js/grayscale.js'></script>

</body>
</html>