<?php
/**
 * This tempalte is responsible for creating infinite scroll
 */

add_action('wp_ajax_nopriv_load_more_categories', 'load_more_categories');
add_action('wp_ajax_load_more_categories', 'load_more_categories');
add_action('wp_ajax_nopriv_load_more_locations', 'load_more_locations');
add_action('wp_ajax_load_more_locations', 'load_more_locations');

function load_more_categories()
{
    $paged = $_POST['page'] + 1;
    $total_terms   = wp_count_terms( 'job_listing_category', array( 'hide_empty' => false ) );
    $terms_per_page = 5;
    $total_pages = ceil( $total_terms / $terms_per_page );
    $offset = (( $paged - 1 ) * $terms_per_page);
    $args = array(
        'orderby'       => 'count', 
        'order'         => 'DSC',
        'hide_empty'    => true, 
        'number'        => $terms_per_page, 
        'fields'        => 'all', 
        'slug'          => '', 
        'parent'         => '',
        'child_of'      => '',
        'offset'        => $offset, 
    );

    ob_start();
        $job_categories = get_terms( 'job_listing_category', $args);
        if ($job_categories) :
            foreach ( $job_categories as $category ) :
                echo '<li><input type="checkbox" name="job_category" value="'. $category->slug .'">'. $category->name .'</li>';
            endforeach;
        endif;
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

function load_more_locations()
{
    $paged = $_POST['page'] + 1;
    $total_terms   = wp_count_terms( 'job_listing_region', array( 'hide_empty' => false ) );
    $terms_per_page = 5;
    $total_pages = ceil( $total_terms / $terms_per_page );
    $offset = (( $paged - 1 ) * $terms_per_page);
    $args = array(
        'orderby'       => 'count', 
        'order'         => 'DSC',
        'hide_empty'    => true, 
        'number'        => $terms_per_page, 
        'fields'        => 'all', 
        'slug'          => '', 
        'parent'         => '',
        'child_of'      => '',
        'offset'        => $offset, 
    );
    
    ob_start();
        $job_locations = get_terms( 'job_listing_region', $args); 
        if ($job_locations) :
            foreach ( $job_locations as $location ) :
                echo '<li><input type="checkbox" name="job_location" value="'. $location->slug .'">'. $location->name .'</li>';
            endforeach;
        endif;
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}