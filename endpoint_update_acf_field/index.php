<?php


class AmorUpdateACF
{
  public function __construct()
  {
    $namespace = amor_endpoint_update_namespace();
    $base = amor_endpoint_update_base();
    register_rest_route($namespace, '/' . $base, [
      'methods' => 'POST',
      'callback' => array($this, 'update_acf_fields'),
      'permission_callback' => array($this, 'acf_permission_check'),
    ]);
  }

  public function update_acf_fields($request)
  {
    $params = $request->get_json_params();
    $post_id = isset($params['post_id']) ? intval($params['post_id']) : 0;
    $fields = isset($params['fields']) ? $params['fields'] : [];

    if ($post_id && !empty($fields)) {
      foreach ($fields as $field_key => $value) {

        $sanitized_value = is_array($value) ? array_map('sanitize_text_field', $value) : wp_kses_post($value);
        
        update_field($field_key, $sanitized_value, $post_id);
      }
      return new WP_REST_Response('Fields updated', 200);
    }

    return new WP_REST_Response('Invalid data', 400);
  }

  public function acf_permission_check()
  {
    return current_user_can('edit_posts');
  }
}

add_action('rest_api_init', function () {
  $update_acf = new AmorUpdateACF;
});