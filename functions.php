<?php

function st_livesearch_default_options() {

    $options = <<<FILTERS
{label: 'All', value: ''},
{label: 'Wiki', value: 'site: wiki AND keywords: Acronyms'},
{label: 'User Profile', value: 'keywords: "User Profile"'},
FILTERS;

    return $options;
}
