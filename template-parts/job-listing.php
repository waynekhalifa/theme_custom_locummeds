<?php
/**
 * This template for listing all job listings
 */

?>

<li class="job-listing">
    <a href="<?php the_permalink(); ?>" class="company-logo">
        <?php the_company_logo(); ?>
    </a>
    <div class="job-description">
        <?php $job_category = get_the_terms( get_the_ID(), 'job_listing_category'); ?>
        <?php $job_location = get_the_terms( get_the_ID(), 'job_listing_region'); ?>
        <?php $job_type = get_the_terms( get_the_ID(), 'job_listing_type'); ?>
        <p class="category"><a href="<?php echo site_url('/') . 'jobs/?job_category=' . esc_attr( $job_category[0]->slug ); ?>"><?php echo $job_category[0]->name; ?></a></p>
        <h2 class="job-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="job-meta">
            <?php _e('Location', 'custom-locumemds'); ?>
            <a href="<?php echo site_url('/') . 'jobs/?job_location=' . esc_attr( $job_location[0]->slug ); ?>"><?php echo $job_location[0]->name; ?></a>
            <?php _e('-', 'custom-locummeds'); ?>
            <a href="<?php echo site_url('/') . 'jobs/?job_type=' . esc_attr( $job_type[0]->slug ); ?>" class="<?php echo $job_type[0]->slug; ?>"><?php echo $job_type[0]->name; ?></a>
        </p>
    </div>
    <div class="apply-now">
        <a href="#" class='apply-now__link'><?php _e('Apply Now', 'custom-locummeds'); ?></a>
        <a href="tel:01923594051"><?php _e('Call Now', 'custom-locummeds'); ?></a>
    </div>
</li>