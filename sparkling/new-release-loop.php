<?php foreach(get_tags(array('order' => 'DESC')) as $term): ?>
	<?php $posty = get_posts( array( 'post_type' => 'news', 'orderby' => 'title','order' => 'DESC', 'tag__in' => $term->term_id ) ); ?>
		<?php if($posty) : ?>
			<a href="tag/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
		<?php endif; ?>
<?php endforeach ?>


<?php foreach(get_tags(array('order' => 'DESC')) as $term){ ?>
<?php $posts = get_posts( array( 'posts_per_page' => -1, 'post_type' => 'news', 'orderby' => 'title','order' => 'DESC', 'tag__in' => $term->term_id ) ); ?>

<?php if($posts) : ?>
<div class="row">
   <div class="col-lg-12"> 
		<h2><a href="tag/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></h2>
   </div>
</div>
<div class="row">
<?php foreach($posts as $post) : ?>
        <?php setup_postdata($post); ?>

         <div class="col-lg-6">
			<div class="panel panel-default">
			  	<div class="panel-heading">
				    <h2 class="panel-title"><a href="<?php echo the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</div>
				<div class="panel-body">
				    <?php the_excerpt(); ?>
				</div>
				 <div class="panel-footer"><p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'sparkling' ); ?></a></p></div>
			</div>
		</div>

 <?php endforeach ?>
</div>
 <?php wp_reset_postdata(); ?>

<?php endif; ?>

<?php } ?>