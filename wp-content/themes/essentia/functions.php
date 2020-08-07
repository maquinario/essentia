<?php
// Adds post thumbnail support
add_theme_support('post-thumbnails');

// Custom excerpt mysql_fetch_lengths
function excerptLength($length) {
    return 10;
}
add_filter('excerpt_length', 'excerptLength');

// Add excerpt to pages
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'products', 'excerpt' );

// Add order to posts
add_action('admin_init', 'posts_order');
function posts_order(){
  add_post_type_support( 'post', 'page-attributes' );
}

// Header and footer menus registration
function register_my_menus() {
  register_nav_menus( array(
    'footer_menu' => 'Footer Menu',
    'navigation' => 'Navigation'
  ) );
}
add_action( 'init', 'register_my_menus' );

// Hide admin bar
show_admin_bar(false);

// Allow SVG
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// Custom post types


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type('projetos',
    array(
      'labels' => array(
        'name' => __('Projetos'),
        'singular_name' => __('Projeto')
      ),
      'public' => true,
      'menu_icon' => 'dashicons-location',
      'hierarchical' => true,
      'has_archive' => true,
      'taxonomies' => array('category'),
      'supports' => array(
            'title',
            'editor',
            'thumbnail')
    )
  );
}
