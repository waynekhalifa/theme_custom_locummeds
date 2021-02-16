<?php
/**
 * This template for customizing the structured data provided by wp job manager
 */
function custom_locummeds_add_field_to_job_structured_data( $data, $post )
{
	if( $post && $post->ID ){
		// baseSalary data
		$salary = get_post_meta( $post->ID, '_job_salary', true );
		// employmentType data
		$types = get_the_terms( $post->ID, 'job_listing_type' );
		$employment_type = $types[0]->name;
		// jobLocation data
		$locations = get_the_terms( $post->ID, 'job_listing_region' );
		$location = $locations[0]->name;
		$address_locality = get_post_meta( $post->ID, '_address_locality', true );
		$address_region = get_post_meta( $post->ID, '_address_region', true );
		$postal_code = get_post_meta( $post->ID, '_postal_code', true );
		$street_address = get_post_meta( $post->ID, '_street_address', true );
		
		// Here you can add values that would be considered "not a salary" to skip output for
		$no_salary_values = array( 'Not Disclosed', 'N/A', 'TBD' );
		
		// Don't add anything if empty value, or value equals something above in no salary values
		if( empty( $salary) || in_array( strtolower( $salary ), array_map( 'strtolower' , $no_salary_values ) ) ){
			return $data;
		}
		
		// Determine float value, stripping all non-alphanumeric characters
		$salary_float_val = (float) filter_var( $salary, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
		
		if( ! empty( $salary_float_val ) ){
			// @see https://schema.org/JobPosting
			// Simple value:
			//$data['baseSalary'] = $salary_float_val;
			
			// Or using Google's Structured Data format
			// @see https://developers.google.com/search/docs/data-types/job-posting
			// This is the format Google really wants it in, so you should customize this yourself
			// to match your setup and configuration
			$data['baseSalary'] = array(
				'@type' => 'MonetaryAmount',
				'currency' => 'GBP',
				'value' => array(
					'@type' => 'QuantitativeValue',
					'value' => $salary_float_val,
					// HOUR, DAY, WEEK, MONTH, or YEAR
					'unitText' => 'MONTH'
				)
			);
		}

		if( ! empty( $employment_type ) ){
			// @see https://schema.org/JobPosting
			$data['employmentType'] = $employment_type;
		}

		if( ! empty( $location ) && ! empty( $address_locality ) && ! empty( $address_region ) && ! empty( $postal_code ) && ! empty( $street_address ) ){
			// @see https://schema.org/JobPosting
			$data['jobLocation'] = array(
				'@type' 	=> 'Place',
				'address'	=> array(
					'@type'		=> 'PostalAddress',
					'name'		=> $location,
					'streetAddress'	=> $street_address,
					'addressLocality'	=> $address_locality,
					'addressRegion'		=> $address_region,
					'postalCode'		=> $postal_code,
					'addressCountry'	=> 'UK'
				)
			);
		}
	}
	return $data;
}
add_filter( 'wpjm_get_job_listing_structured_data', 'custom_locummeds_add_field_to_job_structured_data', 10, 2 );