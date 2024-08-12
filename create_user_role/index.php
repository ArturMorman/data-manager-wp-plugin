<?php

function create_content_editor_role() {
  if (get_role('content_editor')) {
    remove_role('content_editor');
  }
  add_role('content_editor', 'Content Editor', [
    'read'                   => true,
    'edit_posts'             => true,
    'edit_others_posts'      => true,
    'edit_published_posts'   => true,
    'edit_private_posts'     => true,
    'manage_categories'      => true,
    'manage_acf_fields'      => true,
    'publish_posts'          => false,
    'delete_posts'           => false,
    'delete_others_posts'    => false,
    'delete_published_posts' => false,
    'delete_private_posts'   => false,
    'create_posts'           => false,
  ]);
}
add_action('init', 'create_content_editor_role');