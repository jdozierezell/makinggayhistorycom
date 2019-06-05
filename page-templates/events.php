<?php
/**
 * Template Name: Events
 *
 * @package makinggayhistory
 */

				get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part('template-parts/mailchimp'); ?>
			<h2 class="page__title"><?php the_title(); ?></h2>

				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<section class="events__intro"><?php the_content(); ?></section>
				
				<?php // Ensure the global $post variable is in scope
				global $post;
				 
				$today = new DateTime();
				$yesterday = $today->sub(new DateInterval('P1D'));

				$upcoming = tribe_get_events(array(
					'start_date'	=> $today
				));
				$previous = tribe_get_events(array(
					'end_date' 		=> $yesterday
				)); 
				if(!empty($upcoming) || !empty($previous)) : ?>

			<section class="event__list">
				<div class="event__upcoming">
					<h2 class="event__sub">Upcoming Events</h2>

				<?php if(!empty($upcoming)) : foreach($upcoming as $post) :
	    			setup_postdata($post);
	    			$venue = tribe_get_venue();
	    			// $address = tribe_get_address();
	    			$city = tribe_get_city();
	    			$state = tribe_get_state(); ?>
		    
			    <div class="event__summary">
				    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				    <h4><?php echo get_field('e_subtitle'); ?></h4> 

			  <?php if($venue != NULL) : ?>

			    	<p><?php echo $city . ', ' . $state; ?></p>

		    <?php endif; ?>
		    
				    <p><?php echo tribe_get_start_date( $post ); ?></p>

		    	</div>    

	      <?php endforeach; 
	      else :
					echo 'There are no upcoming events scheduled at this time. Please check back soon.';
				endif; ?>

	      </div>
				<div class="event__previous">
					<h2 class="event__sub">Previous Events</h2>

				<?php foreach($previous as $post) :
	    			setup_postdata($post);
	    			$venue = tribe_get_venue();
	    			// $address = tribe_get_address();
	    			$city = tribe_get_city();
	    			$state = tribe_get_state(); ?>
		    
			    <div class="event__summary">
				    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				    <h4><?php echo get_field('e_subtitle'); ?></h4> 

			  <?php if($venue != NULL) : ?>

			    	<p><?php echo $city . ', ' . $state; ?></p>

		    <?php endif; ?>

				    <p><?php echo tribe_get_start_date( $post ); ?></p>

		    	</div>    

	      <?php endforeach; ?>

	      </div>

				<?php	wp_reset_postdata(); 

				endif; ?>
				
			</section>

				<?php endwhile;
				endif; ?>
<?php get_template_part('template-parts/subscribe'); ?>
		</main>
	</div>

				<?php get_footer(); ?>