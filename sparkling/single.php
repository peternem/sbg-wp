<?php
/**
 * The Template for displaying all single posts.
 *
 * @package sparkling
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php 
			$PostTypeName =  get_post_type( get_the_ID() ); 
			
			if ($PostTypeName == "people") {
				get_template_part( 'content', 'sbgpost' );
			} elseif ($PostTypeName == "history") {
				get_template_part('content', 'history');
			} elseif ($PostTypeName == "pr-news") {
				get_template_part('content', 'prnews');
			} else {
				get_template_part( 'content', 'single' );
			}
			?>
			<?php// sparkling_post_nav(); ?>
			
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>