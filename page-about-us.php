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
	<main id="main" class="site-main about-us">
		<div class="content-wrap">
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
                    <h2 class="section__title">Welcome to Locum Meds</h2>
					<?php the_content(); ?>
                </div><!-- .entry-content -->
                
                
                <?php
                    $args = array(
                        'post_type' => 'company_contact',
                        'posts_per_page' => 12
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) : ?>
                        <div id="company-contacts">
                            <h2 class="section__title">Honorable Company Contacts</h2>
                            <ul class="company-contacts">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <li class="company-contact">
                                    <div class="company-contact__thumb">
                                        <img data-src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="lazyload">
                                    </div>
                                    <h3 class="company-contact__name"><?php the_title(); ?></h3>
                                    <p class="company-contact__jop">
                                        <span><?php the_field('job_title'); ?></span>
                                        <?php if ( get_field('dept') ) : ?>
                                            -
                                            <span><?php the_field('dept'); ?></span>
                                        <?php endif; ?>
                                    </p>
                                    <p class="company-contact__email"><?php the_field('email'); ?></p>
                                    <p class="company-contact__phone"><?php the_field('phone'); ?></p>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>       
                    <?php endif;
                ?><!-- /.company-contacts -->
                
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
