<?php
// Register Custom Post Type
function provider_post_type() {

	$labels = array(
		'name'                  => _x( 'provider', 'ido-minimal' ),
		'singular_name'         => _x( 'provider', 'ido-minimal' ),
		'menu_name'             => __( 'providers', 'ido-minimal' ),
		'name_admin_bar'        => __( 'providers', 'ido-minimal' ),
		'archives'              => __( 'providers Archives', 'ido-minimal' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ido-minimal' ),
		'all_items'             => __( 'All providers', 'ido-minimal' ),
		'add_new_item'          => __( 'Add New provider', 'ido-minimal' ),
		'add_new'               => __( 'Add New', 'ido-minimal' ),
		'new_item'              => __( 'New provider', 'ido-minimal' ),
		'edit_item'             => __( 'Edit provider', 'ido-minimal' ),
		'update_item'           => __( 'Update provider', 'ido-minimal' ),
		'view_item'             => __( 'View provider', 'ido-minimal' ),
		'search_items'          => __( 'Search provider', 'ido-minimal' ),
		'not_found'             => __( 'Not found', 'ido-minimal' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ido-minimal' ),
		'featured_image'        => __( 'Featured Image', 'ido-minimal' ),
		'set_featured_image'    => __( 'Set featured image', 'ido-minimal' ),
		'remove_featured_image' => __( 'Remove featured image', 'ido-minimal' ),
		'use_featured_image'    => __( 'Use as featured image', 'ido-minimal' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ido-minimal' ),
		'items_list'            => __( 'providers list', 'ido-minimal' ),
		'items_list_navigation' => __( 'providers list navigation', 'ido-minimal' ),
		'filter_items_list'     => __( 'Filter providers list', 'ido-minimal' ),
	);
	$args = array(
		'label'                 => __( 'providers', 'ido-minimal' ),
		'description'           => __( 'providers Post Type Description', 'ido-minimal' ),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail',  ),
		'taxonomies'            => array( 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-art',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'providers', $args );

}
add_action( 'init', 'provider_post_type', 0 );

// Register Custom Taxonomy
function provider_services_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Services', 'Taxonomy General Name', 'ido-minimal' ),
		'singular_name'              => _x( 'Service', 'Taxonomy Singular Name', 'ido-minimal' ),
		'menu_name'                  => __( 'Service', 'ido-minimal' ),
		'all_items'                  => __( 'All Services', 'ido-minimal' ),
		'parent_item'                => __( 'Parent Service', 'ido-minimal' ),
		'parent_item_colon'          => __( 'Parent Service:', 'ido-minimal' ),
		'new_item_name'              => __( 'New Service Name', 'ido-minimal' ),
		'add_new_item'               => __( 'Add New Service', 'ido-minimal' ),
		'edit_item'                  => __( 'Edit Service', 'ido-minimal' ),
		'update_item'                => __( 'Update Service', 'ido-minimal' ),
		'view_item'                  => __( 'View Service', 'ido-minimal' ),
		'separate_items_with_commas' => __( 'Separate Service with commas', 'ido-minimal' ),
		'add_or_remove_items'        => __( 'Add or remove Services', 'ido-minimal' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ido-minimal' ),
		'popular_items'              => __( 'Popular Services', 'ido-minimal' ),
		'search_items'               => __( 'Search Services', 'ido-minimal' ),
		'not_found'                  => __( 'Not Found', 'ido-minimal' ),
		'no_terms'                   => __( 'No Services', 'ido-minimal' ),
		'items_list'                 => __( 'Services list', 'ido-minimal' ),
		'items_list_navigation'      => __( 'Services list navigation', 'ido-minimal' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'services', array( 'providers' ), $args );

}
add_action( 'init', 'provider_services_taxonomy', 0 );