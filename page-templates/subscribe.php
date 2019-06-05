<?php
/**
 * Template Name: Subscribe
 *
 * @package makinggayhistory
 */

				get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h2 class="page__title"><?php the_title(); ?></h2>
			<section class="subscribe-content">
				<?php if (have_rows('s_subscription')) : while (have_rows('s_subscription')) : the_row();
					$image = get_sub_field('s_image'); ?>
					<a href="<?php echo get_sub_field('s_link'); ?>" target="_blank"><img src="<?php echo $image['url']; ?>"></a>
				<?php endwhile;
				endif; ?>
			</section>
			<?php get_template_part('template-parts/mailchimp'); ?>
		</main>
	</div>

				<?php get_footer(); ?>