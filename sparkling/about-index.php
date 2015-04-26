<div class="container">					
	<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
		<div class="sbgi-facts">
			<div class="fact" data-perc="161">
				<div class="factor oswald"></div>
				<div class="factor-title">Television<br>Stations</div>
			</div>
			<div class="fact" data-perc="377">
				<div class="factor oswald"></div>
				<div class="factor-title">Channels</div>
			</div>
			<div class="fact" data-perc="79">
				<div class="factor oswald"> </div>
				<div class="factor-title"> US Markets</div>
			</div>
            <!-- <div class="fact fact-last" data-perc="38">
                <div class="factor oswald percent"> </div>
                <div class="factor-title">US Household<br>Coverage</br></div>
           	</div> -->
		</div>
	</div>
	<div class="col-sm-8 col-md-8 col-lg-8 intro-8">
	<?php $my_query = new WP_Query('tag=about-sbgi');
	while($my_query->have_posts()){
	  $my_query->the_post();
	  ?>
	  <h2> <?php the_title() ?></h2> 
	  <?php the_content(); ?>
	<?php	} ?>
	<img src="<?php bloginfo('template_url') ?>/images/affiliates.png" class="affil-img"/>
	</div>

</div>