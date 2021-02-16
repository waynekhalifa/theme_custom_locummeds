<?php
/**
 * This template for registering custom fields
 */
function custom_fields() {
    if( function_exists('acf_add_local_field_group') ):

        // Company Contacts Fields Group
        acf_add_local_field_group(array (
            'key'   => 'cc_fields_group',
            'title' => 'Company Contact Fields',
            'location' => array (
                array (
                    array (
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'company_contact',
                    ),
                ),
            )
        ));
        // Job Title
        acf_add_local_field(array(
            'key'       => 'job_title',
            'label'     => 'Job Title',
            'name'      => 'job_title',
            'type'      => 'text',
            'parent'    => 'cc_fields_group'
        ));
        // Department
        acf_add_local_field(array(
            'key'       => 'dept',
            'label'     => 'Department',
            'name'      => 'dept',
            'type'      => 'text',
            'parent'    => 'cc_fields_group'
        ));
        // Email
        acf_add_local_field(array(
            'key'       => 'email',
            'label'     => 'Email',
            'name'      => 'email',
            'type'      => 'text',
            'parent'    => 'cc_fields_group'
        ));
        // Phone
        acf_add_local_field(array(
            'key'       => 'phone',
            'label'     => 'Phone',
            'name'      => 'phone',
            'type'      => 'text',
            'parent'    => 'cc_fields_group'
        ));

        // Testimonials Feilds Group
        acf_add_local_field_group(array(
            'key'   => 'testimonials_fields_group',
            'title' => 'Testimonials Fields',
            'location' => array (
                array (
                    array (
                        'param'     => 'post_type',
                        'operator'  => '==',
                        'value'     => 'testimonial',
                    ),
                ),
            )
        ));
        // Author
        acf_add_local_field(array(
            'key'       => 'author',
            'label'     => 'Author',
            'name'      => 'author',
            'type'      => 'text',
            'parent'    => 'testimonials_fields_group'
        ));
        // Job Title
        acf_add_local_field(array(
            'key'       => 'job_title',
            'label'     => 'Job Title',
            'name'      => 'job_title',
            'type'      => 'text',
            'parent'    => 'testimonials_fields_group'
        ));

    endif;
}

add_action( 'init', 'custom_fields' );