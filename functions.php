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
