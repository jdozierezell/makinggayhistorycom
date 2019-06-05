<?php
/**
 * Template Name: About
 *
 * @package makinggayhistory
 */

				get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?php get_template_part('template-parts/mailchimp'); ?>
			<h2 class="page__title"><?php the_title(); ?></h2>
			<section class="about">
				<div class="about__intro"><?php the_field('a_about'); ?></div>
			</section>

				<?php if(have_rows('a_team')) : ?>

			<section class="about">
				<section class="team">
					<h2 class="page__sub">The Team</h2>

				<?php while(have_rows('a_team')) : the_row();
						if(get_sub_field('a_image')) :
							$image = get_sub_field('a_image');
							$thumb = $image['sizes']['square'];
						endif; ?>

					<div class="team__member">

				<?php echo $thumb ? '<img class="team__image" src="' . $thumb . '" />' : '<span class="team__image"></span>'; ?>

						<div class="team__bio">

				<?php the_sub_field('a_bio'); ?>

						</div>
					</div>

				<?php $thumb = NULL;
					endwhile; ?>

				</section>
			</section>
			<section class="about">

					<?php endif; ?>
					
					<?php if(get_field('a_board')) : ?>

				<section class="board">
					<h2 class="page__sub">Advisory Board</h2>
					
					<?php the_field('a_board'); ?>
					
				</section>

					<?php endif; ?>

			</section>
				<?php get_template_part('template-parts/subscribe'); ?>
		</main>
	</div>

				<?php get_footer(); ?>