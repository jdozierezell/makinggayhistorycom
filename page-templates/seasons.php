<?php
/**
 * Template Name: Seasons
 *
 * @package makinggayhistory
 */

				get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php get_template_part('template-parts/mailchimp'); ?>

				<?php if(have_rows('s_to_display')) : 
					while(have_rows('s_to_display')) : the_row();
						$display_order = get_sub_field('s_display_order');
						$as_header = get_sub_field('s_first');

						$term_object = get_sub_field_object('s_display');
						$term = $term_object['value'];
						$term_label = $term_object['choices'][$term];
						
						echo '<script>console.log("' . $display_order . '");</script>';
						
						
						
						
						if($display_order === 'chron') :
							$order = 'ASC';
						elseif($display_order === 'rev_chron') :
							$order = 'DESC';
						endif;


						// WP_Query arguments
						$args = array (
							'post_type'	=> array( 'podcast' ),
							'nopaging'  => true,
							'orderby'   => 'menu_order',
							'order'			=> $order,
							'tax_query'	=> array(
																array(
																				'taxonomy' => 'season',
																				'field'		 => 'slug',
																				'terms'		 => $term
																)
							)
						);

						// The Query
						$podcasts = new WP_Query( $args ); ?>

			<section class="podcasts">
				<h2 class="page__title"><?php echo $term_label; ?></h2>

				<?php // The Loop
						if ( $podcasts->have_posts() ) :
							$podcast_counter = 0; // set count variable
							while ( $podcasts->have_posts() ) :	$podcasts->the_post();
								$image = get_field('p_image');
								$latest = $image['sizes']['seven-by-five'];
								$thumb = $image['sizes']['square'];
								if($podcast_counter === 0 && $as_header === 'yes') : ?>

				<div class="podcasts__latest">
					<img src="<?php echo $thumb; ?>" />
					<div class="podcasts__content">
						<h3><?php the_title(); ?></h3>
						<iframe frameborder="0" height="200" scrolling="no" src="https://embed.radiopublic.com/e?us=https:%2F%2Fplay.radiopublic.com%2F74fbfc15-5736-41ee-869b-c07f5e996967%2Fep%2F<?php echo get_field('p_id'); ?>&if=74fbfc15-5736-41ee-869b-c07f5e996967&ge=<?php echo get_field('p_id'); ?>&gs=_blank" width="100%"></iframe>
						<p><?php the_field('p_short'); ?></p>
						<div class="podcasts__buttons">
							<a class="button" href="<?php the_permalink(); ?>">Read More</a>
							<a class="button" id="subscribe_button" href="#">Subscribe</a> <!-- https://itunes.apple.com/podcast/id1162447122 -->
						</div>
					</div>
				</div>

				

				<?php else: ?>

				<div class="podcasts__previous">
					<div class="podcasts__container">
						<div class="podcasts__card">
						  <div class="face">
						    <img src="<?php echo $thumb; ?>"/>
						    <p class="face__title"><?php echo get_the_title(); ?></p>
						  </div>
						  <div class="back face">
								<p><?php the_field('p_short'); ?></p>
								<a class="button" href="<?php the_permalink(); ?>">Read More</a>
						  </div>
						</div>
					</div>
					<iframe frameborder="0" height="200" scrolling="no" src="https://embed.radiopublic.com/e?us=https:%2F%2Fplay.radiopublic.com%2F74fbfc15-5736-41ee-869b-c07f5e996967%2Fep%2F<?php echo get_field('p_id'); ?>&if=74fbfc15-5736-41ee-869b-c07f5e996967&ge=<?php echo get_field('p_id'); ?>&gs=_blank" width="100%"></iframe>
				</div>	

				<?php endif;
	
								$podcast_counter++; // increment podcast count variable
							endwhile;
						endif;

						// Restore original Post Data
						wp_reset_postdata(); ?>

			</section>	

				<?php endwhile;
				endif; ?>
        
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

<!-- 	<div class="modal__overlay"></div>
	<div class="modal">
		<h2 class="modal__title">Choose your player</h2>
		<div class="modal__buttons">
			<a class="modal__button" id="iTunes" href="https://itunes.apple.com/podcast/id1162447122" target="_blank">iTunes Podcasts</a>
			<a class="modal__button" id="stitcher" href="http://www.stitcher.com/podcast/101533" target="_blank">Stitcher</a>
			<a class="modal__button" id="googlePlay" href="https://play.google.com/music/listen#/ps/Ix2nqacftzy2vy3zl442dlqe2qa" target="_blank">Google Play</a>
			<a class="modal__button" id="spotify" href="https://open.spotify.com/show/1NlHk37Vo7HlGE1CFg8uGx" target="_blank">Spotify</a>
		</div>
	</div>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#subscribe_button').on('click',function(e){
		e.preventDefault();
		$('.modal__overlay, .modal').css('display','block');
	});
	$('.modal__overlay').on('click',function(){
		$('.modal__overlay, .modal').css('display','none');
	});
});
</script> -->

				<?php get_footer(); ?>