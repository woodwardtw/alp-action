<?php
/**
 * custom post types and taxonomies
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



//journey custom post type

// Register Custom Post Type journey
// Post Type Key: journey

function create_journey_cpt() {

  $labels = array(
    'name' => __( 'Journeys', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Journey', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Journey', 'textdomain' ),
    'name_admin_bar' => __( 'Journey', 'textdomain' ),
    'archives' => __( 'Journey Archives', 'textdomain' ),
    'attributes' => __( 'Journey Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Journey:', 'textdomain' ),
    'all_items' => __( 'All Journeys', 'textdomain' ),
    'add_new_item' => __( 'Add New Journey', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Journey', 'textdomain' ),
    'edit_item' => __( 'Edit Journey', 'textdomain' ),
    'update_item' => __( 'Update Journey', 'textdomain' ),
    'view_item' => __( 'View Journey', 'textdomain' ),
    'view_items' => __( 'View Journeys', 'textdomain' ),
    'search_items' => __( 'Search Journeys', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into journey', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this journey', 'textdomain' ),
    'items_list' => __( 'Journey list', 'textdomain' ),
    'items_list_navigation' => __( 'Journey list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Journey list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'journey', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-location-alt',
  );
  register_post_type( 'journey', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_journey_cpt', 0 );




//challenge custom post type

// Register Custom Post Type challenge
// Post Type Key: challenge

function create_challenge_cpt() {

  $labels = array(
    'name' => __( 'Challenges', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Challenge', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Challenge', 'textdomain' ),
    'name_admin_bar' => __( 'Challenge', 'textdomain' ),
    'archives' => __( 'Challenge Archives', 'textdomain' ),
    'attributes' => __( 'Challenge Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Challenge:', 'textdomain' ),
    'all_items' => __( 'All Challenges', 'textdomain' ),
    'add_new_item' => __( 'Add New Challenge', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Challenge', 'textdomain' ),
    'edit_item' => __( 'Edit Challenge', 'textdomain' ),
    'update_item' => __( 'Update Challenge', 'textdomain' ),
    'view_item' => __( 'View Challenge', 'textdomain' ),
    'view_items' => __( 'View Challenges', 'textdomain' ),
    'search_items' => __( 'Search Challenges', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into challenge', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this challenge', 'textdomain' ),
    'items_list' => __( 'Challenge list', 'textdomain' ),
    'items_list_navigation' => __( 'Challenge list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Challenge list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'challenge', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-superhero',
  );
  register_post_type( 'challenge', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_challenge_cpt', 0 );


add_action( 'init', 'create_phase_taxonomies', 0 );
function create_phase_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Phases', 'taxonomy general name' ),
    'singular_name' => _x( 'Phase', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Phases' ),
    'popular_items' => __( 'Popular Phases' ),
    'all_items' => __( 'All Phases' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Phases' ),
    'update_item' => __( 'Update phase' ),
    'add_new_item' => __( 'Add New phase' ),
    'new_item_name' => __( 'New phase' ),
    'add_or_remove_items' => __( 'Add or remove Phases' ),
    'choose_from_most_used' => __( 'Choose from the most used Phases' ),
    'menu_name' => __( 'Phase' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Phases',array('post','challenge'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'phase' ),
    'show_in_rest'          => true,
    'rest_base'             => 'phase',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}

