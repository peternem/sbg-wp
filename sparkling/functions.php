<?php
/**
 * Sparkling functions and definitions
 *
 * @package sparkling
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 648; /* pixels */
}
/** Add SVG Support to media library
*/
	function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );
    // Add SVG Thumbnails to media library grid
		function custom_admin_head() {
	  $css = '';

	  $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';

	  echo '<style type="text/css">'.$css.'</style>';
	}
/**
 * Set the content width for full width pages with no sidebar.
 */
function sparkling_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1008; /* pixels */
  }
}
add_action( 'template_redirect', 'sparkling_content_width' );

/**
 * To get the tag id by tag name
 */

function get_tag_ID($tag_name) {
$tag = get_term_by('name', $tag_name, 'post_tag');
if ($tag) {
return $tag->term_id;
} else {
return 0;
}
}
/**
 * To help determine what taxonomy is being used. Add the following code snippet to a page. $out = get_taxonomies(  ); print_r($out); 
 */


function themes_taxonomy() {
register_taxonomy(
    'pr-news','pr-news',
    array(
        'hierarchical'      => true,
        'label'             => 'Categories - PR News',
        'show_ui' 			=> true,
        'show_admin_column' => true,
        'query_var'         => true
    )
); } add_action( 'init', 'themes_taxonomy');


add_action( 'init', 'codex_news_init' );

function codex_news_init() {
	$labels = array(
		'name'               => _x( 'pr-news', 'post type general name'),
		'singular_name'      => _x( 'pr-news Item', 'post type singular name'),
		'menu_name'          => _x( 'PR News', 'admin menu'),
		'name_admin_bar'     => _x( 'PR News', 'add new on admin bar'),
		'add_new'            => _x( 'New', 'PR News Item'),
		'add_new_item'       => __( 'Add New PR News Item'),
		'new_item'           => __( 'New PR News Item'),
		'edit_item'          => __( 'Edit PR News Item'),
		'view_item'          => __( 'View PR News Item'),
		'all_items'          => __( 'All PR News'),
		'search_items'       => __( 'Search PR News'),
		'parent_item_colon'  => __( 'Parent PR News:'),
		'not_found'          => __( 'No PR News Found.'),
		'not_found_in_trash' => __( 'No PR News Found in Trash.')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite' => array( 'slug' => 'pr-news','with_front' => true),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies' 		=> array('post_tag') // this is IMPORTANT
	);
	register_post_type( 'pr-news', $args );	
}

function history_taxonomy() {
register_taxonomy(
    'sbg-history','history',
    array(
        'hierarchical'      => true,
        'label'             => 'Categories - History',
        'show_ui' 			=> true,
        'show_admin_column' => true,
        'query_var'         => true
    )
); } add_action( 'init', 'history_taxonomy');

