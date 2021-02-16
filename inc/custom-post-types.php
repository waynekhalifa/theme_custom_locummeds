<?php 
function custom_post_types() {
    // Company Contact
	register_post_type( 'company_contact', array(
		'supports' => array('title', 'thumbnail'),
		'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'company_contacts'),
        'public' => true,
        'menu_icon' => 'dashicons-admin-users',
		'labels' => array(
			'name' => 'Company Contacts',
			'add_new_item' => 'New Company Contact',
			'edit_item' => 'Edit Company Contact',
			'all_items' => 'All Company Contacts',
			'singular_name' => 'Company Contact'
		),
	));
	
	// Testimonial
	register_post_type( 'testimonial', array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'public' => true,
        'menu_icon' => 'dashicons-format-status',
		'labels' => array(
			'name' => 'Testimonials',
			'add_new_item' => 'New Testimonial',
			'edit_item' => 'Edit Testimonial',
			'all_items' => 'All Testimonials',
			'singular_name' => 'Testimonial'
		),
	));
	
	// Service
	register_post_type( 'service', array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'services'),
        'public' => true,
        'menu_icon' => 'dashicons-buddicons-community',
		'labels' => array(
			'name' => 'Services',
			'add_new_item' => 'New Service',
			'edit_item' => 'Edit Service',
			'all_items' => 'All Services',
			'singular_name' => 'Service'
		),
	));

	// Candidate
	register_post_type( 'candidate', array(
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'candidates'),
        'public' => true,
        'menu_icon' => 'dashicons-buddicons-groups',
		'labels' => array(
			'name' => 'Candidates',
			'add_new_item' => 'New Candidate',
			'edit_item' => 'Edit Candidate',
			'all_items' => 'All Candidates',
			'singular_name' => 'Candidate'
		),
	));
}
add_action( 'init', 'custom_post_types', 0 );