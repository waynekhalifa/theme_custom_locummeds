<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package custom-locummeds
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main error-404">
			<div class="content-wrap">
				<header class="entry-header">
					<h1 class="entry-title"><span><?php _e('Error 404', 'custom-locummeds'); ?></span><?php esc_html_e( ' Oooops! page not found.', 'custom-locummeds' ); ?></h1>
				</header><!-- .page-header -->

				<?php get_template_part( 'template-parts/job-search' ); ?>

				<div class="contact">
					<div class="contact-form">
						<?php echo do_shortcode('[contact-form-7 id="100" title="Contact form"]'); ?>
					</div>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();
