<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?><!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- favicon -->

<?php if ( of_get_option( 'custom_favicon' ) ) { ?>
<link rel="icon" href="<?php echo of_get_option( 'custom_favicon' ); ?>" />
<?php } ?>

<!--[if IE]><?php if ( of_get_option( 'custom_favicon' ) ) { ?><link rel="shortcut icon" href="<?php echo of_get_option( 'custom_favicon' ); ?>" /><?php } ?><![endif]-->

<?php wp_head(); ?>

<?php if( is_home() ) { ?>
	<script type="text/javascript">
	/* ==============================================
	VIDEO PLAYER
	=============================================== */
	if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

       jQuery(function() {
           var BV = new jQuery.BigVideo();
           BV.init();
           BV.show('http://sinclairresources.sinclairstoryline.com/assets/common/sbg-video3.mp4',{ambient:true});
       });
   }
	</script>
<?php } ?>

<style>
<?php if( is_home() ) { ?>
	.pattern-black:before {
	    background: url("<?php bloginfo( 'template_url' ); ?>/images/pattern-black.png") repeat rgba(0, 0, 0, 0.25);
	}
	
	#CompanyPress {
    	background-image: url("<?php bloginfo( 'template_url' ); ?>/images/sbg-background-1.jpg");
   	}
   	
   	#News {
    	background-image: url("<?php bloginfo( 'template_url' ); ?>/images/cn-bg.jpg");
   	}
   	#News .panel {
    	background-image: url("<?php bloginfo( 'template_url' ); ?>/images/texture-bg2_360.png");
	    -o-background-size:100% 56%;             /*  Opera  */
	    -webkit-background-size:100% 56%;        /*  Safari  */
	    -khtml-background-size:100% 56%;         /*  Konqueror  */
	    background-size:100% 56%;           /*not working in Firefox as yet */
	    background-repeat:no-repeat;
	    background-position: bottom;
   	}
   
   	#CompanyHistory {
    	background-image: url("<?php bloginfo( 'template_url' ); ?>/images/sbg-background-3.jpg");
   	}
   	#WhatWeDo {
   		background-image: url("<?php bloginfo( 'template_url' ); ?>/images/sbg-bg.jpg");
   	}
   	#SbgiCareers {
   		background-image: url("<?php bloginfo( 'template_url' ); ?>/images/career3-bg.jpg");
   	}
<?php } ?>
	.page-template-history {
		background: url("<?php bloginfo( 'template_url' ); ?>/images/sbg-bg.jpg") no-repeat;
	}
	.history-bg-pattern::before {
		background: url("<?php bloginfo( 'template_url' ); ?>/images/pattern-black.png") repeat rgba(0, 0, 0, 0.25);
	}
	.full-bg-pattern::before {
		background: url("<?php bloginfo( 'template_url' ); ?>/images/pattern-black.png") repeat rgba(0, 0, 0, 0.25);
	}
	#EarningsWebcast {
		background-image: url("<?php bloginfo( 'template_url' ); ?>/images/sbg-background-4.jpg");
	}
	#Awards {
   		background-image: url("<?php bloginfo( 'template_url' ); ?>/images/sbg-background-5.jpg");
   	}
   	.single .entry-header {
   		background: url("<?php bloginfo( 'template_url' ); ?>/images/sbgi_bg_pat_3x3.png")  repeat #11518A;
   	}
   	.single-pr-news .entry-header {
   		background: url("<?php bloginfo( 'template_url' ); ?>/images/sbgi_bg_pat_3x3.png")  repeat #11518A;
   	}
   	
   	.page .page-title, .full-bg-pattern1 {
   		background: url("<?php bloginfo( 'template_url' ); ?>/images/sbgi_bg_pat_3x3.png")  repeat #11518A;
   	}
  	.image-row .title-layer {
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=90);
		filter: progid:DXImageTransform.Microsoft.Alpha(opacity=90);
	}
</style>

<?php if ( is_page('tv-channels')) { ?>
<!-- Load scripts for Stations Tiles -->
<link media="all" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/station-tiles.css" rel="stylesheet"/>
<?php } ?>
    
