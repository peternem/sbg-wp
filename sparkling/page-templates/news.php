<?php
/*
Template Name: News
*/
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
			    <div id="sbgfullpage" class="full-width-header parallax6">
			    	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(1920, 1449), false, '' ); ?> 
			    	<style>
			    	#sbgfullpage {
						background: url(<?php echo $src[0]; ?>) no-repeat;
						background-attachment: fixed;
						background-size: cover;
						
					}  
			    	</style>
			    </div>
		    <?php endwhile; endif; ?>
			<div id="MissionStatement" class="row white-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
						<h1 class="entry-title jumbo-alt"><?php the_title(); ?></h1>	
							<?php $my_query = new WP_Query('name=mission-statement');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
						</div>
					</div>
				</div>
			</div>
			<!-- <div id="StationDayparts" class="row grey-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=station-dayparts');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
						</div>
					</div>
		    	</div>
			</div> -->
			<div id="Awards" class="row blue-band parallax3">			
				<div class="container">
				    <div class="row">
						<div class="col-lg-12 lite">
							<h2 class="text-center">2013-2014 Awards</h2>
						</div>
					</div>
				   <div class="row">
						<div class="col-lg-12 image-row">
							<div class="image-block awards">
								<div class="image-layer">
									 <span>66</span>
								</div>
								<div class="title-layer"><span>Regional Emmy Awards</span></div>
							</div>
							<div class="image-block awards">
								<div class="image-layer">
									<span>21</span>
								</div>
								<div class="title-layer"><span>Edward Murrow Awards</span></div>
							</div>
							<div class="image-block awards">
								<div class="image-layer">
									<span>63</span>
								</div>
								<div class="title-layer large"><span>Associated Press Broadcasters Awards</span></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 image-row">
							<div class="image-block awards">
								<div class="image-layer">
									<span>23</span>
								</div>
								<div class="title-layer"><span>Broadcaster's Association Awards</span></div>
							</div>
							<div class="image-block awards">
								<div class="image-layer">
									<span>7</span>
								</div>
								<div class="title-layer"><span>NPAA Awards</span></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 image-row">
							<div class="image-block awardslink">
								<div class="title-layer"><a href="<?php bloginfo('url') ?>/awards" title="Awards">View All Awards<i class="fa fa-angle-right"></i></a></div>
							</div>
						</div>
					</div>
				 </div>
			</div>
			<div id="Talent" class="row grey-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=talent-network');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
							<div class="sbgi-btngroup">
								<a class="btn btn-primary pull-right" href="https://sbgtvcareers.silkroad.com/">Careers <i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="row cards">
					<?php $my_query = new WP_Query('tag=job');
					while($my_query->have_posts()){
						$my_query->the_post(); ?>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading"> <?php the_title() ?></div>
								<div class="panel-body pdf-links">
									<p><?php
										  $excerpt = get_the_excerpt();
										  echo string_limit_words($excerpt,50);
										?></p>
								</div>
								<div class="panel-footer"><a class="btn btn-primary" href="<?php the_permalink(); ?>" rel="bookmark">More Info <i class="fa fa-angle-right"></i></a></div>
							</div>
						</div>
					<?php	} ?>
					</div>
				</div>
			</div>
			<div id="YourVoice" class="row white-band">
				<div class="container">
						<?php $my_query = new WP_Query('name=your voice, your future');
						while($my_query->have_posts()){
							$my_query->the_post();
						?>
						<div class="row">
							<div class="col-lg-12 intro-12 drk">
								<h2 class="text-center"><?php the_title() ?></h2> 
							</div>
						</div>
						<div class="row">
							<div class="col-sm-8 col-md-8 col-lg-8 intro-8">
								 <?php the_content(); ?>
							</div>	
							<div class="col-sm-4 col-md-4 col-lg-4">
								<?php the_post_thumbnail('sbgn-post-small'); ?>
							</div>	
						</div>
												 
						<?php	} ?>
				</div>
			</div>
			<div id="OurStations" class="row blue-band">
				<div class="container">
					<div class="col-lg-12">
						<h2>Our Stations</h2>
					</div>
				</div>
				<div class="col-lg-12 sbgi-map">
					<?php get_template_part('google-map-template'); ?>
				</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>