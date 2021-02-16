<?php
/**
 * This template for customizing job manager for match google for jobs
 */

// Add Salary field in the front end job posting form
function frontend_add_salary_field( $fields ) {
    $fields['job']['job_salary'] = array(
        'label'       => __( 'Salary (£)', 'job_manager' ),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'e.g. 20000',
        'priority'    => 7
    );
    return $fields;
}
add_filter( 'submit_job_form_fields', 'frontend_add_salary_field' );

// Add Salary field in the admin
function admin_add_salary_field( $fields ) {
    $fields['_job_salary'] = array(
        'label'       => __( 'Salary (£)', 'job_manager' ),
        'type'        => 'text',
        'placeholder' => 'e.g. 20000',
        'description' => ''
    );
    return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'admin_add_salary_field' );

// Display the Salary in single job 
function display_job_salary_data() {
    global $post;

    $salary = get_post_meta( $post->ID, '_job_salary', true );

    if ( $salary ) {
        echo '<li>' . __( 'Salary:' ) . ' £' . esc_html( $salary ) . '</li>';
    }
}
add_action( 'single_job_listing_meta_end', 'display_job_salary_data' );

// Add Street Address field in the front end job posting form
function frontend_add_street_address_field( $fields ) {
    $fields['job']['street_address'] = array(
        'label'       => __( 'St. Address', 'job_manager' ),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'e.g. 555 Clansy St',
        'priority'    => 7
    );
    return $fields;
}
add_filter( 'submit_job_form_fields', 'frontend_add_street_address_field' );

// Add Street Address field in the admin
function admin_add_street_address_field( $fields ) {
    $fields['_street_address'] = array(
        'label'       => __( 'St. Address', 'job_manager' ),
        'type'        => 'text',
        'placeholder' => 'e.g. 555 Clansy St',
        'description' => ''
    );
    return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'admin_add_street_address_field' );

// Display the Street Address in single job 
// function display_street_address_data() {
//     global $post;

//     $street_address = get_post_meta( $post->ID, '_street_address', true );

//     if ( $street_address ) {
//         echo '<li>' . __( 'Address:' ) . ' ' . esc_html( $street_address ) . '</li>';
//     }
// }
// add_action( 'single_job_listing_meta_end', 'display_street_address_data' );

// Add Postal Code field in the front end job posting form
function frontend_add_postal_code_field( $fields ) {
    $fields['job']['postal_code'] = array(
        'label'       => __( 'Postal Code', 'job_manager' ),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'e.g 48201',
        'priority'    => 7
    );
    return $fields;
}
add_filter( 'submit_job_form_fields', 'frontend_add_postal_code_field' );

// Add Postal Code field in the admin
function admin_add_postal_code_field( $fields ) {
    $fields['_postal_code'] = array(
        'label'       => __( 'Postal Code', 'job_manager' ),
        'type'        => 'text',
        'placeholder' => 'e.g. 48201',
        'description' => ''
    );
    return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'admin_add_postal_code_field' );

// Add Address Region field in the front end job posting form
function frontend_add_address_region_field( $fields ) {
    $fields['job']['address_region'] = array(
        'label'       => __( 'Address Region', 'job_manager' ),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'e.g MI',
        'priority'    => 7
    );
    return $fields;
}
add_filter( 'submit_job_form_fields', 'frontend_add_address_region_field' );

// Add Address Region field in the admin
function admin_add_address_region_field( $fields ) {
    $fields['_address_region'] = array(
        'label'       => __( 'Address Region', 'job_manager' ),
        'type'        => 'text',
        'placeholder' => 'e.g MI',
        'description' => ''
    );
    return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'admin_add_address_region_field' );

// Add Address Region field in the front end job posting form
function frontend_add_address_locality_field( $fields ) {
    $fields['job']['address_locality'] = array(
        'label'       => __( 'Address Locality', 'job_manager' ),
        'type'        => 'text',
        'required'    => true,
        'placeholder' => 'e.g London',
        'priority'    => 7
    );
    return $fields;
}
add_filter( 'submit_job_form_fields', 'frontend_add_address_locality_field' );

// Add Address Locality field in the admin
function admin_add_address_locality_field( $fields ) {
    $fields['_address_locality'] = array(
        'label'       => __( 'Address Locality', 'job_manager' ),
        'type'        => 'text',
        'placeholder' => 'e.g London',
        'description' => ''
    );
    return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'admin_add_address_locality_field' );
