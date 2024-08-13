<?php

add_action( 'init', 'ww_create_project_data_technology_taxonomy', 0 );
function ww_create_project_data_technology_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Technologies', 'taxonomy general name' ),
    'singular_name' => _x( 'Technology', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Technologies' ),
    'all_items' => __( 'All Technologies' ),
    'parent_item' => __( 'Parent Technology' ),
    'parent_item_colon' => __( 'Parent Technology:' ),
    'edit_item' => __( 'Edit Technology' ), 
    'update_item' => __( 'Update Technology' ),
    'add_new_item' => __( 'Add New Technology' ),
    'new_item_name' => __( 'New Technology' ),
    'menu_name' => __( 'Technology (term)' ),
  ); 	
 
  register_taxonomy('technologies',array('project_data'), array(
    'hierarchical' => true,
		'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
		'rewrite' => array( 'slug' => 'technology' ),
		
    'show_in_rest'       => true,
    'rest_base'          => 'technologies',
	'show_in_graphql' => true,
	'graphql_single_name' => 'Technology',
	'graphql_plural_name' => 'Technologies',
  ));
}
register_taxonomy_for_object_type( 'technologies', 'project_data' );