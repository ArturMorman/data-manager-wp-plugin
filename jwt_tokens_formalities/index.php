<?php

function add_cors_http_header(){
  if (isset($_SERVER['HTTP_ORIGIN'])) {
    if (in_array($_SERVER['HTTP_ORIGIN'], amor_allowed_domains_array())) {
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      header("Access-Control-Allow-Credentials: true");
      header("Access-Control-Allow-Headers: Authorization, Content-Type");
    }
  }
}
add_action('init', 'add_cors_http_header');

function handle_preflight() {
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
      if (in_array($_SERVER['HTTP_ORIGIN'], amor_allowed_domains_array())) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Headers: Authorization, Content-Type");
        exit(0);
      }
    }
  }
}
add_action('init', 'handle_preflight');