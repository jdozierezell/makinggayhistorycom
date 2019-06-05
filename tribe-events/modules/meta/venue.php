<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

				$phone   = tribe_get_phone();
				$venue_website = tribe_get_venue_website_link(); ?>

	<div class="event__venue">
	<h3>Venue</h3>

				<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

		<p><b><?php echo tribe_get_venue() ?></b></p>

				<?php if ( tribe_address_exists() ) : ?>

		<address class="tribe-events-address">

				<?php $address = tribe_get_address();
	    			$city = tribe_get_city();
	    			$state = tribe_get_state();


				echo $address . '<br />' . $city . ', ' . $state;
					if ( tribe_show_google_map_link() ) :
						echo '<br />' . tribe_get_map_link_html();
					endif; ?>

		</address>

				<?php endif; 
					if ( ! empty( $phone ) ): ?>

					<p><?php echo '<b>Phone:</b> ' . $phone; ?></p>

				<?php endif;
					if ( ! empty( $website ) ): ?>

					<p><a href="<?php echo $venue_website; ?>"><?php echo $venue_website; ?></a></p>

				<?php endif; ?>

				<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>

	</div>