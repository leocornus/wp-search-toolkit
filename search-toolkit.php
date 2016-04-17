<?php
/*
Plugin Name: Search Toolkit
Description: The WordPress plugin to host useful tools for search.
Version: 0.1
Author: Sean Chen 
Author URI: http://github.com/seanchen
*/

// the symlink safe way for plugin path.
$search_toolkit_file = __FILE__;
define('SEARCH_TOOLKIT_FILE', $search_toolkit_file);
define('SEARCH_TOOLKIT_BASE_PATH', 
       basename(dirname($search_toolkit_file)));
define('SEARCH_TOOLKIT_PATH',
       WP_PLUGIN_DIR . '/' . SEARCH_TOOLKIT_BASE_PATH);

// load the admin page index file, which will load all admin page.
//require_once(SEARCH_TOOLKIT_PATH . '/admin/index.php');
require_once(SEARCH_TOOLKIT_PATH . '/functions.php');

// adding the dashboard page to manage
add_action('admin_menu', 'search_toolkit_admin_init');
function search_toolkit_admin_init() {

    $main_page = SEARCH_TOOLKIT_BASE_PATH . '/admin/livesearch.php';
    $advanced = SEARCH_TOOLKIT_BASE_PATH . '/admin/advancedsearch.php';

    add_menu_page('Search Toolkit', 'Search Toolkit',
                  'manage_options',
                  $main_page,
                  '');

    // the general settings page.
    add_submenu_page($main_page,
                     'Search Toolkit LiveSearch Settings',
                     'LiveSearch Settings',
                     'manage_options',
                     $main_page);

//    add_submenu_page($main_page,
//                     'Search Toolkit Advanced Search Settings',
//                     'Advanced Search',
//                     'manage_options',
//                     $advanced);
}

/**
 * a simple filter hook function to demostrate the filter format.
 */
function st_livesearch_filter_options() {

    $options = get_option('livesearch_filter_options');
    if($options === false) {
        $options = st_livesearch_default_options();
    }

    return $options;
}

/**
 * get the livesearch input box's dom id.
 */
function st_livesearch_input_id() {

    $input_id = get_option('livesearch_input_id');
    if($input_id === false) {
        // The default id will be livesearch
        $input_id = 'livesearch';
    }

    return $input_id;
}
