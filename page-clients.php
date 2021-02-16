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
	<main id="main" class="site-main clients">
		<div class="content-wrap">
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

                <?php
                    $args = array(
                        'post_type'         => 'service',
                        'posts_per_page'    => -1
                    );
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) :
                        echo '<ul class="offers">';
                        while($query->have_posts()) : $query->the_post();
                            get_template_part( 'template-parts/offer' );
                        endwhile;
                        echo '</ul>';
                    endif; 
                ?>

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