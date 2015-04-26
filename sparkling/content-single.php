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
					<h1 class="entry-title text-center"><?php the_title(); ?></h1>
				</div>
				<div class="col-lg-12 entry-meta">
					
				</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<div class="row">
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
			</div><!-- .entry-content -->
		</div>

		<footer class="entry-meta row">
			<div class="col-lg-12">
				<?php edit_post_link( __( 'Edit', 'sparkling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
			</div>
		</footer><!-- .entry-meta -->
	</div>
	<!-- author bio, avatar -->
	<!-- <div class="post-inner-content secondary-content-box">
		<div class="author-bio content-box-inner">
			<div class="avatar">
				<?php //echo get_avatar(get_the_author_meta('ID') , '60'); ?>
			</div>
			<div class="author-bio-content">
				<h4 class="author-name"><a href="<?php //echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php //echo get_the_author_meta('display_name'); ?></a></h4>
				<p class="author-description">
				    <?php //echo get_the_author_meta('description'); ?>
				</p>
			</div>		
		</div>
	</div> -->
</article><!-- #post-## -->
