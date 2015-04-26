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
				<h1 class="text-center"><?php the_title(); ?></h1>
				<?php
				if(get_field('job_title')) { ?>
					<hr/>
						 <span><i><?php echo get_field('job_title');?></i></span>
				<?php } ?>
				
			</div>
		</header><!-- .entry-header -->
		<div class="container">
			<div class="row white-band">
				
				<div class="col-lg-12 entry-content">
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
			</div>
			<!-- <div class="col-lg-4 entry-content">
					<?php if(get_field('portrait_image')) { ?>
						<img src="<?php echo get_field('portrait_image');?>"/>
					<?php } ?>
				</div> -->
			<!-- <div class="row">
				<footer class="col-lg-12 entry-meta">
				</footer>
			</div> -->
		</div>
		
	</div>
</article><!-- #post-## -->
