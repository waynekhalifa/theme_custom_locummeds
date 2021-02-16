<?php
/**
 * This template is to adds verbose rules so that page with the same urls as taxonomies can be shown
 */
function custom_locummeds_init()
{
    $GLOBALS['wp_rewrite']->use_verbose_page_rules = true;
}
add_action( 'init', 'custom_locummeds_init' );

function custom_locummeds_collect_page_rewrite_rules( $page_rewrite_rules )
{
    $GLOBALS['custom_locummeds_page_rewrite_rules'] = $page_rewrite_rules;
    return array();
}
add_filter( 'page_rewrite_rules', 'custom_locummeds_collect_page_rewrite_rules' );

function custom_locummedes_prepend_page_rewrite_rules( $rewrite_rules )
{
    return $GLOBALS['custom_locummeds_page_rewrite_rules'] + $rewrite_rules;
}
add_filter( 'rewrite_rules_array', 'custom_locummedes_prepend_page_rewrite_rules' );