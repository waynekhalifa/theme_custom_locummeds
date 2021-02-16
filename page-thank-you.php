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
	<main id="main" class="site-main thank-you">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="banner">
                <?php the_post_thumbnail(); ?>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>

            <div class="content-wrap">
                <div class="entry-content">
                    <?php the_content(); ?>
                    <a href="<?php echo site_url() . '/jobs'; ?>" class="more-jobs"><?php _e('Find More Jobs!', 'custom-locummeds'); ?></a>
                </div><!-- .entry-content -->
            </div>
        <?php endwhile; ?>
	</main>
</div>

<?php
get_footer();