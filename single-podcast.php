<?php
/**
 * The template for displaying all single podcasts.
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

				<?php get_template_part('template-parts/subscribe'); ?>
	
		<h2 class="page__title"><?php the_title(); ?></h2>
		<section class="podcast">
		
			<?php if(get_field('p_alt_image') || get_field('p_image')) :
					$image 	 = get_field('p_alt_image') ? get_field('p_alt_image') : get_field('p_image');
					$thumb 	 = $image['sizes']['square'];
					$caption = $image['caption'];
					$image_display  = '<div class="podcast__image">';
					$image_display .= '<img src="' . $thumb . '" />';
					$image_display .= $caption ? '<span class="podcast__image-caption">' . $caption . '</span>' : '';
					$image_display .= '</div>';
					echo $image_display;
				endif; ?>
				<iframe frameborder="0" height="200" scrolling="no" src="https://embed.radiopublic.com/e?us=https:%2F%2Fplay.radiopublic.com%2F74fbfc15-5736-41ee-869b-c07f5e996967%2Fep%2F<?php echo get_field('p_id'); ?>&if=74fbfc15-5736-41ee-869b-c07f5e996967&ge=<?php echo get_field('p_id'); ?>&gs=_blank" width="100%"></iframe>

					<?php
					the_field('p_notes'); 
					if(current_user_can('edit_posts')) : ?>
				
			<footer class="entry-footer">
				<?php making_gay_history_entry_footer(); ?>
			</footer><!-- .entry-footer -->

			<?php endif;
					the_post_navigation(array(
		        'prev_text'          => __( '&laquo; %title' ),
		        'next_text'          => __( '%title &raquo;' ),
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
				
				<?php
				echo '<div class="mailchimp-bottom">';
				get_template_part( 'template-parts/mailchimp' ); 
				echo '</div>';
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>