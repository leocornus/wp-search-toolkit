<?php

/**
 * Preparing the default filter options for livesearch.
 * The filter option is using JSON format.
 * The value for each option will be based on
 * Solr filter query syntax.
 */
function st_livesearch_default_options() {

    // get the path for current blog.
    global $current_blog;
    $blog_path = $current_blog->path;
    // the blog path has slash (/) in both beginning and ending.
    // we need remove them.
    $blog_path = trim($blog_path, "/"); // remove the beginning.
    $blog_path = rtrim($blog_path, "/"); // remove the ending

    // assume the Solr / Lucene is using blog path as the 
    // value for site metadata.
    $options = <<<FILTERS
{label: 'Current Site', value: 'site: {$blog_path}'},  
{label: 'All', value: ''},
{label: 'Wiki', value: 'site: wiki AND keywords: Acronyms'},
{label: 'User Profile', value: 'keywords: "User Profile"'},
FILTERS;

    return $options;
}

/**
 * return the default id for the livesearch input box.
 */
function st_livesearch_default_input_id() {

    return 'livesearch';
}

/**
 * this utility function will prepare the JavaScript code to
 * load the live search box to the top right corner.
 *
 * It will be hooked to wp_head action.
 */
function livesearch_onload_js() {

    // get the livesearch input box's DOM id.
    $input_id = st_livesearch_input_id();

    // the default filter options.
    $filterOptions = st_livesearch_filter_options();

    $onload = <<<READY
<script>
jQuery( document ).ready(function() {

    jQuery('#{$input_id}').liveSearch({
      searchResult: {
          // leave it empty to use the default 
          // search template.
          url: '',
          queryName: 's'
      },
      maxItems : 6,
      filterOptions: [
          {$filterOptions}
      ]
    });
});
</script>
READY;

    echo $onload;
}
add_action('wp_head', 'livesearch_onload_js');
