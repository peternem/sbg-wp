<div class="full-bg-pattern">
	<div class="row">
	  	<div class="col-lg-12 intro-12 lite">
	    <?php $my_query = new WP_Query('tag=what-we-do');
				while($my_query->have_posts()){
				$my_query->the_post(); ?>
	    		<h2 class="text-center"><?php the_title() ?></h2>
	    	<?php the_content(); ?>
	    	<?php	} ?>
	  	</div>
	</div>
	<div class="row">
	  	<div class="col-lg-12">
	    	<h3 class="text-center">Content Creation</h3>
	  	</div>
	</div>
	<div class="row">
	  	<div class="col-lg-12 image-row" id="first-image-row">
	    	<div class="image-block large ">
	      		<a href="<?php bloginfo('url') ?>/news">
	      			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/news-tile.jpg" alt="News"/></div>
	      			<div class="title-layer">News Operations</div>
	      		</a>
	    	</div>
	    	<div class="image-block large">
	      		<a href="<?php bloginfo('url') ?>/american-sports-network" title="American Sports Network" class="greyscale">
	      			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/asn-tile.jpg" alt="ASN"/></div>
	      			<div class="title-layer">American Sports Network</div>
	      		</a>
	    	</div>
	    	<div class="image-block large">
	      		<a href="<?php bloginfo('url') ?>/ring-of-honor" title="Ring of Honor" class="greyscale">
	      			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/roh-tile.jpg" alt="Ring of Honor"/> </div>
	      			<div class="title-layer large">Ring of Honor</div>
	      		</a>
	    	</div>
	    	<div class="image-block large">
	      		<a href="<?php bloginfo('url') ?>/original-programming" title="Original Programming" class="greyscale">
	      			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/op-tile.jpg" alt="Original Programming"/></div>
	      			<div class="title-layer">Original Programming</div>
	      		</a>
	    	</div>
	  	</div>
	</div>
	<div class="row full-bleed">
	  <div class="col-lg-12 dist-platform" id="DistributionPlatforms">
	    <h3 class="text-center">Distribution Platforms</h3>
	    <div class="row">
	      <div class="col-lg-12 image-row">
	        <a href="<?php bloginfo('url') ?>/tv-stations" title="TV Stations" class="image-block small">
	          <div class="image-layer"> <img src="<?php bloginfo('template_url') ?>/images/sbgi_tileB_spectrum_200x139.jpg" alt="TV Stations"/></div>
	          <div class="title-layer">Television</div>
	        </a>
	        <a href="<?php bloginfo('url') ?>/digital-platforms" title="Digital Platforms" class="image-block small">
	          <div class="image-layer"> <img src="<?php bloginfo('template_url') ?>/images/sbgi_tileB_digital_200x139.jpg" alt="Digital Platforms"/> </div>
	          <div class="title-layer">Digital</div>
	        </a>
	        <a href="<?php bloginfo('url') ?>/radio-stations" title="Radio Stations" class="image-block small">
	          <div class="image-layer"> <img src="<?php bloginfo('template_url') ?>/images/sbgi_tileB_radio_200x139.jpg" alt="Radio Stations"/> </div>
	          <div class="title-layer">Radio</div>
	        </a>
	        <a href="<?php bloginfo('url') ?>/cable-channels" title="Cable Channels" class="image-block small">
	          <div class="image-layer"> <img src="<?php bloginfo('template_url') ?>/images/sbgi_tileB_cable_200x139.jpg" alt="Cable Channels"/> </div>
	          <div class="title-layer">Cable</div>
	        </a>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="row">
		<div class="col-lg-12 adv-platform" id="AdvertisingPlatforms">
	    	<div class="row">
	      		<div class="col-lg-12">
	        		<h3 class="text-center">Advertising Platforms</h3>
	      		</div>
	    	</div>
	    	<div class="row">
	      		<div class="col-lg-12 image-row">
	        		<div class="image-block large">
		          		<a href="<?php bloginfo('url') ?>/digital-solutions" title="Digital Solutions">
		          			<div class="image-layer grayscale"><img src="<?php bloginfo('template_url') ?>/images/ds-tile.jpg" alt="Digital Solutions"/></div>
		          			<div class="title-layer">Digital Solutions</div>
		          		</a>
		        	</div>
		        	<div class="image-block large">
		          		<a href="<?php bloginfo('url') ?>/sinclair-network-sales" title="Sinclair Network Sales">
		          			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/sns-tile.jpg" alt="Sinclair Network Sales"/> </div>
		          			<div class="title-layer">Sinclair Network Sales</div>
		          		</a>
		        	</div>
		        	<div class="image-block large">
		          		<a href="<?php bloginfo('url') ?>/national-sales" title="Sinclair National Sales">
		          			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/ns-tile.jpg" alt="Sinclair National Sales"/> </div>
		          			<div class="title-layer">Sinclair National Sales</div>
		          		</a>
		        	</div>
		        	<div class="image-block large">
		          		<a href="<?php bloginfo('url') ?>/long-form" title="Long Form">
		          			<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/lf-tile.jpg" alt="Long Form"/> </div>
		          			<div class="title-layer">Long Form</div>
		          		</a>
		        	</div>		        	
	      		</div>
	    	</div>
	  	</div>
	  	<div class="col-lg-12 adv-platform" id="Investments">
	    	<div class="row">
	      		<div class="col-lg-12">
	        		<h3 class="text-center">Investments</h3>
	      		</div>
	    	</div>
	    	<div class="row">
		      	<div class="col-lg-12 image-row">
		        	<div class="image-block large">
		        		<a href="<?php bloginfo('url') ?>/keyser-capital" title="Keyser Capital">
			          		<div class="image-layer grayscale"><img src="<?php bloginfo('template_url') ?>/images/keyser-tile.jpg" alt="Keyser Capital"/></div>
			          		<div class="title-layer">Keyser Capital</div>
		          		</a>
		        	</div>
		        	<div class="image-block large">
		          		<a href="<?php bloginfo('url') ?>/digital-ventures" title="Digital Ventures">
		          			<div class="image-layer grayscale"><img src="<?php bloginfo('template_url') ?>/images/dv-tile.jpg" alt="Digital Ventures"/></div>
		          			<div class="title-layer">Digital Ventures</div></a>
		        	</div>
		      	</div>
	    	</div>
	  	</div>
		<div class="col-lg-12 adv-platform last" id="TechnicalSolutions">
			<div class="row">
		  		<div class="col-lg-12">
		    		<h3 class="text-center">Technical Solutions</h3>
		  		</div>
			</div>
			<div class="row">
		  		<div class="col-lg-12 image-row">
				    <div class="image-block large">
				      	<a href="<?php bloginfo('url') ?>/one-media" title="One Media">
				      		<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/om-tile.jpg" alt="One Media"/> </div>
				      		<div class="title-layer">One Media</div>
				      	</a>
				    </div>
		    		<div class="image-block large">
	      				<a href="<?php bloginfo('url') ?>/acrodyne" title="Acrodyne">
	      					<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/acrodyne-tile.jpg" alt="Acrodyne"/> </div>
		      				<div class="title-layer">Acrodyne</div>
		      			</a>
		    		</div>
		    		<div class="image-block large">
		      			<a href="<?php bloginfo('url') ?>/dielectric" title="Dielectric">
		      				<div class="image-layer grayscale"> <img src="<?php bloginfo('template_url') ?>/images/dielectric-tile.jpg" alt="Dielectric"/></div>
		      				<div class="title-layer">Dielectric</div>
		      			</a>
		   	 		</div>
		  		</div>
			</div>
		</div>
	</div>
</div>