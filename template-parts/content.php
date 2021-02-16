<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package custom-locummeds
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-wrap">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->

		<?php if ( 'post' === get_post_type() ) :?>
			<div class="entry-meta">
				<?php
				custom_locummeds_posted_on();
				custom_locummeds_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php custom_locummeds_post_thumbnail(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php get_template_part( 'template-parts/share' ); ?>
	</div>
</article>
