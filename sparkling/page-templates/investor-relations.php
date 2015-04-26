<?php
/*
Template Name: Investor Relations
*/

get_header(); ?>
<style>

	#ListedSecurities, #AnnualReports {
	    background-image: url('<?php bloginfo( 'template_url' ); ?>/images/grey-bg-texture.png');
	}
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		    </div>	
		    <div id="content" class="widecolumn page-content row">			
		        <div class="col-lg-12 featured-image">
					<?php the_post_thumbnail('sparkling-featured'); ?>
				</div>
			</div>
		    <?php endwhile; endif; ?>
			<div id="AnalystCoverage" class="row white-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=analyst coverage');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 intro-12 drk">
							<h4>Equity Analyst Coverage</h4>
								<ul class="investor-items">
									<li><a href="http://www.benchmarkcompany.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/benchmarkco.jpg"></a></li>
									<li><a href="http://www.evercore.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/evercore.jpg"></a></li>
									<li><a href="http://www.jpmorgan.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/jp-morgan.jpg"></a></li>
									<li><a href="http://rbcroyalbank.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/rbc.jpg"></a></li>
									<li><a href="http://www.capitaliq.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/standardandpoors.jpg"></a></li>
									<li><a href="http://www.wedbushinc.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/wedbush.jpg"></a></li>
									<li><a href="http://www.wellsfargo.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/wf.jpg"></a></li>
									
								</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 intro-12 drk">
							<h4>High Yield Analyst Coverage</h4>
								<ul class="investor-items">
									<li><a href="#"> <img src="<?php bloginfo( 'template_url' ); ?>/images/bofa_merrill_lynch.jpg"></a></li>
									<li><a href="http://www.db.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/deutsche.jpg"></a></li>
									<li><a href="http://www.jpmorganchase.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/jpmchase.jpg"></a></li>
									<li><a href="http://rbcroyalbank.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/rbc.jpg"></a></li>
									<li><a href="http://www.wellsfargo.com"> <img src="<?php bloginfo( 'template_url' ); ?>/images/wf.jpg"></a></li>
									
								</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="EarningsWebcast" class="row parallax1 blue-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 intro-12 lite">
							<?php $my_query = new WP_Query('name=Earnings Webcasts');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2 class="text-center"> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
						</div>
					</div>
					<div class="row">
				       <div class="col-lg-12 image-row">
					       	<!-- <div class="image-block large webcast">
								<div class="image-layer">
									<a href="#"><img src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2015/02/SBGI-Website-InvestorRelations-ms-earn-web_03.jpg" /></a>
								</div>
							</div> -->
							<div class="image-block large webcast">
								<div class="image-layer">
									<a href="http://www.sbgi.net/cgi-bin/get_info.pl?url=/investors/call_2_18_15.ra" target="_blank"><img src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2015/02/SBGI-Website-InvestorRelations-ms-earn-web_05.jpg" /></a>
								</div>
							</div>
							<div class="image-block large webcast">
								<div class="image-layer">
									<a href="http://www.sbgi.net/cgi-bin/get_info.pl?url=http%3A//www.investorcalendar.com/IC/CEPage.asp%3FID%3D173514" target="_blank"><img src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2015/02/SBGI-Website-InvestorRelations-ms-earn-web_07.jpg" /></a>
								</div>
							</div>
						</div>
				    </div>
				 </div>
			</div>
			<div id="Talent" class="row white-band">			
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<h2 class="text-center">Financial Events Calendar</h2>
						</div>
					</div>
					<div class="row">
						<!-- <div class="col-lg-12"></div> -->
							<?php
                            $event_types = array(
                                'upcoming-events'=>array(
                                    'title'=>'Upcoming Events',
                                    'no_results'=>'There are no scheduled events at this time.'
                                ),
                                'industry-conferences'=>array(
                                    'title'=>'Industry Conferences',
                                    'no_results'=>'There are no scheduled conferences at this time.'
                                )
                            );
                            foreach($event_types as $e=>$ee): ?>
                                <?php
                                $args = array(
                                    'post_type'=>'financial_events',
                                    'orderby'=>'financial_event_start_date',
                                    'order'=>'ASC',
                                    'limit'=>-1,
                                    'meta_query'=>array(
                                        array(
                                            'key'=>'financial_event_start_date',
                                            'value'=>time(),
                                            'compare'=>'>='
                                        )
                                    ),
                                    'tax_query'=>array(
                                        array(
                                            'taxonomy'=>'financial_event_type',
                                            'field'=>'slug',
                                            'terms'=>$e
                                        )
                                    )
                                );
                                $query = new WP_Query($args);
                                ?>
                                <div id="investor-relations-cal-<?php echo $e; ?>" class="investor-relations-cal col-sm-12 col-sm-6 col-md-6 col-lg-6">
                                     <div class="panel panel-default">
                                    	<div class="panel-heading"><h3><?php echo $ee['title']; ?></h3></div>
                                   		<div class="panel-body">
                                    <?php if($query->have_posts()): ?>
                                            <?php while($query->have_posts()): ?>
                                                <?php
                                                    $query->the_post();
                                                    $meta = get_post_meta(get_the_ID());
                                                    $start_timestamp = $meta['financial_event_start_date'][0];
                                                    $end_timestamp = $meta['financial_event_end_date'][0];
                                                    $start_day = date('j', $start_timestamp);
                                                    $end_day = date('j', $end_timestamp);
													
													//var_dump( "Start Date: ".$start_day." -- End Day: ".$end_day);

													$start_month = date('m', $start_timestamp);
                                                    $end_month = date('m', $end_timestamp);
                                                   	
													if ($end_timestamp == $start_timestamp){
														$cal_day = $start_day;
													} 
													
													if ($end_timestamp != $start_timestamp){
														$cal_day = $start_day.'-'.$end_day;
													}
                                                   // $cal_day = ($end_timestamp == $start_timestamp ? $start_day : $start_day.'-'.$end_day);
                                                    $month = ($end_timestamp != 0 && $end_month != $start_month ? date('M', $start_timestamp).'-'.date('M', $end_timestamp) : date('F', $start_timestamp));
                                                ?>
                                                <div class="cal-link">
                                                    <div class="cal-item">
                                                        <div class="cal-date cal-block">
                                                            <div class="cal-month"><?php echo $month; ?></div>
                                                            <div class="cal-day"><?php echo $cal_day; ?></div>
                                                        </div>
                                                        <div class="cal-title cal-block"><span><?php the_title(); ?></span></div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                    <?php else: ?>
                                        <p><?php echo $ee['no_results']; ?></p>
                                    <?php endif; ?>
                                    </div>
                                      </div>
                                </div>
                            <?php endforeach; ?>
						
					</div>		
				</div>
			</div>
			<div id="InvestorPresentations" class="row blue-band">
				<div class="full-bg-pattern1">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 intro-12 lite">
								<?php $my_query = new WP_Query('name=investor presentations');
									while($my_query->have_posts()){
								  		$my_query->the_post(); ?>
								  		<h2 class="text-center"><?php the_title() ?></h2> 
								 		 <?php the_content(); ?>
								<?php	} ?>
							</div>
						</div>
						<?php
					    $ip_arr = array();
					    $ip_args = array(
					        'post_type'=>'investor_relations',
					        'orderby'=>'investor_relations_date',
					        'order'=>'DESC',
					        'limit'=>-1,
					        'posts_per_page' => -1
					    );
					    $ip_query = new WP_Query($ip_args);
					    if($ip_query->have_posts()){
					        while($ip_query->have_posts()){
					            $ip_query->the_post();
					            $meta = get_post_meta(get_the_ID());
					            $document_timestamp = $meta['investor_relations_date'][0];
					            $year = date('Y', $document_timestamp);
					            $documents = unserialize($meta['investor_relations_documents'][0]);
					            foreach($documents as $d=>$dd){
					               $ip_arr[$year]['documents'][basename($dd)] = $dd;
					            }
								
					            $ip_arr[$year]['posts'][$document_timestamp] = array(
					                'post_id'=>get_the_ID(),
					                'permalink'=>get_the_permalink(),
					                'documents'=>$documents,
					                'title'=>get_the_title()
					            );

					        }
					    }
					    krsort($ip_arr);
     	
					    foreach($ip_arr as $i=>$ii) : ?>
						<div class="row">
							<div class="col-lg-12 image-row">
								<h3 class="text-center"><?php echo $i; ?> Presentations</h3>	
								
								<?php
								//print_r($ii);
								$countX = 0;
					                foreach($ii['posts'] as $d=>$dd){ ?>
					                	
					                	<?php $countX ++; ?>
					                	<div class="image-block pdf" data-count="<?php echo $countX;?>">
					                    	<div class="panel panel-default">
												<div class="panel-body pdf-links">
													<ul>
					                                    <li>
					                                        <a class="pdfIconLink" href="<?php echo $dd[documents][0]; ?>" target="_blank">
					                                        <i src="<?php bloginfo('template_url'); ?>" class="fa fa-file-text"></i>
					                                             
					                                        </a>
					                                        <a class="pdfFile" href="<?php echo $dd[documents][0]; ?>" target="_blank"><?php ?><?php echo $dd[title]; ?></a>								                                        
					                                    
					                                    </li>
					                                </ul>
												</div>
											</div>
										</div>
					            <?php } ?>
					
							</div>
						</div>
					    <?php endforeach; ?>
					</div>
				</div>
	
			</div>
			<div id="ListedSecurities" class="row grey-band">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=listed securities');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 image-row">
							<?php $my_query = new WP_Query('tag=listed-securities');
									while($my_query->have_posts()){
								  		$my_query->the_post(); ?>
								  		<div class="image-block listed-sec">
											<div class="image-layer">
												<h3> <?php the_title() ?></h3>
												<?php the_content(); ?> 
											</div>
										</div>
								<?php	} ?>
						</div>
					</div>
				</div>
			</div>
			<div id="ReportFilings" class="row white-band">			
				<div class="container">
					<div class="post-content">
						<div class="row">
							<div class="col-lg-12 intro-12 drk">
								<h2>Report and Filings</h2> 
							</div>
						</div>
						<div class="row file-links">
						  	<div class="col-lg-6">
								<?php $my_query = new WP_Query('name=sec filings');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-lg btn-block" rel="bookmark"><?php the_title() ?> <i class="fa fa-angle-right"></i></a>
							<?php	} ?>
							</div>
						  	<div class="col-lg-6">
								<?php $my_query = new WP_Query('name=sec xbrl filings');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-lg btn-block" rel="bookmark"><?php the_title() ?> <i class="fa fa-angle-right"></i></a>
							<?php	} ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 intro-12 drk">
								<h3 class="text-center">Section 16 Filers</h3>
							</div>
						</div>
						<div class="row people">
							<div class="col-lg-12">					
							<?php	    
							$argsx = array(
								'post_type' => 'people',
								'tag' =>'sector16',
								'showposts'=> -1
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
			</div>
			<div id="AnnualReports" class="row grey-band">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 intro-12 inv-rep">
							<h2 class="text-center">Annual Reports</h2>
							<!-- Carousel ==================================== -->
							<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="false" id="AnRepCarousel">
								<div class="carousel-inner">
									<?php
									
									$ARDir = "./wp-content/uploads/investor-relations/Annual-Reports/";
									$ar_counter = 0;

									if (is_dir($ARDir)) {
									    if ($dh = opendir($ARDir)) {
									    while (($file = readdir($dh)) !== false) {
									    	$files[] = $file;
									    	rsort($files);  
									    }
									    closedir($dh);
									    }
									}
									?>
									
									<?php //print_r($files); 
							
										foreach ($files as $key => $val) {
										     if ($val != "." && $val != ".." && $val != ".htaccess") {
										     	//echo "files[" . $key . "] = " . $val . "<br/>";
												$name = basename($val, '.pdf'); // Removes file extension  
												$altName = str_replace('sbgi-', '', $name);
												$ar_counter++;
												if ($ar_counter == 1) {
													echo "<div class=\"item active\">";
												} elseif ($ar_counter % 4 == 1) {
													echo "</div><div class=\"item\">";
												} 
												?>
												<div data-ca-item="<?php echo $ar_counter ?>" class="col-md-3 col-sm-6 col-xs-12">
													<div class="panel panel-default report">
														<div class="panel-body">
															<a href="<?php echo bloginfo('url')."/".$ARDir."/".$val; ?>" target="_blank"><img class="ar-thumb" alt='<?php echo $name; ?>' src='<?php echo bloginfo('url'); ?>/wp-content/uploads/pdf-thumb-images/<?php echo $name; ?>.png'/></a>
															<a class="ar-File" title="<?php echo $name; ?>" href="<?php echo bloginfo('url')."/".$ARDir."/".$val; ?>" target="_blank"><?php echo $altName; ?></a>		
														</div>
													</div>
												</div>		
												
												<?php	
												 
											 }
										}
									 ?>
									</div><!-- /.carousel .item end-->
								</div>
								<a class="left carousel-control" href="#AnRepCarousel" role="button" data-slide="prev">
								<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left-dark.png">
								<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#AnRepCarousel" role="button" data-slide="next">
								<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right-dark.png">
								<span class="sr-only">Next</span>
								</a><!-- /.carousel -->
							 </div>
							 
						</div>
					</div>
				</div>
			</div>
			<div class="row white-band" id="NonGAAP">
				<div class="container">
					<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=certain non-GAAP financial measurements');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_excerpt(); ?>
							<?php	} ?>
					</div>
					<div class="row file-links">
						<div class="col-lg-6">
							<a class="btn btn-primary btn-lg btn-block"href="<?php the_permalink(); ?>">Non GAAP<i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="DividendTreatment">
				<div class="container">
					<div class="col-lg-12 intro-12 drk">
							<?php $my_query = new WP_Query('name=dividend treatment');
								while($my_query->have_posts()){
							  		$my_query->the_post(); ?>
							  		<h2> <?php the_title() ?></h2> 
							 		 <?php the_content(); ?>
							<?php	} ?>
					</div>

				</div>
			</div>
				
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>