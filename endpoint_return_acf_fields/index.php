<?php

class AmorSinglePost
{
  public function __construct()
  {
    $namespace = amor_endpoint_return_acf_namespace();
    $base = amor_endpoint_return_acf_base();
    register_rest_route($namespace, '/' . $base . '/(?P<id>\d+)', [
      'methods' => 'GET',
      'callback' => array($this, 'get_single_object'),
      // 'permission_callback' => '__return_true',  //  can be handled better...
    ]);
  }

  public function get_single_object($request)
  {
    $post_id = $request['id'];

    if (empty($post_id) || !is_numeric($post_id) || !get_post($post_id)) {
      return new WP_Error('invalid_post_id', 'Invalid or missing post ID.', ['status' => 400]);
    }

    $group_keys = array_values(amor_handled_acf_groups());

    $post_fields = [
      'ID'    => $post_id,
      'title' => get_the_title($post_id),
      'groups' => array(),
    ];

    foreach ($group_keys as $group_key) {
      $field_group = acf_get_field_group($group_key);

      if (!$field_group) {
        continue;
      }

      $fields_in_group = acf_get_fields($field_group);
      $group_data = [
        'group_key' => $group_key,
        'group_title' => $field_group['title'],
        'fields' => [],
      ];

      foreach ($fields_in_group as $field) {
        $field_value = get_field($field['name'], $post_id);
        $group_data['fields'][] = [
          'label' => $field['label'],
          'name' => $field['name'],
          'type' => $field['type'],
          'value' => $field_value,
        ];
      }
      $post_fields['groups'][$field_group['title']] = $group_data;
    }

    return rest_ensure_response($post_fields);
  }
}

add_action('rest_api_init', function () {
  $post_fields_groups = new AmorSinglePost;
});