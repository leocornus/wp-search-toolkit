<?php
/**
 * manage site admin dashboard settings pages.
 */

// register the deactivation script.
register_deactivation_hook($search_toolkit_file, 
                           'deactivate_search_toolkit');

/**
 * the deactivation script will simplely remove all options for now.
 */
function deactivate_search_toolkit() {

    delete_option('livesearch_input_id');
    delete_option('livesearch_filter_options');
}

// adding the dashboard page to manage
add_action('admin_menu', 'search_toolkit_admin_init');

function search_toolkit_admin_init() {

    $main_page = SEARCH_TOOLKIT_BASE_PATH . '/admin/livesearch.php';
    $advanced = SEARCH_TOOLKIT_BASE_PATH . 
                '/admin/advancedsearch.php';

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

    add_submenu_page($main_page,
                     'Search Toolkit Advanced Search Settings',
                     'Advanced Search',
                     'manage_options',
                     $advanced);
}
