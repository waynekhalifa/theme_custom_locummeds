<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom-locummeds
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KQR2M2N');</script>
<!-- End Google Tag Manager -->


	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="google-site-verification" content="QQDc89HRKu9LOFL2YbVEnr-n-uYcwDvHYkfo5SErFWc" />
	<?php if (is_singular('job_listing')) : 
		$job = get_post();
		$job_meta = get_post_meta( $job->ID );
		$street_address = $job_meta[_street_address];
		$address_locality = $job_meta[_address_locality];
		$address_region = $job_meta[_address_region];
		$job_salary = $job_meta[_job_salary];
		$postal_code = $job_meta[_postal_code];
		$job_expires = $job_meta[_job_expires];
        $job_types = get_the_terms($job->ID, 'job_listing_type');
        $description = strip_tags($job->post_content); ?>
	<link rel="canonical" href="<?php echo site_url() . '/jobs/' . $job->post_name; ?>" />
    <meta name="description" content="<?php echo custom_locummeds_excerpt($description, 160); ?>"/>
	<script type="application/ld+json"> 
	{
		"@context" : "https://schema.org/",
		"@type" : "JobPosting",
		"title" : "<?php echo $job->post_title; ?>",
		"description" : "<p><?php echo strip_tags($job->post_content); ?></p>",   
		"datePosted" : "<?php echo $job->post_date; ?>",   
		"hiringOrganization" : {     
			"@type" : "Organization",
			"name" : "Locum Meds",
			"url" : "https://locummeds.co.uk/",
			"sameAs" : [
				"https://www.facebook.com/locummeds/",
				"https://www.linkedin.com/company/locum-meds",
				"https://twitter.com/locummeds"
			],  
			"logo" : "https://locummeds.co.uk/wp-content/uploads/2018/03/logo_clear.png"
		},
		"jobLocation" : {
			"@type" : "Place", 
			"address" : {
				"@type" : "PostalAddress",
				"streetAddress" : "<?php echo ($street_address) ? $street_address[0] : '34 Clarendon Road'; ?>",
				"addressLocality" : "<?php echo ($address_locality) ? $address_locality[0] : 'Watford'; ?>",
				"addressRegion" : "<?php echo ($address_region) ? $address_region[0] : 'WA'; ?>",
				"postalCode" : "<?php echo ($postal_code) ? $postal_code[0] : 'WD17 1ET'; ?>",
				"addressCountry": "Uk"
			}
		},
		"identifier": {
			"@type": "PropertyValue",
			"name": "<?php echo $job->post_name; ?>",
			"value": "<?php echo $job->ID; ?>"
		},
		"employmentType" : "<?php echo ($job_types) ? preg_replace('/\s+/', '_', strtoupper($job_types[0]->name)) : 'FULL_TIME'; ?>",
		"validThrough" : "<?php echo ($job_expires) ? $job_expires[0] : '2020-01-01'; ?>",
		"baseSalary" : {
			"@type": "MonetaryAmount",
			"currency": "GBP",
			"value": {
			"@type": "QuantitativeValue",
				"minValue": 2000,
				"maxValue": <?php echo ($job_salary) ? $job_salary[0] : 3000; ?>,
				"unitText": "MONTH"
			}
		}
	}
	</script>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQR2M2N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="topbar" class="topbar">
		<div class="content-wrap">
			<div class="contact">
                <div class="mail"><?php dynamic_sidebar('mail'); ?></div>
                <a href="#" id="send-cv" class="send-cv"><?php _e('Send your CV', 'custom-locummeds'); ?></a>
                <a class="call-now" href="tel:01923594002"><?php _e('<i class="fa fa-phone-square" aria-hidden="true"></i> 01923 594002', 'custom-locummeds'); ?></a>
			</div>
		</div>
	</div>
	<header id="masthead" class="site-header">
		<div class="header-wrap">
			<div class="site-branding">
                <?php the_custom_logo(); ?>
			</div><!-- .site-branding -->

			<div class="menu__icon">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav>
		</div>
	</header>

	<?php if ( ! is_page( array(is_front_page(), 'nurse-practitioner-and-paramedic', 'thank-you')) ) : ?>
        <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
	<?php endif; ?>

	<div id="content" class="site-content">
