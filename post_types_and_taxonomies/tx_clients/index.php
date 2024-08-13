<?php

add_action( 'init', 'ww_create_project_data_client_taxonomy', 0 );
function ww_create_project_data_client_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Clients', 'taxonomy general name' ),
    'singular_name' => _x( 'Client', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Clients' ),
    'all_items' => __( 'All Clients' ),
    'parent_item' => __( 'Parent Client' ),
    'parent_item_colon' => __( 'Parent Client:' ),
    'edit_item' => __( 'Edit Client' ), 
    'update_item' => __( 'Update Client' ),
    'add_new_item' => __( 'Add New Client' ),
    'new_item_name' => __( 'New Client' ),
    'menu_name' => __( 'Client (term)' ),
  ); 	
 
  register_taxonomy('clients',array('project_data'), array(
    'hierarchical' => true,
		'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
		'rewrite' => array( 'slug' => 'client' ),
		
    'show_in_rest'       => true,
    'rest_base'          => 'clients',
	'show_in_graphql' => true,
	'graphql_single_name' => 'client',
	'graphql_plural_name' => 'clients',
  ));
}
register_taxonomy_for_object_type( 'clients', 'project_data' );