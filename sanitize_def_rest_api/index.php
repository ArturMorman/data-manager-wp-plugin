<?php


function custom_update_post_content($data, $postarr) {

  $allowed_tags = [
    'p'           => [],
    'br'          => [],
    'a'           => [
      'href'        => [],
      'title'       => [],
    ],
    'strong'      => [],
    'em'          => [],
    'ul'          => [],
    'ol'          => [],
    'li'          => [],
    'blockquote'  => [],
    'code'        => [],
    'h1'          => [],
    'h2'          => [],
    'h3'          => [],
    'h4'          => [],
    'h5'          => [],
    'h6'          => [],
    'span'        => [],
  ];

  if (isset($data['post_content'])) {
    $data['post_content'] = wp_kses($data['post_content'], $allowed_tags);
  }

  return $data;
}
add_filter('wp_insert_post_data', 'custom_update_post_content', 10, 2);