<?php
/**
 * @package am_api_for_headless
 * @version 1.0
 */
/*
Plugin Name: AM Single post Custom REST API
Plugin URI: 
Description: This plugin creates custom private rest api routes, which are used by front headless app to get single post.
Author: Artur Morman
Version: 1.0
Author URI: 
*/
defined( 'ABSPATH' ) || exit;

  ///////////////////////////////////
 ///////////////////////////////////
/////////// C O N F I G ///////////

//	JWT TOKENS FORMALITIES
function amor_allowed_domains_array() {
  return [
    'http://localhost:8000',
    'https://morman.com.pl',
    'http://artur.morman.com.pl'
  ];
}

//	ENDPOINT - UPDATE ACF FIELD
function amor_endpoint_update_version() {
  return '1';
}
function amor_endpoint_update_namespace() {
  return 'custom/v' . amor_endpoint_update_version();
}
function amor_endpoint_update_base() {
  return 'update-acf';
}

//	ENDPOINT - UPDATE ACF FIELD
function amor_endpoint_return_acf_version() {
  return '2';
}
function amor_endpoint_return_acf_namespace() {
  return 'wp/v' . amor_endpoint_return_acf_version();
}
function amor_endpoint_return_acf_base() {
  return 'amor_single';
}
function amor_handled_acf_groups() {
  return [
    '1' => 'group_66782d1af077f',
    '2' => 'group_666d9c0b53c29',
    '3' => 'group_66705ddadca85',
  ];
}

//  CUSTOM USER ROLE - CONTENT EDITOR
function amor_allowed_taxonomies_for_c_editor() {
  return [
    'clients', 
    'product_types', 
    'languages', 
    'technologies'
  ];
}
function amor_allowed_acf_fields_for_c_editor() {
  return [
    'text', 
    'true_false'
  ];
}

  ///////////////////////////////////
 ///////////////////////////////////
///////////////////////////////////


////	POST TYPES AND TAXONOMIES
require_once(plugin_dir_path(__FILE__) . 'post_types_and_taxonomies/index.php');

////	JWT TOKENS FORMALITIES
require_once(plugin_dir_path(__FILE__) . 'jwt_tokens_formalities/index.php');

////	ENDPOINT - UPDATE ACF FIELD
require_once(plugin_dir_path(__FILE__) . 'endpoint_update_acf_field/index.php');

////	ENDPOINT - RETURN ACF FIELDS, FOR GIVEN POST
require_once(plugin_dir_path(__FILE__) . 'endpoint_return_acf_fields/index.php');

////	CUSTOM USER ROLE - CONTENT EDITOR
require_once(plugin_dir_path(__FILE__) . 'user_role_content_editor/index.php');
