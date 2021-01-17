<?php
/**
 * custom post types
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//topic custom post type

// Register Custom Post Type topic
// Post Type Key: topic

function create_topic_cpt() {

  $labels = array(
    'name' => __( 'Topics', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Topic', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Topic', 'textdomain' ),
    'name_admin_bar' => __( 'Topic', 'textdomain' ),
    'archives' => __( 'Topic Archives', 'textdomain' ),
    'attributes' => __( 'Topic Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Topic:', 'textdomain' ),
    'all_items' => __( 'All Topics', 'textdomain' ),
    'add_new_item' => __( 'Add New Topic', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Topic', 'textdomain' ),
    'edit_item' => __( 'Edit Topic', 'textdomain' ),
    'update_item' => __( 'Update Topic', 'textdomain' ),
    'view_item' => __( 'View Topic', 'textdomain' ),
    'view_items' => __( 'View Topics', 'textdomain' ),
    'search_items' => __( 'Search Topics', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into topic', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this topic', 'textdomain' ),
    'items_list' => __( 'Topic list', 'textdomain' ),
    'items_list_navigation' => __( 'Topic list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Topic list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'topic', 'textdomain' ),
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
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'topic', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_topic_cpt', 0 );


//activity custom post type

// Register Custom Post Type activity
// Post Type Key: activity

function create_activity_cpt() {

  $labels = array(
    'name' => __( 'Activities', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Activity', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Activity', 'textdomain' ),
    'name_admin_bar' => __( 'Activity', 'textdomain' ),
    'archives' => __( 'Activity Archives', 'textdomain' ),
    'attributes' => __( 'Activity Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Activity:', 'textdomain' ),
    'all_items' => __( 'All Activities', 'textdomain' ),
    'add_new_item' => __( 'Add New Activity', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Activity', 'textdomain' ),
    'edit_item' => __( 'Edit Activity', 'textdomain' ),
    'update_item' => __( 'Update Activity', 'textdomain' ),
    'view_item' => __( 'View Activity', 'textdomain' ),
    'view_items' => __( 'View Activities', 'textdomain' ),
    'search_items' => __( 'Search Activities', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into activity', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this activity', 'textdomain' ),
    'items_list' => __( 'Activity list', 'textdomain' ),
    'items_list_navigation' => __( 'Activity list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Activity list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'activity', 'textdomain' ),
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
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'activity', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_activity_cpt', 0 );