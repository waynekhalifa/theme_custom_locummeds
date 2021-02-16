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

 /* Template Name: Job Listings*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="content-wrap">
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

                <div class="entry-content">
                    <?php 
                        get_template_part( 'template-parts/job-search' );

                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'			=> 'job_listing',
                            'posts_per_page'	=> 20,
                            'paged'				=> $paged
                        );

                        $filters = array();
                        $categories = array();
                        $locations = array();
                        $types = array();
                        $taxquery = array();

                        foreach($_GET as $key => $value){
                            array_push($filters, $value ? $value : $key);
                        }

                        foreach ($filters as $filter) {
                            if (term_exists($filter, 'job_listing_category')) {
                                $term = get_term_by('slug', $filter, 'job_listing_category');
                                array_push($categories, $term->term_taxonomy_id);
                            }

                            if (term_exists($filter, 'job_listing_region')) {
                                $term = get_term_by('slug', $filter, 'job_listing_region');
                                array_push($locations, $term->term_taxonomy_id);
                            }

                            if (term_exists($filter, 'job_listing_type')) {
                                $term = get_term_by('slug', $filter, 'job_listing_type');
                                array_push($types, $term->term_taxonomy_id);
                            }
                        }

                        if (!empty($categories)) {
                            $taxquery[] = array(
                                array(
                                    'taxonomy'  => 'job_listing_category',
                                    'field'     => 'term_taxonomy_id',
                                    'terms'     => $categories,
                                    'operator'  => 'IN',
                                )
                            );
                        }

                        if (!empty($locations)) {
                            $taxquery[] = array(
                                array(
                                    'taxonomy'  => 'job_listing_region',
                                    'field'     => 'term_taxonomy_id',
                                    'terms'     => $locations,
                                    'operator'  => 'IN',
                                )
                            );
                        }

                        if (!empty($types)) {
                            $taxquery[] = array(
                                array(
                                    'taxonomy'  => 'job_listing_type',
                                    'field'     => 'term_taxonomy_id',
                                    'terms'     => $types,
                                    'operator'  => 'IN',
                                )
                            );
                        }

                        if (count($taxquery) > 1) {
                            $taxquery['relation'] = 'AND';
                        }

                        if (count($taxquery) > 0) {
                            $args['tax_query'] = $taxquery;
                        }

                        $query = new WP_Query( $args ); //print_r($query);

                        if ( $query->have_posts() ) :
                            echo '<ul class="job-listings">';
                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part( 'template-parts/job-listing' );
                            }
                            echo '</ul>';
                            wp_pagenavi( array('query' => $query) );
                        else:
                            echo '<h2>No Results found for this filterations crateria...</h2>';
                        endif;
                    ?>
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
