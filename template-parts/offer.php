<li class="offer">
    <div class="offer__thumb">
        <img data-src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="lazyload">
    </div>
    <h3 class="offer__title"><?php the_title(); ?></h3>
    <?php the_content(); ?>
</li>

