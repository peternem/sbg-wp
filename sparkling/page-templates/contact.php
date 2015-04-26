<?php
/*
Template Name: Contact
*/

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row parallax1">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    </div>	
		    <div id="content" class="widecolumn page-content row parallax1">	
				<div class="post-content">
					<div id="innercontent" class="container">
				        <div class="row">
				           	<div class="col-lg-12" >
				           		<?php the_content('<p class="serif">Read the rest of this page È</p>'); ?>
				           		 <div class="edittext"> <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?></div>
				          	</div>
				        </div>
				        <div class="row">
				           	<div class="col-md-6 col-lg-8" >
				           		 <?php echo do_shortcode( '[si-contact-form form=\'1\']' ); ?> 
				          	</div>
				           	<div class="col-md-6 col-lg-4 contact-info" >

								<img class="img-responsive corp-hq-bldg" src="<?php bloginfo( 'template_url' ); ?>/images/sbg-building_360.png"/></a>
								<h4>CORPORATE HEADQUARTERS</h4>
								<address class="addr-left">Sinclair Broadcast Group, Inc.<br>
								10706 Beaver Dam Road<br>
								Hunt Valley, Maryland 21030 </address>
								<div class="phone-numbers">
									<abbr title="Phone">P :</abbr>
									 410.568.1500
									<br>
									<!-- <abbr title="Phone">F :</abbr>
									 410.568.1533 -->
								</div>
				           </div>
				        </div>
				    </div>
				</div>
			</div>
			<style>
				.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 1314px; width: 100%; margin: 0px auto; } 
				.embed-container iframe, 
				.embed-container object,
				.embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 50%; }
			</style>
			<div id="content" class="contact-map">	
				<div class='embed-container'>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3079.665362490502!2d-76.653763!3d39.476887999999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c8126d67f587ed%3A0x978f9b7e1ab279bb!2sSinclair+Broadcast+Group!5e0!3m2!1sen!2sus!4v1428619917712" style="border:0" frameborder='0' allowfullscreen></iframe>
				</div>
				
			</div>
		    <?php endwhile; endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>