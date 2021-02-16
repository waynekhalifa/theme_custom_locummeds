<?php
/**
 * Job Manager Company Logo
 */
add_filter( 'job_manager_default_company_logo', 'smyles_custom_job_manager_logo' );
function smyles_custom_job_manager_logo( $logo_url ){
	// Change the value below to match the filename of the custom logo you want to use
	// Place the file in a /images/ directory in your child theme's root directory.
	// The example provided assumes "/images/custom_logo.png" exists in your child theme
	$filename = 'logo_clear.png';
	
	$logo_url = get_stylesheet_directory_uri() . '/img/' . $filename;
	
	return $logo_url;
	
}