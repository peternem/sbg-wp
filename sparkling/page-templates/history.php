<?php
/*
Template Name: History
*/

get_header(); ?>


	<div id="primary" class="content-area history-bg-pattern parallax6">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    </div>	
		    <div id="content" class="widecolumn page-content row">	
				<div class="post-content">
					<div id="innercontent" class="container">
				        <div class="entrytext">
				            <?php the_content(''); ?>
				        </div>
				        
				    </div>
				</div>
			</div>
		    <?php endwhile; endif; ?>
			
			 <div class="widecolumn page-form our-history">	
				<div id="innercontent" class="container">
						<!-- <div class="row">
							<div class="col-lg-12">
								<h2 class="text-center">History Timeline Content</h2>
							</div>
						</div> -->
						<div class="row">
							<div class="col-lg-12">
								<ul class="timeline">
									<?php $postx_counter = -1; ?>
									<?php foreach(get_tags(array('order' => 'DESC')) as $term){ ?>
										<?php $posts = get_posts( array( 'posts_per_page' => -1, 'post_type' => 'history', 'orderby' => 'title','order' => 'DESC', 'tag__in' => $term->term_id ) ); ?>
										<?php foreach($posts as $post) : ?>
												<?php $postx_counter++; ?>
										        <?php setup_postdata($post); ?>
											<li class="<?php echo  $postx_counter % 2 == 0 ? "timeline-normal" : "timeline-inverted"; ?>">
										        <div class="timeline-badge info"></div>
										        
													<a href="<?php the_permalink(); ?>" class="timeline-panel" data-post="<?php echo $postx_counter ?>">
													  	 <div class="timeline-heading">
													  		<?php $origpostdate = get_the_date(); ?>
														    <h2 class="timeline-title"><?php the_title(); ?></h2>
														</div>
														<div class="timeline-body">
															<div class="col-lg-12">
																<?php the_excerpt(); ?>
																<p class="read-more pull-right">read more</p>
															</div>

														</div>
															
																

															
													</a>
												
											</li>
										 <?php endforeach ?>

										 <?php wp_reset_postdata(); ?>								
									<?php } ?>										
								</ul>
							</div>
						</div>
		            </div>
			    </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>