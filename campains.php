<?php
/**
 * The template for displaying all campains
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package custom-locummeds
 */

 /* Template Name: Compains*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main campain">
        <?php custom_locummeds_post_thumbnail(); ?>
        <div class="content-wrap">
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="call-now mobile">
                    <h2 class="section__title"><?php _e('Call Us Now!', 'custom-locummeds'); ?></h2>
                    <a id="call-for-info" href="tel:01923594051"><?php _e('<i class="fa fa-phone-square" aria-hidden="true"></i> 01923 594 051', 'custom-locummeds'); ?></a>
                </div>

				<div class="entry-content">
                    <h1 class="section__title page-title"><?php _e('Why are you Applying for our Nurse Practitioner and Paramedic Jobs?', 'custom-locummeds'); ?></h1>
					<?php the_content(); ?>
				</div><!-- .entry-content -->

                <div class="contact">
                    <h2 class="section__title"><?php _e('Send us your Contact Details', 'custom-locummeds'); ?></h2>
                    <div class="section__content">
                        <?php echo do_shortcode('[contact-form-7 id="24828" title="Campain Form"]'); ?>
                    </div>
                </div>

                <div class="call-now desktop">
                    <h2 class="section__title"><?php _e('Call Us Now!', 'custom-locummeds'); ?></h2>
                    <a id="call-for-info" href="tel:01923594051"><?php _e('<i class="fa fa-phone-square" aria-hidden="true"></i> 01923 594 051', 'custom-locummeds'); ?></a>
                </div>

				<?php // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; ?>
		</div>
	</main>
</div>

<?php
get_footer();