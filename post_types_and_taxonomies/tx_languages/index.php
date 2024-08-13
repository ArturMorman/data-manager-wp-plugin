<?php

add_action( 'init', 'ww_create_project_data_language_taxonomy', 0 );
function ww_create_project_data_language_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Languages', 'taxonomy general name' ),
    'singular_name' => _x( 'Languages', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Languages' ),
    'all_items' => __( 'All Languages' ),
    'parent_item' => __( 'Parent Language' ),
    'parent_item_colon' => __( 'Parent Language:' ),
    'edit_item' => __( 'Edit Language' ), 
    'update_item' => __( 'Update Language' ),
    'add_new_item' => __( 'Add New Language' ),
    'new_item_name' => __( 'New Language' ),
    'menu_name' => __( 'Language (term)' ),
  ); 	
 
  register_taxonomy('languages',array('project_data'), array(
    'hierarchical' => true,
		'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
		'rewrite' => array( 'slug' => 'language' ),
		
    'show_in_rest'       => true,
    'rest_base'          => 'languages',
	'show_in_graphql' => true,
	'graphql_single_name' => 'Language',
	'graphql_plural_name' => 'Languages',
  ));
}
register_taxonomy_for_object_type( 'languages', 'project_data' );