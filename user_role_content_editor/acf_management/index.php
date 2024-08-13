<?php

////
////
function add_custom_acf_capabilities() {
  $role = get_role('content_editor');

  if ($role) {
    $role->add_cap('manage_acf_fields');
  }
}
add_action('init', 'add_custom_acf_capabilities');

////
////
function restrict_acf_field_creation($field_group) {
  if (current_user_can('manage_acf_fields')) {
    foreach ($field_group['fields'] as $field) {
      if (!in_array($field['type'], amor_allowed_acf_fields_for_c_editor())) {
        return false;
      }
    }
  }

  return $field_group;
}
add_filter('acf/validate_save_field_group', 'restrict_acf_field_creation');

////
////
function restrict_acf_field_choices($field_types) {
  if (current_user_can('manage_acf_fields')) {
    foreach ($field_types as $type => $label) {
      if (!in_array($type, amor_allowed_acf_fields_for_c_editor())) {
        unset($field_types[$type]);
      }
    }
  }

  return $field_types;
}
add_filter('acf/get_field_types', 'restrict_acf_field_choices');

////
////
function limit_acf_field_management($field_group) {
  if (current_user_can('manage_acf_fields')) {
    if (empty($field_group['ID'])) {
      return false;
    }
  }

  return $field_group;
}
add_filter('acf/validate_save_field_group', 'limit_acf_field_management');