/**
 * Register a financial event post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action( 'init', 'codex_financial_events_init' );

function codex_financial_events_init() {
    $labels = array(
        'name'               => _x( 'Financial Events', 'post type general name'),
        'singular_name'      => _x( 'Financial Event', 'post type singular name'),
        'menu_name'          => _x( 'Financial Events', 'admin menu'),
        'name_admin_bar'     => _x( 'Financial Event', 'add new on admin bar'),
        'add_new'            => _x( 'Add New', 'financial event'),
        'add_new_item'       => __( 'Add New Financial Event'),
        'new_item'           => __( 'New Financial Event'),
        'edit_item'          => __( 'Edit Financial Event'),
        'view_item'          => __( 'View Financial Event'),
        'all_items'          => __( 'All Financial Events'),
        'search_items'       => __( 'Search Financial Events'),
        'parent_item_colon'  => __( 'Parent Financial Events:'),
        'not_found'          => __( 'No financial events found.'),
        'not_found_in_trash' => __( 'No financial events found in Trash.')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'rewrite'            => false,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'financial_events', $args );
}

function financial_event_type_taxonomy() {
    register_taxonomy(
        'financial_event_type','financial_events',
        array(
            'hierarchical'      => true,
            'label'             => 'Financial Event Type',
            'show_ui' 			=> true,
            'show_admin_column' => true,
            'query_var'         => true
        )
    ); } add_action( 'init', 'financial_event_type_taxonomy');

add_action( 'add_meta_boxes', 'financial_event_start_date' );
function financial_event_start_date() {
    add_meta_box(
        'financial_event_start_date',
        __( 'Event Start Date'),
        'financial_event_start_date_content',
        'financial_events',
        'side',
        'high'
    );
    load_date_items();
}

function financial_event_start_date_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'financial_event_start_date_nonce' );
    $value = get_post_meta( $post->ID, 'financial_event_start_date', true );
    if($value != '') $value = date('m/d/Y', esc_attr($value));
    echo '<label for="financial_event_start_date"></label>';
    echo '<input type="text" id="financial_event_start_date_field" class="datepicker" name="financial_event_start_date" value="'.$value.'" required />';
	echo '<p style="color:red;">For Single Day Events: Add the event start date to "End Date" form field below.</p>';
}

add_action( 'add_meta_boxes', 'financial_event_end_date' );
function financial_event_end_date() {
    add_meta_box(
        'financial_event_end_date',
        __( 'Event End Date'),
        'financial_event_end_date_content',
        'financial_events',
        'side',
        'high'
    );
}

function financial_event_end_date_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'financial_event_end_date_nonce' );
    $value = get_post_meta( $post->ID, 'financial_event_end_date', true );
    if($value != '') $value = date('m/d/Y', esc_attr($value));
    echo '<label for="financial_event_end_date"></label>';
    echo '<input type="text" id="financial_event_end_date_field" class="datepicker" name="financial_event_end_date" value="'.$value.'" />';
}

/*End of financial post type section.*/


add_action( 'init', 'codex_history_init' );

function codex_history_init() {
	$labels = array(
		'name'               => _x( 'History', 'post type general name'),
		'singular_name'      => _x( 'History Item', 'post type singular name'),
		'menu_name'          => _x( 'History', 'admin menu'),
		'name_admin_bar'     => _x( 'History', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'History Item'),
		'add_new_item'       => __( 'Add New History Item'),
		'new_item'           => __( 'New History Item'),
		'edit_item'          => __( 'Edit History Item'),
		'view_item'          => __( 'View History Item'),
		'all_items'          => __( 'All History'),
		'search_items'       => __( 'Search History'),
		'parent_item_colon'  => __( 'Parent History:'),
		'not_found'          => __( 'No History Found.'),
		'not_found_in_trash' => __( 'No History Found in Trash.')
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite' => array( 'slug' => 'history','with_front' => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies' => array( 'post_tag') // this is IMPORTANT
	);
	register_post_type( 'history', $args );	
}

/**
 * Register an investor relations post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action( 'init', 'codex_investor_relations_init' );

function codex_investor_relations_init() {
    $labels = array(
        'name'               => _x( 'Investor Presentations', 'post type general name'),
        'singular_name'      => _x( 'Investor Presentations', 'post type singular name'),
        'menu_name'          => _x( 'Investor Presentations', 'admin menu'),
        'name_admin_bar'     => _x( 'Investor Presentations', 'add new on admin bar'),
        'add_new'            => _x( 'Add New', 'Investor Presentations'),
        'add_new_item'       => __( 'Add New Investor Presentations'),
        'new_item'           => __( 'New Investor Presentations'),
        'edit_item'          => __( 'Edit Investor Presentations'),
        'view_item'          => __( 'View Investor Presentations'),
        'all_items'          => __( 'All Investor Presentations'),
        'search_items'       => __( 'Search Investor Presentations'),
        'parent_item_colon'  => __( 'Parent Investor Presentations:'),
        'not_found'          => __( 'No Investor Presentations found.'),
        'not_found_in_trash' => __( 'No Investor Presentations found in Trash.')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'rewrite'            => false,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'investor_relations', $args );
}

add_action( 'add_meta_boxes', 'investor_relations_date' );
function investor_relations_date() {
    add_meta_box(
        'investor_relations_date',
        __( 'Document Date'),
        'investor_relations_date_content',
        'investor_relations',
        'side',
        'high'
    );
    load_date_items();
}

function investor_relations_date_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'investor_relations_date_nonce' );
    $value = get_post_meta( $post->ID, 'investor_relations_date', true );
    if($value != '') $value = date('m/d/Y', esc_attr($value));
    echo '<label for="investor_relations_date_field"></label>';
    echo '<input type="text" class="datepicker" id="investor_relations_date_field" name="investor_relations_date" value="'.$value.'" required />';
}

add_action( 'add_meta_boxes', 'investor_relations_documents' );
function investor_relations_documents() {
    add_meta_box(
        'investor_relations_documents',
        __( 'Documents'),
        'investor_relations_documents_content',
        'investor_relations',
        'side',
        'high'
    );
}

function investor_relations_documents_content( $post ) {
    wp_nonce_field( plugin_basename( __FILE__ ), 'investor_relations_documents_nonce' );
    $values = get_post_meta( $post->ID, 'investor_relations_documents', true );
    $value = '';
    if(is_array($values)){
    foreach($values as $v){
        $filePath = esc_attr($v);
        $name = basename($filePath);
        $value .= '<div class ="ui-state-default ui-sortable-handle"><input type="hidden" name="investor_relations_documents[]" value="'.$filePath.'" /><img src="/wp-content/themes/'.get_template().'/images/pdficon_large.png" height="20" width="20" />'.$name.'&nbsp;<a href="#" class="upload_file_remove">Remove</a></div>';
    }
    }
    echo '<label for="investor_relations_documents"></label>';
    echo '<input class="upload_file_button" id="investor_relations_upload_file_button" type="button" value="Choose/Upload PDF" />';
    echo '<div id="investor_relations_documents_list">'.$value.'</div>';
}



/*End of investor relations post type section.*/

