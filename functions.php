<?php
/**
 * custom-locummeds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package custom-locummeds
 */
show_admin_bar(false);

if ( ! function_exists( 'custom_locummeds_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function custom_locummeds_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on custom-locummeds, use a find and replace
		 * to change 'custom-locummeds' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'custom-locummeds', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'custom-locummeds' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'custom-locummeds' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'custom_locummeds_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'custom_locummeds_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function custom_locummeds_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'custom_locummeds_content_width', 640 );
}
add_action( 'after_setup_theme', 'custom_locummeds_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function custom_locummeds_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'custom_locummeds-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'custom_locummeds_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function custom_locummeds_scripts() {
	wp_enqueue_style( 'custom-locummeds-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom-locummeds-fonts', 'https://fonts.googleapis.com/css?family=Asap:400,700|Montserrat:300,400,600&display=swa' );
	wp_enqueue_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/js/owl/owl.carousel.min.css' );

	wp_enqueue_script( 'locummeds-child-vendor', get_stylesheet_directory_uri() . '/js/Vendor.js', false, false );
    wp_register_script( 'locummeds-child-script', get_stylesheet_directory_uri() . '/js/App.js', false, true );
    wp_localize_script( 'locummeds-child-script', 'data', array( 'site_url' => site_url()) );
    wp_enqueue_script( 'locummeds-child-script' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'custom_locummeds_scripts' );

/**
 * Register modals.
 */
require get_template_directory() . '/inc/modal.php';

/**
 * Changes Job Manager default Company Logo.
 */
require get_template_directory() . '/inc/company-logo.php';

/**
 * Register Custom Fields.
 */
require get_template_directory() . '/inc/acf-fields.php';

/**
 * Implements Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Implements Custom Excerpt functionality.
 */
require get_template_directory() . '/inc/custom-excerpt.php';

/**
 * Implements Breadcrumbs.
 */
require get_template_directory() . '/inc/responsive-images.php';

/**
 * Implements Infinite Scroll.
 */
require get_template_directory() . '/inc/load-more.php';

/**
 * Social Links.
 */
require get_template_directory() . '/inc/social-links.php';

/**
 * Register widget areas.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Register Custom Post Types.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * WP Job Manager Customization.
 */
require get_template_directory() . '/inc/job-manager.php';

/**
 * WP Job Manager Structured Data Customization.
 */
require get_template_directory() . '/inc/structured-data.php';

/**
 * Rewrite pages priority higher than custom post types and taxonomies.
 */
require get_template_directory() . '/inc/verbose-rules.php';

/**
 * Remove the api discovery from the site
 */

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);
// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

if (is_singular('job_listing')) {
    // removes the yoast schema
    function disable_yoast_schema_data($data){
        $data = array();
        return $data;
    }
    add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);
}

add_filter( 'wpjm_get_job_listing_structured_data', '__return_false' );

