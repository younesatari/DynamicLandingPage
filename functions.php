<?php 

// Load Scripts
function load_scripts() {
   wp_enqueue_style('style', get_stylesheet_uri());
   wp_enqueue_style('mainStyle', get_theme_file_uri('/css/styles.css'));
   wp_enqueue_style('googleFont','https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');
   wp_enqueue_style('googleFontSecond','https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet');
   wp_enqueue_style('fontAwesome','https://use.fontawesome.com/releases/v5.15.4/js/all.js');
   wp_enqueue_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',NULL,'1.0', true);
   wp_enqueue_script('script', get_theme_file_uri('/js/scripts.js'), NULL, '1.1', true);
}

add_action('wp_enqueue_scripts', 'load_scripts');

// Enable custom logo support
add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
   $defaults = array(
       'height'               => 100,
       'width'                => 400,
       'flex-height'          => true,
       'flex-width'           => true,
       'header-text'          => array( 'site-title', 'site-description' ),
       'unlink-homepage-logo' => true, 
   );

   add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// Register Nav Menu
function registerNavMenu() {

  register_nav_menu('nav_menu','Nav Menu');
 
}

add_action('init', 'registerNavMenu');



/**************************** POST TYPES **************************/
/* Add thunbnail support for custom post types*/
add_theme_support( 'post-thumbnails' );
function theme_setup() {
    register_post_type( 'yourposttype', array(
        'supports' => array('title','thumbnail'),
    ));
}
add_action( 'after_setup_theme', 'theme_setup' );

// Hero post type
 function hero_post_type() {
   $labels = array(
     'name' => _x('Hero', 'post type general name'),
     'singular_name' => _x('Hero', 'post type singular name'),
     'add_new' => _x('Add New', 'hero'),
     'add_new_item' => __('Add New hero'),
     'edit_item' => __('Edit hero'),
     'new_item' => __('New hero'),
     'all_items' => __('All hero'),
     'view_item' => __('View hero'),
     'search_items' => __('Search hero'),
     'not_found' =>  __('No hero found'),
     'not_found_in_trash' => __('No hero found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('Hero Section')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'capabilities' => array(
      'create_posts' => false, 
      ),
    'map_meta_cap' => true,
     'has_archive' => true, 
     'hierarchical' => false,
     'menu_position' => null,
     'supports' => array( 'title', 'editor')
   ); 
   register_post_type('hero',$args);
 }
 add_action( 'init', 'hero_post_type' );

 // Services post type
 function services_post_type() {
   $labels = array(
     'name' => _x('Services', 'post type general name'),
     'singular_name' => _x('Services', 'post type singular name'),
     'add_new' => _x('Add New', 'Services'),
     'add_new_item' => __('Add New Services'),
     'edit_item' => __('Edit Services'),
     'new_item' => __('New Services'),
     'all_items' => __('All Services'),
     'view_item' => __('View Services'),
     'search_items' => __('Search Services'),
     'not_found' =>  __('No Services found'),
     'not_found_in_trash' => __('No Services found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('Services Section')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'hierarchical' => false,
     'menu_position' => null,
     'supports' => array( 'title' )
   ); 
   register_post_type('services',$args);
 }
 add_action( 'init', 'services_post_type' );

 // Products post type
 function products_post_type() {
   $labels = array(
     'name' => _x('Products', 'post type general name'),
     'singular_name' => _x('Product', 'post type singular name'),
     'add_new' => _x('Add New', 'Product'),
     'add_new_item' => __('Add New Product'),
     'edit_item' => __('Edit Product'),
     'new_item' => __('New Product'),
     'all_items' => __('All Product'),
     'view_item' => __('View Product'),
     'search_items' => __('Search Product'),
     'not_found' =>  __('No Product found'),
     'not_found_in_trash' => __('No Product found in Trash'), 
     'parent_item_colon' => '',
     'menu_name' => __('Products Section')
 
   );
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     'hierarchical' => false,
     'menu_position' => null,
     'taxonomies' => array( 'category' ),
     'supports' => array('thumbnail' )
   ); 
   register_post_type('products',$args);
 }
 add_action( 'init', 'products_post_type' );

 // About section post type
 function about_post_type() {
  $labels = array(
    'name' => _x('about', 'post type general name'),
    'singular_name' => _x('about', 'post type singular name'),
    'add_new' => _x('Add New', 'about'),
    'add_new_item' => __('Add New about'),
    'edit_item' => __('Edit about'),
    'new_item' => __('New about'),
    'all_items' => __('All about'),
    'view_item' => __('View about'),
    'search_items' => __('Search about'),
    'not_found' =>  __('No about found'),
    'not_found_in_trash' => __('No about found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('abouts Section')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'taxonomies' => array( 'category' ),
    'supports' => array('thumbnail','title' )
  ); 
  register_post_type('about',$args);
}
add_action( 'init', 'about_post_type' );

// About section post type
function team_post_type() {
  $labels = array(
    'name' => _x('team', 'post type general name'),
    'singular_name' => _x('team', 'post type singular name'),
    'add_new' => _x('Add New', 'team'),
    'add_new_item' => __('Add New team'),
    'edit_item' => __('Edit team'),
    'new_item' => __('New team'),
    'all_items' => __('All team'),
    'view_item' => __('View team'),
    'search_items' => __('Search team'),
    'not_found' =>  __('No team found'),
    'not_found_in_trash' => __('No team found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('Team Section')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'taxonomies' => array( 'category' ),
    'supports' => array('thumbnail' )
  ); 
  register_post_type('team',$args);
}
add_action( 'init', 'team_post_type' );

// About clients post type
function clients_post_type() {
  $labels = array(
    'name' => _x('Clients', 'post type general name'),
    'singular_name' => _x('client', 'post type singular name'),
    'add_new' => _x('Add New', 'client'),
    'add_new_item' => __('Add New client'),
    'edit_item' => __('Edit client'),
    'new_item' => __('New client'),
    'all_items' => __('All client'),
    'view_item' => __('View client'),
    'search_items' => __('Search client'),
    'not_found' =>  __('No client found'),
    'not_found_in_trash' => __('No client found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('Clients Section')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'taxonomies' => array( 'category' ),
    'supports' => array('thumbnail' )
  ); 
  register_post_type('clients',$args);
}
add_action( 'init', 'clients_post_type' );

// Footer Post Type
function footer_links_func() {
  $labels = array(
    'name' => _x('Footer Links', 'post type general name'),
    'singular_name' => _x('Footer Link', 'post type singular name'),
    'add_new' => _x('Add New', 'Footer Link'),
    'add_new_item' => __('Add New Footer Link'),
    'edit_item' => __('Edit Footer Link'),
    'new_item' => __('New Footer Link'),
    'all_items' => __('All Footer Link'),
    'view_item' => __('View Footer Link'),
    'search_items' => __('Search Footer Link'),
    'not_found' =>  __('No Footer Link found'),
    'not_found_in_trash' => __('No Footer Link found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('Footer Links')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title')
  ); 
  register_post_type('footerLink',$args);
}
add_action( 'init', 'footer_links_func' );

