<?php
/*
Template Name: SBGI Page - 25/75 Columns
*/


get_header(); ?>


		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			    <?php if (have_posts()) : while (have_posts()) : the_post();?>
			    <div id="sbgfullpage" class="full-width-header parallax6">
			    	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1920, 1449 ), false, '' ); ?> 
			    	<style>
			    	#sbgfullpage {
						background: url(<?php echo $src[0]; ?>) no-repeat;
						background-attachment: fixed;
						background-size: cover;
						
					}  
			    	</style>
			    </div>
			    <div class="container">
			    <div class="row white-band">
			    	<div class="col-lg-12 entry-content">		
			       <h1 class="entry-title jumbo-alt"><?php the_title();?></h1>
			       </div><!--entry-content -->
			        
			        <div class="row sbg-page-content">
			        	<div class="col-md-8">
				          <?php the_field('page_right_col_content'); ?>  
				        </div>
				         <div class="col-md-4">
							<?php the_content('<p class="serif">Read the rest of this page È</p>'); ?>
				        </div>
			        </div>   
				</div>
			    <?php endwhile; endif; ?>
			</div>
			</div>		
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>