/*Save Metadata Section.*/

add_action('save_post', 'save_my_metadata');

function save_my_metadata($id = false, $post = false){
    if($_POST['post_type'] == 'investor_relations' || $_POST['post_type'] == 'financial_events') {
        $time_convert = array('investor_relations_date', 'financial_event_start_date', 'financial_event_end_date');
        $types = array_merge($time_convert, array('investor_relations_documents'));
        foreach($types as $t){
            if(isset($_POST[$t])){
                $val = $_POST[$t];
                if(in_array($t, $time_convert)) $val = strtotime($val);
                update_post_meta($id, $t, $val);
            }
        }
    }
}
//
/*End of save metadata section.*/

//
/*Function for adding datepicker functionality.*/
function load_date_items(){
    wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('meta-media-uploader-script', get_template_directory_uri().'/inc/js/meta-media-uploader.js', array('jquery','media-upload','thickbox'));
    $uploader_args = array( 'site_url' => get_option('siteurl'), 'template_path'=>'/wp-content/themes/'.get_template(), 'allowed_exts'=>array('pdf', 'jpg', 'png', 'svg', 'jpeg'), 'date_format'=>'mm/dd/yy');
    wp_localize_script( 'meta-media-uploader-script', 'uploader_args', $uploader_args );
    wp_enqueue_script('meta-media-uploader-script');
    wp_enqueue_style('thickbox');
    wp_register_style('meta-media-uploader-style', get_template_directory_uri().'/inc/css/meta-media-uploader.css');
    wp_enqueue_style('meta-media-uploader-style');
}


function people_taxonomy() {
register_taxonomy(
    'sbg-people','people',
    array(
        'hierarchical'      => true,
        'label'             => 'Categories - people',
        'show_ui' 			=> true,
        'show_admin_column' => true,
        'query_var'         => true
    )
); } add_action( 'init', 'people_taxonomy');

add_action( 'init', 'codex_people_init' );

function codex_people_init() {
	$labels = array(
		'name'               => _x( 'People', 'post type general name'),
		'singular_name'      => _x( 'People Item', 'post type singular name'),
		'menu_name'          => _x( 'People', 'admin menu'),
		'name_admin_bar'     => _x( 'People', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'People Item'),
		'add_new_item'       => __( 'Add New People Item'),
		'new_item'           => __( 'New People Item'),
		'edit_item'          => __( 'Edit People Item'),
		'view_item'          => __( 'View People Item'),
		'all_items'          => __( 'All People'),
		'search_items'       => __( 'Search People'),
		'parent_item_colon'  => __( 'Parent People:'),
		'not_found'          => __( 'No People Found.'),
		'not_found_in_trash' => __( 'No People Found in Trash.')
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite' => array( 'slug' => 'people','with_front' => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies' => array( 'post_tag') // this is IMPORTANT
	);
	register_post_type( 'people', $args );	
}

