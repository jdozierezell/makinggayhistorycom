<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', __( 'Time:', 'the-events-calendar' ), $event_id );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();

				do_action( 'tribe_events_single_meta_details_section_start' );

				/***
					**
					** Date and Time Detail 
					**
				***/ ?>

	<div class="event__date">
		<h3>Date and Time</h3>


				<?php // All day (multiday) events
				if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) : ?>

		<div class="event__time">
			<p><b>Start:</b> <?php esc_html_e( $start_date ) ?> </p>
			<p><b>End:</b> <?php esc_html_e( $end_date ) ?> </p>
		</div>

				<?php	// All day (single day) events
				elseif ( tribe_event_is_all_day() ): ?>

		<div class="event__time">
			<p><b>Start:</b> <?php esc_html_e( $start_date ) ?> </p>
		</div>

				<?php	// Multiday events
				elseif ( tribe_event_is_multiday() ) : ?>

		<div class="event__time">
			<p><b>Start:</b> <?php esc_html_e( $start_datetime ) ?> </p>
			<p><b>End:</b> <?php esc_html_e( $end_datetime ) ?> </p>
		</div>

				<?php	// Single day events
				else : ?>

		<div class="event__time">
			<p><b>Start:</b> <?php esc_html_e( $start_date ) . ' &mdash; ' . $time_formatted; ?> </p>
		</div>

				<?php endif; ?>

	</div>

				<?php 

		// Event Cost
		if ( ! empty( $cost ) ) : ?>

	<div class="event__cost">
		<p><b>Cost:</b> <?php esc_html_e( $cost ); ?></p>
	</div>

		<?php endif ?>

		<?php
		echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<p>',
				'label_after'  => '</p>',
				'wrap_before'  => '<div class="event__categories">',
				'wrap_after'   => '</div>',
			)
		);
		?>

		<?php echo tribe_meta_event_tags( sprintf( esc_html__( '%s Tags:', 'the-events-calendar' ), tribe_get_event_label_singular() ), ', ', false ) ?>

		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>

	<div class="event__website">
		<p><a href="<?php echo $website; ?>"><?php echo $website; ?></a>
	</div>

		<?php endif; ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>