<?php
/**
 * The template for displaying all single events.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package makinggayhistory
 */

				get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php	if(have_posts()) : while (have_posts()) : the_post(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<h2 class="page__title"><?php the_title(); ?></h2>
		<section class="podcast">
		
				<?php if(get_field('p_image')) :
						$image = get_field('p_image');
						$thumb = $image['sizes']['square'];
						echo '<img class="podcast__image" src="' . $thumb . '" />';
					endif; 
					the_content(); 
					if(current_user_can('edit_posts')) : ?>
				
			<footer class="entry-footer">
				<?php making_gay_history_entry_footer(); ?>
			</footer><!-- .entry-footer -->

			<?php endif;
					the_post_navigation(array(
		        'prev_text'          => __( '&laquo; Previous Episode: %title' ),
		        'next_text'          => __( 'Next Episode: %title &raquo;' ),
		        'screen_reader_text' => __( 'Continue Reading' ),
					));

			// If comments are open or we have at least one comment, load up the comment template.
					// if (comments_open() || get_comments_number()) :
					// 	comments_template();
					// endif; ?>

		</section>
	</main>
</div><!-- #post-## -->

				<?php endwhile; // End of the loop.
				endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>