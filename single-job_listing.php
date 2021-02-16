<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package custom-locummeds
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-job">
            <div class="content-wrap">

                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php
                            if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            endif;

                            if ( 'post' === get_post_type() ) :
                                ?>
                                <div class="entry-meta">
                                    <?php
                                    custom_locummeds_posted_on();
                                    custom_locummeds_posted_by();
                                    ?>
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                        </header><!-- .entry-header -->

                        <?php custom_locummeds_post_thumbnail(); ?>

                        <div class="entry-content">
                            <div class="single_job">
                                <div class="call-now-mobile">
                                    <div class="section__title"><?php _e('CALL NOW', 'custom-locummeds'); ?></div>
                                    <a id="call-for-info" href="tel:01923594002"><?php _e('<i class="fa fa-phone-square" aria-hidden="true"></i> 01923 594002', 'custom-locummeds'); ?></a>
                                </div>
                                
                                <div class="job_description">
                                    <h2 class="section__title"><?php _e('JOB OVERVIEW', 'custom-locummeds'); ?></h2>
                                    <?php wpjm_the_job_description(); ?>
                                </div>

                                <?php if ( candidates_can_apply() ) : ?>
                                    <div class="job-application">
                                        <div class="section__title"><?php _e('APPLY NOW', 'custom-locummeds'); ?></div>
                                        <?php get_job_manager_template( 'job-application.php' ); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="call-now">
                                    <div class="section__title"><?php _e('CALL NOW', 'custom-locummeds'); ?></div>
                                    <a id="call-for-info" href="tel:01923 594002"><?php _e('<i class="fa fa-phone-square" aria-hidden="true"></i> 01923 594002', 'custom-locummeds'); ?></a>
                                </div>
                            </div>
                        </div><!-- .entry-content -->
                    </article>

                    <?php // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                <?php endwhile; ?>
            </div>
		</main>
	</div>

<?php
get_footer();
