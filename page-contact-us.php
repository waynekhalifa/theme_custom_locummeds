<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package custom-locummeds
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main contact-us">
		<div class="content-wrap">
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                
                <div class="location">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2474.7850779896826!2d-0.3987838842242662!3d51.66377127966113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48766ac12cf1008f%3A0xd20e3044273abd4!2sLocum%20Meds!5e0!3m2!1sen!2seg!4v1572267703410!5m2!1sen!2seg" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>

                <div class="contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="100" title="contact_form"]'); ?>
                </div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

            <?php endwhile; ?>
		</div>
	</main>
</div>

<?php
get_footer();