/**
 * The following limits word counts in excerpts
 * Example use: <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,25); ?>
 */
 
// function string_limit_words($string, $word_limit)
// {
  // $words = explode(' ', $string, ($word_limit + 1));
  // if(count($words) > $word_limit)
  // array_pop($words);
  // return implode(' ', $words);
// }
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  //add a ... at last article when more than limit word count
  echo implode(' ', $words)."..."; } else {
  //otherwise
  echo implode(' ', $words); }
}



/**
 * The following helps with creating a Custom Post Type tags/categories archive page
 */
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post','History','People','pr-news', 'nav_menu_item');
    	$query->set('post_type',$post_type);
	return $query;
    }
}

if ( ! function_exists( 'sparkling_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sparkling_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'sparkling', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'sparkling-full-width' , 2560, 1049, true); //Full Width Thumbnail
  	add_image_size( 'sparkling-featured', 1346, 610, true );
	add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail
	add_image_size( 'sbgn-post-small', 370, 207 , true); // Small Thumbnail
	add_image_size( 'sbgn-history-small', 480, 350 , true); // Small Thumbnail

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sparkling' ),
		'footer-links' => __( 'Footer Links', 'sparkling' ) // secondary nav in footer
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sparkling_custom_background_args', array(
		'default-color' => 'F2F2F2',
		'default-image' => '',
	) ) );

  // Enable support for HTML5 markup.
  add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
    'caption',
  ) );
}
endif; // sparkling_setup
add_action( 'after_setup_theme', 'sparkling_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sparkling_widgets_init() {
  	register_sidebar( array(
  		'name'          => __( 'Sidebar', 'sparkling' ),
  		'id'            => 'sidebar-1',
  		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</aside>',
  		'before_title'  => '<h3 class="widget-title">',
  		'after_title'   => '</h3>',
  	) );

    register_sidebar(array(
    	'id' => 'home-widget-1',
    	'name' => __( 'Homepage Widget 1', 'sparkling' ),
    	'description' => __( 'Displays on the Home Page', 'sparkling' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'home-widget-2',
      'name' =>  __( 'Homepage Widget 2', 'sparkling' ),
      'description' => __( 'Displays on the Home Page', 'sparkling' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'home-widget-3',
      'name' =>  __( 'Homepage Widget 3', 'sparkling' ),
      'description' =>  __( 'Displays on the Home Page', 'sparkling' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
    	'id' => 'footer-widget-1',
    	'name' =>  __( 'Footer Widget 1', 'sparkling' ),
    	'description' =>  __( 'Used for footer widget area', 'sparkling' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'footer-widget-2',
      'name' =>  __( 'Footer Widget 2', 'sparkling' ),
      'description' =>  __( 'Used for footer widget area', 'sparkling' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'footer-widget-3',
      'name' =>  __( 'Footer Widget 3', 'sparkling' ),
      'description' =>  __( 'Used for footer widget area', 'sparkling' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_widget( 'sparkling_social_widget' );
    register_widget( 'sparkling_popular_posts' );
    register_widget( 'sparkling_categories' );

}
add_action( 'widgets_init', 'sparkling_widgets_init' );



/* --------------------------------------------------------------
       Theme Widgets
-------------------------------------------------------------- */
require_once(get_template_directory() . '/inc/widgets/widget-categories.php');
require_once(get_template_directory() . '/inc/widgets/widget-social.php');
require_once(get_template_directory() . '/inc/widgets/widget-popular-posts.php');

/**
 * adding the sparkling search form (created in extra.php)
 */

add_filter( 'get_search_form', 'sparkling_wpsearch' );

/**
 * This function removes inline styles set by WordPress gallery.
 */
function sparkling_remove_gallery_css( $css ) {
  return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}

add_filter( 'gallery_style', 'sparkling_remove_gallery_css' );

/* 
 *//* 
 *//**
 * Enqueue scripts and styles.
 */
function sparkling_scripts() {

  	// Add Bootstrap default CSS
  	//wp_enqueue_style( 'sparkling-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
  	wp_enqueue_style( 'sparkling-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css' );

  	// Add Font Awesome stylesheet
  	wp_enqueue_style( 'sparkling-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

  	// Add Google Fonts	
	wp_register_style( 'sparkling-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700|Roboto+Slab:400,300,700');
 	wp_enqueue_style( 'https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700|Roboto+Slab:400,300,700' );


  	// Add slider CSS only if is front page ans slider is enabled
	if( ( is_home() || is_front_page() ) && of_get_option('sparkling_slider_checkbox') == 1 ) {
		//wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/inc/css/flexslider.css' );
	}
	
  	// Add main theme stylesheet
	wp_enqueue_style( 'sparkling-style', get_stylesheet_uri() );

  	// Add Modernizr for better HTML5 and CSS3 support
  	wp_enqueue_script('sparkling-modernizr', get_template_directory_uri().'/inc/js/modernizr.min.js', array('jquery'), 'v2.8.3');
  	
  	// Add Bootstrap default JS
	//wp_enqueue_script('sparkling-bootstrapjs', get_template_directory_uri().'/inc/bootstrap/js/bootstrap.min.js', array('jquery'), 'v3.3.1');
	wp_enqueue_script('sparkling-bootstrapjs', get_template_directory_uri().'/inc/bootstrap/js/bootstrap.js', array('jquery'), 'v3.3.1');
	
	// Add Parralax effect - only if is Home page or front page
	wp_enqueue_script( 'parallax', get_template_directory_uri().'/inc/js/jquery.parallax-1.1.3.js', array('jquery'), 'v1.1.3' );
	
	// Main theme related Smooth Scroll functions
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/inc/js/jquery-ui.js', array('jquery'), 'v1.11.2' );
	wp_enqueue_script( 'SmoothScroll', get_template_directory_uri() . '/inc/js/SmoothScroll.js', array('jquery'), 'v1.2.1' );
	wp_enqueue_script( 'jquery.easing.1.3', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array('jquery'), 'v1.3' );
		
	if( ( is_home() || is_front_page() )) {
		wp_enqueue_script( 'jquery.appear', get_template_directory_uri() . '/inc/js/jquery.appear.js', array('jquery') );
		wp_enqueue_script( 'sparkling-functions', get_template_directory_uri() . '/inc/js/count.js', array('jquery') );
		wp_enqueue_script( 'sparkling_scripts', get_template_directory_uri().'/inc/js/facts.js', array('jquery'), 'v1.0' );
		
		wp_enqueue_script( 'big-video-script-x', get_template_directory_uri().'/inc/js/video.js', 'v1.0' );
		wp_enqueue_script( 'big-video-script', get_template_directory_uri().'/inc/js/bigvideo.js', 'v1.0' );
		wp_enqueue_script( 'get-stock-script', get_template_directory_uri().'/inc/js/stockquote.js', 'v1.0' );
 	}
	
  	// Add slider JS only if is front page ans slider is enabled
	if( ( is_home() || is_front_page() ) && of_get_option('sparkling_slider_checkbox') == 1 ) {
		wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/js/flexslider.min.js', array('jquery'), '20140222', true );
	}
    
    //Add JQuery Touch support for bootstrap carousel
    if( ( is_home() || is_front_page() )){
        wp_enqueue_script( 'jquery.mobile.custom.', get_template_directory_uri().'/inc/js/jquery.mobile.custom.min.js', array('jquery'), 'v1.3.2' );  
    }

  	// Flexslider customization
  	if( ( is_home() || is_front_page() ) && of_get_option('sparkling_slider_checkbox') == 1 ) {
    	wp_enqueue_script( 'flexslider-customization', get_template_directory_uri() . '/inc/js/flexslider-custom.js', array('jquery', 'flexslider-js'), '20140716', true );
 	}
  	// Main theme related functions
	//wp_enqueue_script( 'sparkling-functions', get_template_directory_uri() . '/inc/js/functions.min.js', array('jquery') );
	wp_enqueue_script( 'functions', get_template_directory_uri() . '/inc/js/functions.js', array('jquery') );
	
	// This one is for accessibility
  	//wp_enqueue_script( 'sparkling-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20140222', true );

  	// Treaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sparkling_scripts' );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/inc/admin/');
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/admin/');
require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';