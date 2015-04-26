<?php
/**
 * @package sparkling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail( 'sparkling-featured', array( 'class' => 'single-featured' )); ?>
	<div class="post-inner-content">
		
		<header class="entry-header page-header row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</header><!-- .entry-header -->
		
		<div class="container">
			<div class="row">
				<div class="col-lg-8 entry-content">
					<div class="entry-meta">
						<?php the_date(); ?>
					</div><!-- .entry-meta -->
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before'            => '<div class="page-links">'.__( 'Pages:', 'sparkling' ),
							'after'             => '</div>',
							'link_before'       => '<span>',
							'link_after'        => '</span>',
							'pagelink'          => '%',
							'echo'              => 1
			       		) );
			    	?>
			    	<?php edit_post_link( __( 'Edit', 'sparkling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				<div class="col-lg-4 entry-content">
					<?php get_search_form(); ?>
					<h4 class="single-entry-header">RECENT NEWS RELEASES</h4>
					<ul class="recent-posts-list">
						<?php		    
						$args_prnews = array(
							'posts_per_page' => 10,
							'post_type' => 'pr-news',
							'orderby' => 'date',
							'order' => 'DESC'
						);
						$postx_counter = 0;
						$my_queryx = new WP_Query($args_prnews);
							while($my_queryx->have_posts()){
								$postx_counter++;
						  		$my_queryx->the_post(); 
						  		?>
						  		<li class="link-title"><?php the_date(); ?></li>
								<li><a class="p-link" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a></li>
						<?php	} ?>
						<div class="sbgi-btngroup">
						<li><a class="btn-link" href="<?php bloginfo( 'url' ); ?>/company-news/" rel="bookmark">More News <i class="fa fa-angle-right"></i></a></li>
						</div>
					</ul>
				</div>
			</div>
			<!-- <div class="row">
				<footer class="col-lg-12 entry-meta">
				</footer>
			</div> -->
			
		</div>
		
	</div>
</article><!-- #post-## -->
