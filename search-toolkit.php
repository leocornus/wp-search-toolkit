<?php
/*
Plugin Name: Search Toolkit
Plugin URI: http://www.github.com/leocornus/wp-search-toolkit
Description: The WordPress plugin to host useful tools for search.
Version: 0.1
Author: Sean Chen 
Author URI: http://github.com/seanchen
License: GPLv2
*/

// the symlink safe way for plugin path.
$search_toolkit_file = __FILE__;
define('SEARCH_TOOLKIT_FILE', $search_toolkit_file);
define('SEARCH_TOOLKIT_BASE_PATH', 
       basename(dirname($search_toolkit_file)));
define('SEARCH_TOOLKIT_PATH',
       WP_PLUGIN_DIR . '/' . SEARCH_TOOLKIT_BASE_PATH);

// load the admin page index file, which will load all admin page.
require_once(SEARCH_TOOLKIT_PATH . '/admin/index.php');
require_once(SEARCH_TOOLKIT_PATH . '/functions.php');

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
        $input_id = st_livesearch_default_input_id();
    }

    return $input_id;
}
