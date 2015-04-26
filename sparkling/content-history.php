<?php
/**
 * @package sparkling
 */
?>
<!-- test -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="sbghistory" class="full-width-header parallax6">
		<?php // the_post_thumbnail( 'sparkling-featured', array( 'class' => 'history-featured' )); ?>
		<?php
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1920, 1449 ), false, '' ); ?> 
		<style>
			#sbghistory {
				background: url(<?php echo $src[0]; ?>) no-repeat;
				background-attachment: fixed;
				background-size: cover;
    			
			} 
		</style>

	</div>
	<div class="container">
		<div class="row white-band">
			<div class="col-lg-12 entry-content">
			<h1 class="entry-title jumbo"><?php the_title(); ?></h1>	
				<?php the_content(); ?>
				<div class="post-links pull-left"><?php previous_post_link('<i class="fa fa-chevron-left"></i> %link'); ?></div> 
				<div class="post-links pull-right"><?php next_post_link('%link <i class="fa fa-chevron-right"></i>'); ?> </div>
			</div><!-- .entry-content -->
		</div>
		<!-- <div class="row">
			<footer class="col-lg-12 entry-meta">
			</footer>
		</div> -->
	</div>
</article><!-- #post-## -->
