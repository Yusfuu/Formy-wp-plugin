<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}

// drop a custom database table
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS wp_formy_fields");
$wpdb->query("DROP TABLE IF EXISTS wp_formy_values");
