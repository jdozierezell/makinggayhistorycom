<?php
/**
 * Template Name: Not Home
 *
 * @package makinggayhistory
 */

				get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php get_template_part('template-parts/mailchimp'); ?>

				<?php 

						// WP_Query arguments
						$args = array (
							'post_type'	=> array( 'podcast' ),
							'posts_per_page' => 1,
							'post_status' => 'publish'
						);

						// The Query
						$latestPodcast = new WP_Query( $args ); ?>

			<section class="podcasts">

				<?php // The Loop
						if ( $latestPodcast->have_posts() ) :	while ( $latestPodcast->have_posts() ) :	$latestPodcast->the_post();
								$image = get_field('p_image');
								$latest = $image['sizes']['seven-by-five'];
								$thumb = $image['sizes']['square']; ?>

				<div class="podcasts__latest">
					<img src="<?php echo $thumb; ?>" />
					<div class="podcasts__content">
						<h3><?php the_title(); ?></h3>
						<iframe frameborder="0" height="200" scrolling="no" src="https://embed.radiopublic.com/e?us=https:%2F%2Fplay.radiopublic.com%2F74fbfc15-5736-41ee-869b-c07f5e996967%2Fep%2F<?php echo get_field('p_id'); ?>&if=74fbfc15-5736-41ee-869b-c07f5e996967&ge=<?php echo get_field('p_id'); ?>&gs=_blank" width="100%"></iframe>
						<p><?php the_field('p_short'); ?></p>
						<div class="podcasts__buttons">
							<a class="button" href="<?php the_permalink(); ?>">Read More</a>
							<a class="button" id="subscribe_button" href="<?php echo get_home_url(); ?>/subscribe">Subscribe</a> 
						</div>
					</div>
				</div>

				<?php endwhile;
						endif;

						// Restore original Post Data
						wp_reset_postdata(); ?>

			</section>

				<?php if (have_rows('h_season_buttons')) : ?>
				
			<section class="seasons-links">
				<h2>Keep Listening</h2>

				<?php while (have_rows('h_season_buttons')) : the_row();
						$post_object = get_sub_field('h_season_button');
						if ($post_object) :
							$post = $post_object;
							setup_postdata( $post ); ?>

				<a class="button" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

				<?php wp_reset_postdata();
						endif;
					endwhile; ?>

			</section>

				<?php endif; ?>

				<?php get_template_part('template-parts/subscribe'); ?>

		</main>
	</div>

				<?php get_footer(); ?>