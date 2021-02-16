<?php
/**
 * This template for creating custom job search form
 */

?>

<div class="job-filters">
    <form class="job-search" method="GET" action="<?php echo site_url('/') . '/jobs'; ?>">
        <input type="text" id="search_location" class="job__search__input" name="search_location" placeholder="e.g. London, West London"/>
        <select id="search_category" class="job__search__input" name="search_category">
            <option value=""><?php _e('Jobs', 'custom-locummeds'); ?></option>
            <?php foreach ( get_job_listing_categories() as $cat ) : ?>
                <option value="<?php echo esc_attr( $cat->term_id ); ?>"><?php echo esc_html( $cat->name ); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" id="jobs-search" class="job__search__button" value="Search Jobs" />
    </form>

    <form class="jobs-filter" method="GET" action="<?php echo site_url('/') . 'jobs/?'; ?>">
        <?php
            $args = array(
                'orderby'       => 'count', 
                'order'         => 'DSC',
                'hide_empty'    => true, 
                'number'        => 5, 
                'fields'        => 'all',
            );
            $job_categories = get_terms( 'job_listing_category', $args); 
        ?>
        <?php if ($job_categories) : ?>
            <div class="employment-types">
                <h2 class="title"><?php _e('Job Categories', 'custom-locummeds'); ?></h2>
                <ul id="categories-container" class="job-types">
                    <?php foreach ( $job_categories as $category ) : ?>
                        <li class=""><input type="checkbox" name="job_category" value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="read-more">
                    <a class="read-more__button" data-page="1" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-action="load_more_categories" data-container="#categories-container" data-loader="#categories-loader">
                        <?php _e('Show More', 'custom-locummeds'); ?>
                        <div id="categories-loader" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php
            $args = array(
                'orderby'       => 'count',
                'order'         => 'DSC',
                'hide_empty'    => true, 
                'number'        => 5, 
                'fields'        => 'all',
            );
            $job_locations = get_terms( 'job_listing_region', $args); 
        ?>
        <?php if ($job_locations) : ?>
            <div class="employment-types">
                <h2 class="title"><?php _e('Job Locations', 'custom-locummeds'); ?></h2>
                <ul id="locations-container" class="job-types">
                    <?php foreach ( $job_locations as $location ) : ?>
                        <li class=""><input type="checkbox" name="job_location" value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="read-more">
                    <a class="read-more__button" data-page="1" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-action="load_more_locations" data-container="#locations-container" data-loader="#locations-loader">
                        <?php _e('Show More', 'custom-locummeds'); ?>
                        <div id="locations-loader" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( ! is_tax( 'job_listing_type' ) && empty( $job_types ) ) : ?>
            <div class="employment-types">
                <h2 class="title"><?php _e('Employment Type', 'custom-locummeds'); ?></h2>
                <ul class="job-types">
                    <?php foreach ( get_job_listing_types() as $type ) : ?>
                        <li class=""><input type="checkbox" name="job_type" value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ( $job_types ) : ?>
            <?php foreach ( $job_types as $job_type ) : ?>
                <input type="hidden" name="job_type" value="<?php echo esc_attr( sanitize_title( $job_type ) ); ?>" />
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" id="jobs-filter" class="job__search__button" value="Filter jobs" />
    </form>
</div>
