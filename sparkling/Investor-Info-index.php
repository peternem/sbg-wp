<div class="container">
	<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
		<div class="sbgi-facts">
			<div class="stock-fact">
				<div class="stock-title">Stock Information:</div>
			</div>
			<div class="stock-fact">
				<div class="stock-data">$26.18</div>
				<div class="stock-title">Nasdaq: SBGI</div>
			</div>
			<div class="stock-fact fact-last">
				<div class="stock-data stock1">0.67 <span class="fa fa-caret-up"></span></div>
				<div class="stock-title">2.63%</div>
			</div>
		</div>
	</div>

	<div class="col-sm-8 col-md-8 col-lg-8 intro-8">
		<?php $my_query = new WP_Query('tag=investor-relations');
			while($my_query->have_posts()){
			  $my_query->the_post();
			  ?>
			  <h2> <?php the_title() ?></h2> 
			  <?php the_content(); ?>
		<?php	} ?>
	</div>
</div>