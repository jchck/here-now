<?php

/*
Plugin Name:        Here & Now
Plugin URI:         https://hereandnow.io/
Description:        A pplugin to host and manage your podcast via WordPress
Version:            0.0.0
Author:             jchck_
Author URI:         https://justinchick.com/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/

add_action( 'init', 'herenow_pod_rss');
function herenow_pod_rss(){
	add_feed( 'here-now', 'herenow_feed' );
}

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function herenow_pod_cpt() {

	$labels = array(
		'name'                => __( 'Podcasts', 'text-domain' ),
		'singular_name'       => __( 'Podcast', 'text-domain' ),
		'add_new'             => _x( 'Add New Podcast', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Podcast', 'text-domain' ),
		'edit_item'           => __( 'Edit Podcast', 'text-domain' ),
		'new_item'            => __( 'New Podcast', 'text-domain' ),
		'view_item'           => __( 'View Podcast', 'text-domain' ),
		'search_items'        => __( 'Search Podcasts', 'text-domain' ),
		'not_found'           => __( 'No Podcasts found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Podcasts found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Podcast:', 'text-domain' ),
		'menu_name'           => __( 'Podcasts', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			)
	);

	register_post_type( 'podcast', $args );
}

add_action( 'init', 'herenow_pod_cpt' );
