<?php
/*
Template Name: SBGI Stations GMAP
*/

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    	 <a class="btn btn-primary pull-right" href="<?php bloginfo( 'url' ); ?>/tv-channels"><i class="fa fa-th"></i><span class="hidden-xs">list view</span></a>
		    </div>
			<?php endwhile; endif; ?>
  			<?php get_template_part('google-map-template'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
