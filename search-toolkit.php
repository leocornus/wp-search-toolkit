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
define('SEARCH_TOOLKIT_PATH',
       WP_PLUGIN_DIR . '/' . basename(dirname($search_toolkit_file)));

// load the admin page index file, which will load all admin page.
//require_once(SEARCH_TOOLKIT_PATH . '/admin/index.php');

/**
 * a simple filter hook function to demostrate the filter format.
 */
function quick_test_filter_options($options) {

    $my_filters = <<<FILTERS
    {label: 'All', value: ''},
    {label: 'Acronyms', value: 'site: wiki AND keywords: Acronyms'},
    {label: 'User Profile', value: 'keywords: "User Profile"'},
FILTERS;

    return $my_filters;
}
add_filter('livesearch_options_filter',
           'quick_test_filter_options', 10, 1);
