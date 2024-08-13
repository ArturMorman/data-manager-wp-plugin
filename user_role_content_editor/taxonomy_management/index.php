<?php

function restrict_taxonomy_management($term, $taxonomy) {
  if (current_user_can('manage_categories') && !in_array($taxonomy, amor_allowed_taxonomies_for_c_editor())) {
    return new WP_Error('term_not_allowed', __('You are not allowed to manage this taxonomy.'), array('status' => 403));
  }

  return $term;
}
add_filter('pre_insert_term', 'restrict_taxonomy_management', 10, 2);