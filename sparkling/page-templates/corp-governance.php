<?php
/*
Template Name: Corp Gov
*/

get_header(); ?>

<style>

#business-conduct {
    background-image: url('<?php bloginfo( 'template_url' ); ?>/images/grey-bg-texture.png');

}

</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <!-- <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row parallax1">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    </div>	
		    <div id="content" class="widecolumn page-content row parallax1">	
				<div id="innercontent" class="container">
			        <div class="entrytext">
			            <?php the_content('<p class="serif">Read the rest of this page È</p>'); ?>
			        </div>
			         <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			    </div>
			</div>
		    <?php endwhile; endif; ?> -->
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    </div>	
		    <div id="content" class="widecolumn page-content row">			
		        <div class="col-lg-12 featured-image">
					<?php the_post_thumbnail('sparkling-featured'); ?>
				</div>
			</div>
			<div id="Directors" class="row white-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=directors-post');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							 		 <?php the_content(); ?>
							 		 <h2 class="text-center"> <?php the_title() ?></h2> 
							<?php	} ?>
						</div>
					</div>
					<div class="row people">
						<div class="col-lg-12">					
						<?php		    
						$argsx = array(
							'sbg-people'=> 'directors',
							'posts_per_page' => -1 ,
							'meta_key'   => 'people_order',
						    'orderby'    => 'meta_value_num',
						    'order' => 'ASC',
						    'meta_query' => array(
								array(
								'key'     => 'people_order'
								
								)
							),							
						);
						$postx_counter = 0;
						$my_queryx = new WP_Query( $argsx );
							while($my_queryx->have_posts()){
								$postx_counter++;
						  		$my_queryx->the_post(); 

						  		?>
							<div  data-ca-item="<?php echo $postx_counter ?>" class="panel-wrapper exec-emp">			
								<div class="panel panel-default">
									<a href="<?php the_permalink(); ?>" class="panel-footer">
										<div class="p-link"> <?php the_title() ?></div>
										<hr/>
										<?php
											if(get_field('job_title')) { ?>
													 <span><i><?php echo get_field('job_title');?></i></span>
											<?php } ?>
									</a>
								</div>
							</div>
						<?php	} ?>
						</div>
					</div>
				</div>
			</div>
		    <?php endwhile; endif; ?>
						<div id="business-conduct" class="row">
				<div class="container">
					<div class="col-lg-12 intro-12 drk">
						<h2 class="text-center">Governance Documents</h2>
					</div>
					<div class="row cards">
						<div class="col-md-6 col-lg-6">
							<div class="panel panel-default dl">
								<div class="panel-heading">Code of Business Conduct and Ethics</div>
								<div class="panel-body pdf-links">
									<i class="fa fa-file-text"></i>
									<a class="pdfFile" target="_blank" href="<?php echo bloginfo('url'); ?>/wp-content/uploads/investor-relations/governance-ethic-docs/SBGI-Code-of-Business-Conduct-and-Ethics-2015.pdf">Download </a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="panel panel-default dl">
								<div class="panel-heading">Audit Committee Charter</div>
								<div class="panel-body pdf-links">
									<i class="fa fa-file-text"></i>
									<a class="pdfFile" target="_blank" href="<?php echo bloginfo('url'); ?>/wp-content/uploads/investor-relations/governance-ethic-docs/SBGI-Audit-Committee-Charter-2015.pdf">Download</a>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row cards">
						<div class="col-md-6 col-lg-6">			
							<?php $my_query = new WP_Query('name=complaint-procedures');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							<div class="panel panel-default sbg-large-box">
								<div class="panel-heading"><?php the_title() ?></div>
								<div class="panel-body pdf-links">
									<?php echo the_content(); ?>
									<div class="pdf-links">
										<i class="fa fa-file-text"></i>
										<a class="pdfFile" target="_blank" href="<?php echo bloginfo('url'); ?>/wp-content/uploads/investor-relations/governance-ethic-docs/SBGI-Complaint-Procedures-2015.pdf">Download</a>
									</div>
								</div>
								<!-- <div class="panel-footer"></div> -->
							</div>
							<?php	} ?>
						</div>
						<div class="col-md-6 col-lg-6">			
							<?php $my_query = new WP_Query('name=independent public accountant');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							<div class="panel panel-default sbg-large-box">
								<div class="panel-heading"><?php the_title() ?></div>
								<div class="panel-body pdf-links">
									<?php echo the_content(); ?>
								</div>
								<div class="panel-footer">
								
								</div>
							</div>
							<?php	} ?>
						</div>
					</div>	
				</div>
			</div>
			<div id="Officers" class="row white-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=officers');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2 class="text-center"> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
						</div>
					</div>	
					<div class="row people">
						<div class="col-lg-12">
							<?php		    
						$args_officer = array(
							'sbg-people'=> 'officers',
							'posts_per_page' => -1 ,
						    'orderby'    => 'meta_value_num',
						    'order' => 'ASC',
						    'meta_query' => array(
								array(
								'key'     => 'people_order'
								
								)
							),							
						);
						$postx_counter = 0;
						$my_queryx = new WP_Query($args_officer);
							while($my_queryx->have_posts()){
								$postx_counter++;
						  		$my_queryx->the_post(); 
						  		?>
								<div  data-ca-item="<?php echo $postx_counter ?>" class="panel-wrapper exec-emp">			
								<div class="panel panel-default">
									<a  href="<?php the_permalink(); ?>" class="panel-footer">
										<div class="p-link"><?php the_title() ?></div>
										<hr/>
										<?php
											if(get_field('job_title')) { ?>
													 <span><i><?php echo get_field('job_title');?></i></span>
											<?php } ?>
									</a>
								</div>
							</div>
						<?php	} ?>
						</div>
					</div>	
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>