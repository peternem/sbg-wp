<?php
/*
Template Name: Company PR News
*/
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <?php if (have_posts()) : while (have_posts()) : the_post();?>
		    <div id="content-title" class="widecolumn page-title row">	
		    	 <h1 class="text-center" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
			</div>
			<div class="container">
				<div id="NewsList" class="pr-news-list white-band">	
				<script>
				    jQuery(function() { // Shorthand for $(document).ready(function() {
				        jQuery('#boxes').children().first().show();
				        //jQuery('#boxes').children().hide();
				        var xxx =  jQuery('#choices1 li:first-child a').text();
				        console.log (xxx);
				      	jQuery('#dLabel-pr').text(xxx).append('  <i class=\"fa fa-angle-down\"></i>');
				        
				        jQuery('#choices1 li a').click(function() {
				        	var answer = jQuery(this).attr('href');
				         	var str=jQuery(this).attr('href');
				         	
				            jQuery('#dLabel-pr').text(str.replace("#", "")).append('  <i class=\"fa fa-angle-down\"></i>');
				             console.log(answer);
				            if (answer == 'all') {
				                jQuery('#boxes').children().slideDown();
				            }
				            else {
				                jQuery(answer).slideDown().siblings().slideUp();
				            }
				        });
				    });
				    
				   
						 
				       
				        
				</script>

				<div class="row">
					<div class="col-lg-12">
						<div class="dropdown pr-dropdown">
						  <button id="dLabel-pr" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    
						    <i class="fa fa-angle-down"></i>
						  </button>
						  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" id="choices1">
							<?php foreach(get_tags(array('order' => 'DESC' )) as $termx){ ?>
							
							<?php 
							$posts = get_posts( array( 'posts_per_page' => -1, 'post_type' => 'pr-news', 'orderby' => 'date','order' => 'DESC','tag__in' => $termx->term_id )); ?>
							
							<?php 
								if($posts && $termx->slug != "sbgi-spotlight") {
									if ($termx->slug != "sbgi-spotlight") { ?>
											<li value="<?php echo $termx->name; ?>"><a href="<?php echo "#".$termx->name; ?>"><?php echo $termx->name; ?></a></li>
									<?php }
								} ?>				
						<?php } ?>	
						<option value="--"> --- Archives --- </option>			
						  	 <?php
 
						// open the current directory
						$dhandle = opendir('./wp-content/uploads/company-news-archives');
						// define an array to hold the files
						$files = array();
						
						if ($dhandle) {
						   // loop through all of the files
						   while (false !== ($fname = readdir($dhandle))) {
						      // if the file is not this file, and does not start with a '.' or '..', then store it for later display
						      if (($fname != '.') && ($fname != '..') && ($fname != '.DS_Store')) {
						          // store the filename
						          $files[] = (is_dir( "./$fname" )) ? "(Dir) {$fname}" : $fname;
								  // Sort the filename array
								  krsort($files);
						      }
						   }
						   // close the directory
						   closedir($dhandle);
						}
						
						
						// Now loop through the files, echoing out a new select option for each one
						foreach( $files as $fname ) {
						   echo "<li value=".$fname."><a href="."#".$fname.">".$fname."</a></li>\n";
						}
						?>
								</ul>
							</div>
						</div>
				</div>
				<div id="boxes">
					<?php $postx_counter = -1; ?>
					<?php foreach(get_tags(array('order' => 'DESC' )) as $term){ ?>
					
					<?php 
					$posts = get_posts( array( 'posts_per_page' => -1, 'post_type' => 'pr-news', 'orderby' => 'date', 'order' => 'DESC', 'tag__in' => $term->term_id )); ?>
					<?php 
					if($posts) {
					 	if ($term->slug != "sbgi-spotlight") { ?>
					 		<div ID="<?php echo $term->name; ?>" class="row arch-panel">
								<!-- <div class="col-lg-12">
									<h2 class="text-center"><?php echo $term->name; ?></h2>
								</div> -->
								
								<?php foreach($posts as $post) {
								if ($term->slug != "sbgi-spotlight") { 
								?>
								<?php setup_postdata($post); ?>
								<div class="col-md-2">
								<div class="date">
								<a class="" href="<?php the_permalink(); ?>"><?php echo $origpostdate = get_the_date('m.d.Y'); ?></a>
								</div>
								<!-- <div class="title"><a class="" href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></div> -->
								</div>
								<div class="col-md-10">
								<?php //the_excerpt(); ?>
								<p><a class="pr-news-headline" href="<?php the_permalink(); ?>"><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,30); ?></a></p>
								</div>			
								
								
								<?php } ?>	
								
								<?php } ?>
					</div>
					<?php }
					} ?>
				<?php wp_reset_postdata(); ?>	
								
				<?php } ?>	
					
				<?php endwhile;?>
				
				<?php endif; ?>
				<?php

getDirectory( "./wp-content/uploads/company-news-archives" ); 
function getDirectory( $path = '.', $level = 0 ){

$ignore = array( 'cgi-bin', '.', '..', '.DS_Store' ); 
// Directories to ignore when listing output. Many hosts 
// will deny PHP access to the cgi-bin. 

$dh = @opendir( $path ); 
// Open the directory to the handle $dh 

while( false !== ( $file = readdir( $dh ) ) ){ 
// Loop through the directory 

    if( !in_array( $file, $ignore ) ){ 
    // Check that this file is not to be ignored 

        //$spaces = str_repeat( 'xxx', ( $level * 4 ) ); 
        // Just to add spacing to the list, to better 
        // show the directory tree. 

        if( is_dir( "$path/$file" ) ){ 
        // Its a directory, so we need to keep reading down... 
			echo "<div id=".$file." class=\"row arch-panel\">";
			echo "<div class=\"col-lg-12\">" ;
           // echo "<h2 class=\"text-center\">$spaces $file</h2>"; 
            getDirectory( "$path/$file", ($level+1) ); 
            // Re-call this same function but on a new directory. 
            // this is what makes function recursive. 
            echo "</div>";
			echo "</div>" ;
           

        } else { ?>
        	
			
			<?php
            	//echo "<p>$path/$file</p>"; 
				$mainx =ltrim($path, '.'); 
				echo "<p><a href =".$mainx."/".$file." target=\"_blank\">".$file."</a></p>";
            // Just print out the filename 
			?>
			<?php
        } 

    } 

} 

closedir( $dh ); 
// Close the directory handle 
}
?>				

					 </div><!--  boxes -->		
					 <div> 

 
  	 </div>
				</div>	<!-- NewsList -->
			</div><!-- container -->
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
