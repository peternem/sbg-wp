<?php
/*
Template Name: SBGI Page - 100 Columns
*/

get_header(); ?>


		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			    <?php if (have_posts()) : while (have_posts()) : the_post();?>
			    <div id="content-title" class="widecolumn page-title row">	
			    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
			    </div>
			    <div id="FeaturedImage" class="widecolumn featured-imag container">		
			        <div class="row">
			        	<div class="col-lg-12">
			        		<?php the_post_thumbnail( 'sparkling-featured', array( 'class' => 'single-featured' )); ?>
			        	</div>
			        </div>
			        <div class="row sbg-page-content">
				        <div class="col-lg-12">
				            <?php the_content('<p class="serif">Read the rest of this page È</p>'); ?>
				        </div>
			        </div>
			        <div class="row">
				        <div class="col-lg-12 edittext">
			         		<?php edit_post_link( __( 'Edit Page', 'sparkling' ), '<span class="edit-link">', ' <i class="fa fa-pencil-square-o"></i></span>' ); ?>
			        	</div>
			        </div>    
				</div>
			    <?php endwhile; endif; ?>
			</div>		
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
