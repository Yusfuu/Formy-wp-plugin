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
if (isset($_POST['formy_save']) || isset($_POST['delete'])) {
  header("location: " . $_SERVER['REQUEST_URI']);
}


function admin_menu()
{
  global $wpdb;
  add_menu_page('Formy', 'Formy', 'manage_options', 'my-menu', 'settings_page', 'dashicons-align-center');
  add_submenu_page('my-menu', 'all form', 'Custom Form', 'manage_options', 'my-menu');
  add_submenu_page('my-menu', 'Add new', sprintf('inbox <span class="awaiting-mod">%d</span>', $wpdb->get_row("SELECT count(*) as balina FROM wp_formy_values")->balina), 'manage_options', 'my-menu2', 'inbox');
}

function settings_page()
{
  include('includes/settings.php');
}

function inbox()
{
  include('includes/inbox.php');
}

function wporg_shortcode($atts = [], $content = null)
{
  include_once('app.php');
}

function createTableFields()
{
  $sql = "CREATE TABLE wp_formy_fields (
      id INT,
      firstName BOOLEAN,
      lastName BOOLEAN,
      email BOOLEAN,
      password BOOLEAN,
      confirmPassword BOOLEAN,
      subject BOOLEAN,
      message BOOLEAN
      )";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  maybe_create_table('wp_formy_fields', $sql);
}

function createTableValues()
{
  $sql = "CREATE TABLE wp_formy_values (
      id INT PRIMARY KEY AUTO_INCREMENT,
      firstName VARCHAR(255) DEFAULT NULL,
      lastName VARCHAR(255) DEFAULT NULL,
      email VARCHAR(255) DEFAULT NULL,
      password VARCHAR(255) DEFAULT NULL,
      subject VARCHAR(255) DEFAULT NULL,
      message TEXT DEFAULT NULL
      )";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  maybe_create_table('wp_formy_values', $sql);
}

function installData()
{
  global $wpdb;

  $wpdb->insert(
    'wp_formy_fields',
    [
      'id' => 1,
      'firstName' => false,
      'lastName' => false,
      'email' => false,
      'password' => false,
      'confirmPassword' => false,
      'subject' => false,
      'message' => false
    ]
  );
}

function dropTableFields()
{
  global $wpdb;
  $wpdb->query("DELETE FROM wp_formy_fields");
}


add_action('admin_menu', 'admin_menu');
add_shortcode('formy', 'wporg_shortcode');

register_activation_hook(__FILE__, 'createTableFields');
register_deactivation_hook(__FILE__, 'dropTableFields');
register_activation_hook(__FILE__, 'installData');
register_activation_hook(__FILE__, 'createTableValues');
