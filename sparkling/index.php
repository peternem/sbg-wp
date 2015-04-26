<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>
	<div id="content" class="main-content-inner <?php echo of_get_option( 'site_layout1' ); ?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<?php if( is_home() ) { ?>
			
			<!-- About Section -->	
			<div id="About" class="row white-band">
				<?php get_template_part('about-index'); ?>
			</div>	
			<!-- News Section -->	
			<div id="News" class="row parallax1 pr-news-band">
  				<?php get_template_part('news-index'); ?>
  			</div>
  			<!-- Investors Section -->			
			<div id="investorsInformation"  class="row white-band">
				<?php get_template_part('Investor-Info-index'); ?>
			</div>
			<!-- WhatWeDo Section -->
			<div id="WhatWeDo" class="row parallax1 blue-band">
				<?php get_template_part('what-we-do-index'); ?>
			</div>
			<!-- Careers Section -->
			<div id="SbgiCareers"  class="row grey-band">
				<?php get_template_part('careers-index'); ?>
			</div>
			<?php } else { ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'content', get_post_format() ); ?>
				
				<?php endwhile; ?>

				<?php sparkling_paging_nav(); ?>
				
				<?php } ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		
		
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>
	</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
<?php get_footer(); ?>