<?php if ( is_page('tv-stations') || is_page('news-operations')) { ?>
<!-- Load scripts for SBGI Google Map-->
<link media="all" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/google-map.css" rel="stylesheet"/>
<?php } ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body <?php is_home() || is_page('investor-relations')  || is_page('news-operations') || is_singular('history') || is_page_template('page-templates/sbgi-page-25-75.php') ? body_class('parallax'): body_class(); ?> >
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
		        <div class="navbar-header">
		            <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>

				<?php if( get_header_image() != '' ) : ?>

					<div id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
							<img class="company-logo" src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/>
						</a>
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div><!-- end of #logo -->

				<?php endif; // header image was removed ?>

				<?php if( !get_header_image() ) : ?>

					<div id="logo">
						<span class="site-name"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
					</div><!-- end of #logo -->

				<?php endif; // header image was removed (again) ?>

		        </div>
					<?php sparkling_header_menu(); ?>
					</div>
		    </div>
		  
		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->
		<?php if( is_home() ) { ?>

						<!-- Ful Screen Home -->
			<div class="static-hero visible-xs-block visible-sm">
			  <img src="<?php echo get_template_directory_uri(); ?>/images/sbg-mobile-bg2.jpg"  alt="Third slide">
			  <div class="container">
			    <div class="carousel-caption">
			      <h1>Welcome to </br>SINCLAIR BROADCAST GROUP</h1>
			      <p>The largest and most diversified television<br>broadcasting company in the country today</p>
			      <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p> -->
			    </div>
			  </div>
			</div>
				<div class="hidden-xs hidden-sm hero-container pattern-black">
					<!-- <div id="fullscreen" class="hidden-xs hidden-sm"></div> -->
					<div id="fullscreen" class="fullscreen"></div>
					<!-- Carousel ================================================== -->
				    <div id="myCarousel" class="carousel fade hidden-xs" data-ride="carousel">
				      <!-- Indicators -->
				      <ol class="carousel-indicators">
				        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				        <li data-target="#myCarousel" data-slide-to="1"></li>
				        <li data-target="#myCarousel" data-slide-to="2"></li>
				      </ol>
				      <div class="carousel-inner csstransforms" role="listbox">
				      	<div class="item active">
				          <div class="container">
				            <div class="carousel-caption">
				              <h1>Welcome to SINCLAIR BROADCAST GROUP</h1>
				              <p>The largest and most diversified television<br>broadcasting company in the country today</p>
				              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p> -->
				            </div>
				          </div>
				        </div>
				        <div class="item ">
				          <div class="container">
				            <div class="carousel-caption">
				              <h1>Original Content Programming</h1>
				              <p>From Sports and Entertainment<br>to Lifestyle and News</p>
				              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
				            </div>
				          </div>
				        </div>
				        <div class="item">
				          <div class="container">
				            <div class="carousel-caption">
				              <h1>The Future Is Now</h1>
				              <p>Building the most collaborative and creative environment<br>for producing industry-leading media solutions</p>
				              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p> -->
				            </div>
				          </div>
				        </div>
	
				      </div>
				      <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				        <span class="sr-only">Previous</span>
				      </a>
				      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				        <span class="sr-only">Next</span>
				      </a> -->
				    </div><!-- /.carousel -->
				    
				</div>
				<?php
				$spot_args = array(
				'post_type'=>'pr-news',
				'tag'=>'sbgi-spotlight',
				'limit'=>1
				);
				$my_query = new WP_Query( $spot_args);
				while($my_query->have_posts()){
					$my_query->the_post(); ?>
					<ul class="list-group sbgi-spotlight">
						<li class="list-group-item">
							<div class="badge"><i class="fa fa-info"></i></div>
							<div class="list-content">
								<p><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></p> 
							</div>
						</li>
					</ul>	
				<?php	} ?>
	<?php } ?>

	<div id="content" class="site-content">
			<!-- <div class="top-section">
				<?php sparkling_featured_slider(); ?>
				<?php sparkling_call_for_action(); ?>
			</div> -->
		<div class="container-fluid main-content-area">