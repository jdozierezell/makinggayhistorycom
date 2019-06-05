<?php
/**
 * Single Event Meta Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta.php
 *
 * @package TribeEventsCalendar
 */

				do_action( 'tribe_events_single_meta_before' ); ?>

<div class="event__meta">
	<div class="event__dv">

				<?php	tribe_get_template_part( 'modules/meta/details' );
				tribe_get_template_part( 'modules/meta/venue' ); ?>

	</div>

				<?php tribe_get_template_part( 'modules/meta/map' ); ?>


</div>

				<?php do_action( 'tribe_events_single_meta_after' ); ?>