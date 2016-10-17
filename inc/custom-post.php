<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function aat_package_register() {

	$labels = array(
		'name'                => __( 'packages', 'aat-reavel' ),
		'singular_name'       => __( 'package', 'aat-reavel' ),
		'add_new'             => _x( 'Add New package', 'aat-reavel', 'aat-reavel' ),
		'add_new_item'        => __( 'Add New package', 'aat-reavel' ),
		'edit_item'           => __( 'Edit package', 'aat-reavel' ),
		'new_item'            => __( 'New package', 'aat-reavel' ),
		'view_item'           => __( 'View package', 'aat-reavel' ),
		'search_items'        => __( 'Search packages', 'aat-reavel' ),
		'not_found'           => __( 'No packages found', 'aat-reavel' ),
		'not_found_in_trash'  => __( 'No packages found in Trash', 'aat-reavel' ),
		'parent_item_colon'   => __( 'Parent package:', 'aat-reavel' ),
		'menu_name'           => __( 'packages', 'aat-reavel' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array('category', 'post_tag' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-palmtree',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'destination' ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'thumbnail',
				'page-attributes',
				'editor' 
			)
	);

	register_post_type( 'packages', $args );
}



add_action( 'init', 'aat_package_register' );

/** TESTIMONIALS PACKAGE REGISTER */

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function aat_testimonial_register() {

	$labels = array(
		'name'                => __( 'testimonials', 'aat-reavel' ),
		'singular_name'       => __( 'testimonial', 'aat-reavel' ),
		'add_new'             => _x( 'Add New testimonial', 'aat-reavel', 'aat-reavel' ),
		'add_new_item'        => __( 'Add New testimonial', 'aat-reavel' ),
		'edit_item'           => __( 'Edit testimonial', 'aat-reavel' ),
		'new_item'            => __( 'New testimonial', 'aat-reavel' ),
		'view_item'           => __( 'View testimonial', 'aat-reavel' ),
		'search_items'        => __( 'Search testimonials', 'aat-reavel' ),
		'not_found'           => __( 'No testimonials found', 'aat-reavel' ),
		'not_found_in_trash'  => __( 'No testimonials found in Trash', 'aat-reavel' ),
		'parent_item_colon'   => __( 'Parent testimonial:', 'aat-reavel' ),
		'menu_name'           => __( 'testimonials', 'aat-reavel' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array('category', 'post_tag' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-admin-users',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array( 'slug' => 'testimonial' ),
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'thumbnail','custom-fields',
				'page-attributes', 
			)
	);

	register_post_type( 'testimonials', $args );
}

add_action( 'init', 'aat_testimonial_register' );



function my_rewrite_flush() {
    aat_package_register();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'aat_package_register' );

function my_rewrite_test() {
    aat_testimonial_register();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'aat_testimonial_register' );



function aat_reavel_custom_archive_support( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types
$post_types = get_post_types();

$query->set( 'post_type', $post_types );
return $query;
}
}
add_filter( 'pre_get_posts', 'aat_reavel_custom_archive_support' );


?>