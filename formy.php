<?php

/**
 * Plugin Name:       formy
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       formy is cool
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Youssef Hajjari
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */


add_action('admin_menu', 'admin_menu');

function admin_menu()
{
  add_menu_page('Formy', 'Formy', 'manage_options', 'my-menu', 'settings_page', 'dashicons-align-center');
  add_submenu_page('my-menu', 'all form', 'all form', 'manage_options', 'my-menu');
  add_submenu_page('my-menu', 'Add new', 'Add new', 'manage_options', 'my-menu2');
  add_submenu_page('my-menu', 'Add new', 'Add new', 'manage_options', 'my-menu2');
}

if (isset($_POST['submit'])) {
    header("location: " . $_SERVER['REQUEST_URI']);
}

function settings_page()
{

  return include('includes/settings.php');
}

add_shortcode('falcon', 'wporg_shortcode');
function wporg_shortcode($atts = [], $content = null)
{
  return include_once('app.php');
}



function createtable()
{
    global $wpdb;
    $sql = "CREATE TABLE wp_formy_fields (
      id INT,
      firstName VARCHAR(5),
      lastName VARCHAR(5),
      email VARCHAR(5),
      password VARCHAR(5)
      )";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    maybe_create_table('wp_formy_fields', $sql);
}



function createtableValues()
{
    global $wpdb;
    $sql = "CREATE TABLE wp_formy_values (
      id INT PRIMARY KEY AUTO_INCREMENT,
      firstName VARCHAR(255) DEFAULT NULL,
      lastName VARCHAR(255) DEFAULT NULL,
      email VARCHAR(255) DEFAULT NULL,
      password VARCHAR(255) DEFAULT NULL
      )";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    maybe_create_table('wp_formy_values', $sql);
}



 function insert()
{
  global $wpdb;

  $wpdb->insert(
    'wp_formy_fields',
    [
      'id' => 1,
      'firstName' => 'off',
      'lastName' => 'off',
      'email' => 'off',
      'password' => 'off'
    ]
  );
}

register_activation_hook(__FILE__, 'createtable');
register_activation_hook(__FILE__, 'insert');
register_activation_hook(__FILE__, 'createtableValues');