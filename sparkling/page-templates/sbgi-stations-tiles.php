<?php
/*
Template Name: SBGI Station Tiles
*/

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    	 <a class="btn btn-primary pull-right" href="<?php bloginfo( 'url' ); ?>/tv-stations"><i class="fa fa-map-marker"></i><span class="hidden-xs">map view</span></a>
		    </div>
			<?php endwhile; endif; ?>
			 <!-- Stations List -->
		    <div class="row">
		        <div id="portfolio" class="col-lg-12 portfolio-bg">
		            <!-- Portfolio inner -->
		            <div class="portfolio boxed t-center relative">
		            	 <?php
		            	// parse JSON file
						$jsonUrl = './wp-content/themes/sparkling/inc/js/MetaverseStationData20150421.json';
						$string = file_get_contents($jsonUrl);
						$json_a = json_decode($string, true);
						?>
						
						<!-- Filters -->
		                
<div id="options" class="filter-menu fullwidth">
    <ul id="filters" class="option-set relative normal lato uppercase">
        <li><a href="#filter" title="show all" data-filter="*" class="selected">show all</a></li>
        <li><a href="#filter" title="FOX" data-filter=".fox" class=""><span>FOX</span></a></li>
        <li><a href="#filter" title="ABC" data-filter=".abc" class=""><span>ABC</span></a></li>
        <li><a href="#filter" title="CBS" data-filter=".cbs" class=""><span>CBS</span></a></li>
        <li><a href="#filter" title="NBC" data-filter=".nbc" class=""><span>NBC</span></a></li>
        <li><a href="#filter" title="MYTV" data-filter=".my.tv" class=""><span>MyTV</span></a></li>
        <li><a href="#filter" title="CW" data-filter=".cw" class=""><span>CW</span></a></li>
        <li><a href="#filter" title="Univision" data-filter=".univision" class=""><span>Univision</span></a></li>
        <li><a href="#filter" title="Azteca" data-filter=".azteca" class=""><span>Azteca</span></a></li>
        <li><a href="#filter" title="Other" data-filter=":not(.fox,.abc, .cbs, .nbc, .my.tv, .cw, .univision, .azteca )" class=""><span>Other</span></a></li>
    </ul>
		                    
	<!-- <div class="dropdown" class="option-set">
	    <button id="btn-afil-filter" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		  Filter by Affiliation
		  <span class="caret"></span>
		</button>
		<ul id="drop-afil-filter" class="dropdown-menu option-set relative normal lato uppercase" role="menu">
			<li><a href="#filter" title="show all" data-filter="*" class="selected">show all</a></li>
			<li><a href="#filter" title="FOX" data-filter=".fox" class=""><span>FOX</span></a></li>
			<li><a href="#filter" title="ABC" data-filter=".abc" class=""><span>ABC</span></a></li>
			<li><a href="#filter" title="CBS" data-filter=".cbs" class=""><span>CBS</span></a></li>
			<li><a href="#filter" title="NBC" data-filter=".nbc" class=""><span>NBC</span></a></li>
			<li><a href="#filter" title="MYTV" data-filter=".my.tv" class=""><span>MyTV</span></a></li>
			<li><a href="#filter" title="CW" data-filter=".cw" class=""><span>CW</span></a></li>
			<li><a href="#filter" title="Univision" data-filter=".univision" class=""><span>Univision</span></a></li>
			<li><a href="#filter" title="Azteca" data-filter=".azteca" class=""><span>Azteca</span></a></li>
			<li><a href="#filter" title="Other" data-filter=":not(.fox,.abc, .cbs, .nbc, .my.tv, .cw, .univision, .azteca )" class=""><span>Other</span></a></li>
		</ul>
	</div> -->

    <div class="dropdown" class="option-set" style="margin-top: 30px;">
		<button id="btn-dma-filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Filter by DMA
			  <span class="caret"></span>
		</button>
		<ul id="drop-dma-filter" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		   	<li><a href="#filter" title="show all"  data-filter="*" class="selected">show all</a></li>
			<?php 
			
			// Output filtered and sorted array
			$associativeArray = array();
			foreach ($json_a as $station_dma => $station_x) { 
				if ($station_x['DMA_Short'] && $station_x['DMA']) {
				$associativeArray [$station_x['Call_Letter']]['DMA'] = $station_x['DMA'];
				$associativeArray [$station_x['Call_Letter']]['DMA_Short'] = preg_replace("/[^,;a-zA-Z0-9]|[,;]$/s", "", $station_x['DMA_Short']);
				}
			}
			// filter out duplicate array items
			$newArray_x = array_unique($associativeArray , SORT_REGULAR);
			sort($newArray_x);
											
			// Output filtered and sorted array
			foreach($newArray_x as $ff){ ?>
				<li><a href="#filter"  data-filter="<?php echo ".".$ff['DMA_Short']; ?>" ><?php echo $ff['DMA']; ?></a></li>
			<?php } ?>
			</ul>
			<?php 
			//echo "<pre style='display: block; width: 100%;'>".print_r($associativeArray, true)."</pre>";	
			//echo "<pre style='display: block; width: 100%;'>".print_r($newArray_x, true)."</pre>";
			?>						  	
	</div>
</div>
		                <!-- End Portfolio Items -->

						<div class="portfolio-items t-center isotope" id="stationItemPortfolio" style="position: relative; overflow: visible;">		               	
						<?php 
						foreach ($json_a as $station_name => $station_a) { ?>
						    <div class="item five <?php echo strtolower ($station_a['Affiliation']); ?> <?php echo preg_replace("/[^,;a-zA-Z0-9]|[,;]$/s", "", $station_a['DMA_Short']); ?> isotope-item">
						    	<?php if ( $station_a['Web_Address'] == null ) {
						    	?>
						    	<a class="work-image" href="javascript:void(0)">
						    	<?php
						    	} else {
						    	?>
						    	<a class="work-image" href="<?php echo $station_a['Web_Address']; ?>" target="_blank">
						    	<?php } ?>
									<?php
									if (strlen((string)$station_a['Logo_List']) <= 1) {
									?>
										<img alt="<?php echo $station_a['Call_Letter']; ?>" src="<?php bloginfo( 'template_url' ); ?>/station-logos-tiles/sbg_noimage.jpg">
									<?php } else { ?>
										<img alt="<?php echo $station_a['Call_Letter']; ?>" src="<?php bloginfo( 'template_url' ); ?>/station-logos-tiles/<?php echo $station_a['Logo_List']; ?>">
									<?php
									}
									?>
								    <div class="item-details">
										<h1 class="lato white">
								    	<?php echo '<span class="callLetters">'.$station_a['Call_Letter'].'</span><span class="cityState"> - '.$station_a['Station_City'].', '.$station_a['Station_State'].'</span>'; ?>
								    	</h1>
									</div>
								</a>
							</div>
						<?php } ?>
						
						</div><!-- End Portfolio -->
		        	</div>
		    	</div>
		    </div>
		    <!-- End Stations List -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>