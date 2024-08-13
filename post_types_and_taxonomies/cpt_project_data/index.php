<?php

function ww_custom_post_type_project_data() {	
	register_post_type('project_data',
	array(
		'labels'      => array(
		'name'          => __('Projects data'),
		'singular_name' => __('Project data'),
		),
		'public'      => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'project_data','with_front' => false),
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
		'show_in_rest'	 => true,
		'rest_base'      => 'ProjectsData',
		
		'show_in_graphql' => true,
		'graphql_single_name' => 'ProjectsData',
		'graphql_plural_name' => 'ProjectsDatas',

		)
	);
}
add_action('init', 'ww_custom_post_type_project_data');