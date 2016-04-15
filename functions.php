<?php

/**
 * Preparing the default filter options for livesearch.
 * The filter option is using JSON format.
 * The value for each option will be based on
 * Solr filter query syntax.
 */
function st_livesearch_default_options() {

    $options = <<<FILTERS
{label: 'All', value: ''},
{label: 'Wiki', value: 'site: wiki AND keywords: Acronyms'},
{label: 'User Profile', value: 'keywords: "User Profile"'},
FILTERS;

    return $options;
}

/**
 * this utility function will prepare the JavaScript code to
 * load the live search box to the top right corner.
 *
 * It will be hooked to wp_head action.
 */
function livesearch_onload_js() {

    // get current blog path ad the site..
    global $current_blog;
    $wppath = $current_blog->path; 

    // the default filter options.
    $filterOptions = st_livesearch_default_options();

    // check the filter hooks.
    if(has_filter('livesearch_options_filter')) {
        $filterOptions = 
            apply_filters('livesearch_options_filter', 
                          $filterOptions);
    }

    $onload = <<<READY
<script>
jQuery( document ).ready(function() {

    jQuery('#livesearch').liveSearch({
      searchResult: {
          // leave it empty to use the default 
          // search template.
          url: '',
          queryName: 's'
      },
      maxItems : 6,
      filterOptions: [
          {label: 'Current Blog', value: 'site: {$wppath}'},
          {$filterOptions}
      ]
    });
});
</script>
READY;

    echo $onload;
}
add_action('wp_head', 'livesearch_onload_js');
