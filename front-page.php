<?php
/**
 * This template is resposible for display home page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package locummeds-child
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="hero">
            <div class="content-wrap">
                <h1 class="hero__title"><?php _e("UK’s Leading Primary Care Medical Recruitment Agency", "custom-locummeds"); ?></h1>
                <p class="hero__subTitle"><?php _e("Helping <span>1000’s</span> of employers and candidates since 2010 finding their perfect match", "custom-locummeds"); ?></p>
                <form class="job__search" method="GET" action="<?php echo site_url('/') . '/jobs'; ?>">
                    <input type="text" id="search_location" class="job__search__input" name="search_location" placeholder="Enter your Area or Post code"/>
                    <select id="search_category" class="job__search__input" name="search_category">
                        <option value=""><?php _e('Enter your Desired Job Role', 'custom-locummeds'); ?></option>
                        <?php foreach ( get_job_listing_categories() as $cat ) : ?>
                            <option value="<?php echo esc_attr( $cat->term_id ); ?>"><?php echo esc_html( $cat->name ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" id="hero-search" class="job__search__button" value="Hire Me!" />
                </form>
                <div class="hero__actions">
                    <a href="#" id="send-cv" class="send-cv"><?php _e('Send Your CV', 'custom-locummeds'); ?></a>
                    <a href="#" id="request-callback" class="request-callback"><?php _e('Request a Callback', 'custom-locummeds'); ?></a>
                    <a href="#" id="refer-friend" class="refer-friend"><?php _e('Refer a Friend', 'custom-locummeds'); ?></a>
                </div>
                <div class="hero__roles">
                    <a href="<?php echo site_url() . '/jobs?job_category=general-practitioner'; ?>" class="role">
                        <span class="role__title"><?php _e('GP', 'custom-locummeds'); ?></span>
                        <img src="<?php echo get_template_directory_uri() . '/img/locum-meds-gp.png'; ?>" alt="Locum Meds GP">
                    </a>
                    <a href="<?php echo site_url() . '/jobs?job_category=medical-admin'; ?>" class="role">
                        <span class="role__title"><?php _e('Medical Admin', 'custom-locummeds'); ?></span>
                        <img src="<?php echo get_template_directory_uri() . '/img/locum-meds-medical.png'; ?>" alt="Locum Meds Nurse Practitioner">
                    </a>
                    <a href="<?php echo site_url() . '/jobs?job_category=paramedic'; ?>" class="role">
                        <span class="role__title"><?php _e('Paramedic', 'custom-locummeds'); ?></span>
                        <img src="<?php echo get_template_directory_uri() . '/img/locum-meds-paramedic.png'; ?>" alt="Locum Meds Paramedic">
                    </a>
                    <a href="<?php echo site_url() . '/jobs?job_category=nurse-practitioner'; ?>" class="role">
                        <span class="role__title"><?php _e('Nurse Practitioner', 'custom-locummeds'); ?></span>
                        <img src="<?php echo get_template_directory_uri() . '/img/locum-meds-nurse-practitioner.png'; ?>" alt="Locum Meds Medical Admin">
                    </a>
                    <a href="<?php echo site_url() . '/jobs?job_category=health-care-assitants'; ?>" class="role">
                        <span class="role__title"><?php _e('HCA', 'custom-locummeds'); ?></span>
                        <img src="<?php echo get_template_directory_uri() . '/img/locum-meds-hca.png'; ?>" alt="Locum Meds HCA">
                    </a>
                    <a href="<?php echo site_url() . '/jobs'; ?>" class="role">
                        <span class="role__title"><?php _e('Pharmacist', 'custom-locummeds'); ?></span>
                        <img src="<?php echo get_template_directory_uri() . '/img/locum-meds-pharmacist.png'; ?>" alt="Locum Meds Pharmacist">
                    </a>
                </div>
            </div>
        </div>
        <div class="content-wrap">
            <ul class="services">
                <li class="service">
                    <div class="service__content">
                        <h2 class="service__title">Jobs</h2>
                        <p class="service__subtitle">We provide the right job, at the right time and in the right place, when you need them most</p>
                    </div>
                    <div class="service__action">
                        <p class="service__description">Our jobs cover the whole of the UK, ensuring that wherever you are based, you’ll never be far from work. Our experienced and dedicated consultants use our extensive connections across practices and surgeries to ensure the best rates for our candidates.</p>
                        <a href="<?php echo site_url() . '/jobs'; ?>" id="explorer-jobs"><?php _e('Explore Jobs', 'custom-locumeds'); ?></a>
                    </div>
                </li>
                <li class="service">
                    <div class="service__content">
                        <h2 class="service__title">Clients</h2>
                        <p class="service__subtitle">Locum Meds is a specialist in providing experienced, qualified staff for the primary care industry.</p>
                    </div>
                    <div class="service__action">
                        <p class="service__description">By adhering to strict compliance criteria, we guarantee our clients the most qualified and experienced staff on the market. Working for you is our priority, so our consultants are constantly on call, building new relationships and sourcing you the best candidates.</p>
                        <a href="#" id="register-your-vacancy" class="register-vacancy"><?php _e('Register Your Vacancy', 'custom-locumeds'); ?></a>
                    </div>
                </li>
                <li class="service">
                    <div class="service__content">
                        <h2 class="service__title">Submit Your CV</h2>
                        <p class="service__subtitle">we find the latest jobs that are tailored to you we will send you the details direct.</p>
                    </div>
                    <div class="service__action">
                        <p class="service__description">We have helped thousands find their ideal role at the best rates in the market. Send us your CV today and see how we can help you. One of our consultants will be in contact within 24 hours to tailor your job search around your circumstances.</p>
                        <a href="#" id="apply-here" class="send-cv"><?php _e('Apply Here', 'custom-locumeds'); ?></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="about lazyload">
            <div class="content-wrap">
                <h2 class="section__title">Welcome to Locum Meds</h2>
                <p>Locum Meds is a specialist in providing experienced, qualified staff for the primary care industry. With a combined 120+ years of experience within the employment industry our dedicated and diverse team have one common goal; finding that perfect match between client and candidate.</p>
                <p>With backgrounds in medical and healthcare recruitment; from independent surgeries to large NHS hospitals, our broad understanding of the industry has been laser-focused to specialise within primary care.</p>
                <p>Over the last 9 years Locum Meds is a regionally renowned recruitment agency offering first-rate service to clients and candidates alike. We connect specialist talent with industry-leading employers, catering to all primary care and healthcare disciplines.</p>
                <p>Honesty and integrity are two words that form the ethos of Locum Meds, which is why we are able to build such long lasting working relationships with clients and candidates, who both see us as their first port of call.</p>
            </div>
        </div>
        <div class="testimonials lazyload">
            <div class="content-wrap">
                <?php
                    $args = array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => 3
                    );

                    $query = new WP_Query( $args );

                    if ($query->have_posts()) :
                        echo '<div class="owl-carousel">';
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="item">
                                <div class="testimonial__title"><?php the_title(); ?></div>
                                <div class="testimonial__content"><?php the_content(); ?></div>
                                <p class="testimonial__author">
                                    <span class="author__name"><?php the_field('author'); ?></span>
                                    <?php if ( get_field('job_title') ) : ?>
                                        -
                                        <span class="author__job"><?php the_field('job_title'); ?></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endwhile;
                        echo '</div>';
                    endif;
                ?>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();