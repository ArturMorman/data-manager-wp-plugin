<?php

add_action( 'init', 'ww_create_project_data_type_taxonomy', 0 );
function ww_create_project_data_type_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Product types', 'taxonomy general name' ),
    'singular_name' => _x( 'Product type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Product types' ),
    'all_items' => __( 'All Product types' ),
    'parent_item' => __( 'Parent Product type' ),
    'parent_item_colon' => __( 'Parent Product type:' ),
    'edit_item' => __( 'Edit Product type' ), 
    'update_item' => __( 'Update Product type' ),
    'add_new_item' => __( 'Add New Product type' ),
    'new_item_name' => __( 'New Product type' ),
    'menu_name' => __( 'Product type (term)' ),
  ); 	
 
  register_taxonomy('product_types',array('project_data'), array(
    'hierarchical' => true,
		'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
		'rewrite' => array( 'slug' => 'product-type' ),
		
    'show_in_rest'       => true,
    'rest_base'          => 'productTypes',
	'show_in_graphql' => true,
	'graphql_single_name' => 'ProductType',
	'graphql_plural_name' => 'ProductTypes',
  ));
}
register_taxonomy_for_object_type( 'project_types', 'project_data' );