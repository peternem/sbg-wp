<div class="full-bg-pattern">
	<div class="container">
		<div class="row">
		  	<div class="col-lg-12">
		    	<h2 class="text-center">Company News</h2>
		  	</div>
		</div>
		<div class="row">
			<div id="carousel-news" class="carousel slide carousel-news">
			  	<!-- Wrapper for slides -->
			  	
			  	<div class="carousel-inner" role="listbox">
					<?php $postx_counter = 0; ?>
					<?php foreach(get_tags(array('order' => 'DESC')) as $term){ ?>

						<?php $posts = get_posts( array( 'posts_per_page' => -1, 'post_type' => 'pr-news', 'orderby' => 'date', 'order' => 'DESC', 'tag__in' => $term->term_id) ); ?>
						<?php foreach($posts as $post) : ?>
							 <?php if( ($term->term_id != 58 ) && ($term->term_id != 49 )) { ?>
								<?php $postx_counter++; ?>
							    <?php setup_postdata($post); ?>
								<div class="<?php echo  $postx_counter == 1 ? "item active" : "item"; ?>">
									<div class="col-md-4 col-sm-6 col-xs-12" data-post="<?php echo $postx_counter ?>">
										<div class="panel">
											<div class="panel-heading">
									  			<div class="date"><a class="" href="<?php the_permalink(); ?>"><?php echo $origpostdate = get_the_date('m.d.Y'); ?></a></div>
									  			<!-- <div class="title"><a class="" href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></div> -->
										  	</div>
											<div class="panel-body">
												<?php //the_excerpt(); ?>
												<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,30); ?></p>
											</div>	
										</div>
									</div>
								</div>
							 <?php
							 	
							 } ?>
							
						 <?php endforeach ?>
					
						 <?php wp_reset_postdata(); ?>								
					<?php } ?>			
			  	</div>
			
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-news" role="button" data-slide="prev">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left-white.png">
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-news" role="button" data-slide="next">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right-white.png">
				<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 more-pr">
				<a href="<?php bloginfo('url') ?>/company-news" class="btn-link-light" title="Awards">ALL COMPANY NEWS <i class="fa fa-angle-right"></i></a>
			</div>
		</div>
	</div>
</div>