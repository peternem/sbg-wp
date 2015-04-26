<div class="container">
	<?php $my_query = new WP_Query('name=careers');
	while($my_query->have_posts()){
		$my_query->the_post();
	?>
	<div class="row">
		<div class="col-md-offset-4 col-md-8 intro-8">
			<div class="intro-full">
				<h2><?php the_title() ?></h2>
				<?php the_post_thumbnail(); ?> 
			</div>
			<?php the_content(); ?>
		</div>
	
	</div>					 
	<?php	} ?>
</div>