<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Validate template basic data
 * @since	1.0.6
 * @version	1.8.7
 * @param	string		$template_title
 * @param	string	$template_start Format 'YYYY-MM-DD'
 * @param	string	$template_end	Format 'YYYY-MM-DD'
 * @return	array
 */
function bookacti_validate_template_data( $template_title, $template_start, $template_end ) {

    //Init var to check with worst case
    $is_template_start_before_end	= false;
	
    //Prepare var that will be used to check the conditions
    $start_date = strtotime( $template_start );
    $end_date   = strtotime( $template_end );
	
    //Make the tests to validate the var
    if( $start_date <= $end_date ) { $is_template_start_before_end = true; }
	
    $return_array = array();
    $return_array['status'] = 'valid';
    $return_array['errors'] = array();
    if( ! $is_template_start_before_end ) {
        $return_array['status'] = 'not_valid';
		$return_array['errors'][] = 'error_closing_before_opening';
    }
    
    return apply_filters( 'bookacti_validate_template_data', $return_array, $template_title, $template_start, $template_end );
}


/**
 * Format template managers
 * @version 1.8.8
 * @param array $template_managers
 * @return array
 */
function bookacti_format_template_managers( $template_managers = array() ) {
	$template_managers = bookacti_ids_to_array( $template_managers );
	
	// If user is not super admin, add him automatically in the template managers list if he isn't already
	$bypass_template_managers_check = apply_filters( 'bookacti_bypass_template_managers_check', false );
	if( ! is_super_admin() && ! $bypass_template_managers_check ) {
		$user_id = get_current_user_id();
		if( ! in_array( $user_id, $template_managers, true ) ) {
			$template_managers[] = $user_id;
		}
	}
	
	// Make sure all users have permission to manage templates
	$template_managers_caps = array( 'bookacti_edit_bookings', 'bookacti_edit_templates', 'bookacti_read_templates' );
	foreach( $template_managers as $i => $template_manager ) {
		if( $template_manager ) {
			$user_can = false;
			foreach( $template_managers_caps as $template_managers_cap ) {
				if( user_can( $template_manager, $template_managers_cap ) ) { $user_can = true; break; }
			}
			if( $user_can ) { continue; }
		}
		unset( $template_managers[ $i ] );
	}
	
	return apply_filters( 'bookacti_template_managers', $template_managers );
}


/**
 * Sanitize template settings
 * @since 1.9.3 (was bookacti_format_template_settings)
 * @param array $raw_settings
 * @return array
 */
function bookacti_sanitize_template_settings( $raw_settings ) {
	if( empty( $raw_settings ) ) { $raw_settings = array(); }
	
	// Default settings
	$default_settings = apply_filters( 'bookacti_template_default_settings', array(
		'minTime'					=> '00:00',
		'maxTime'					=> '00:00',
		'snapDuration'				=> '00:05'
	) );
	
	$settings = array();
		
	// Check if all templates settings are filled
	foreach( $default_settings as $setting_key => $setting_default_value ){
		if( isset( $raw_settings[ $setting_key ] ) && is_string( $raw_settings[ $setting_key ] ) ){ $raw_settings[ $setting_key ] = stripslashes( $raw_settings[ $setting_key ] ); }
		$settings[ $setting_key ] = isset( $raw_settings[ $setting_key ] ) ? $raw_settings[ $setting_key ] : $setting_default_value;
	}
	
	// Format 24-h times: minTime, maxTime, snapDuration
	if( ! preg_match( '/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $settings[ 'minTime' ] ) )		{ $settings[ 'minTime' ] = $default_settings[ 'minTime' ]; }
	if( ! preg_match( '/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $settings[ 'maxTime' ] ) )		{ $settings[ 'maxTime' ] = $default_settings[ 'maxTime' ]; }
	if( ! preg_match( '/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $settings[ 'snapDuration' ] ) )	{ $settings[ 'snapDuration' ] = $default_settings[ 'snapDuration' ]; }
	
	// If minTime >= maxTime, add one day to maxTime
	if( intval( str_replace( ':', '', $settings[ 'minTime' ] ) ) >= intval( str_replace( ':', '', $settings[ 'maxTime' ] ) ) ) { 
		$settings[ 'maxTime' ] = str_pad( 24 + ( intval( substr( $settings[ 'maxTime' ], 0, 2 ) ) % 24 ), 2, '0', STR_PAD_LEFT ) . substr( $settings[ 'maxTime' ], 2 );
	}
	
	// Make sure snapDuration is not null
	if( $settings[ 'snapDuration' ] === '00:00' ) { $settings[ 'snapDuration' ] = '00:01'; }
	
	return apply_filters( 'bookacti_template_settings_formatted', $settings, $raw_settings, $default_settings );
}


/**
 * Format activity managers
 * @version 1.8.8
 * @param array $activity_managers
 * @return array
 */
function bookacti_format_activity_managers( $activity_managers = array() ) {
	$activity_managers = bookacti_ids_to_array( $activity_managers );
	
	// If user is not super admin, add him automatically in the activity managers list if he isn't already
	$bypass_activity_managers_check = apply_filters( 'bypass_activity_managers_check', false );
	if( ! is_super_admin() && ! $bypass_activity_managers_check ) {
		$user_id = get_current_user_id();
		if( ! in_array( $user_id, $activity_managers, true ) ) {
			$activity_managers[] = $user_id;
		}
	}
	
	// Make sure all users have permission to manage activities
	$activity_managers_caps = array( 'bookacti_edit_bookings', 'bookacti_edit_templates', 'bookacti_read_templates' );
	foreach( $activity_managers as $i => $activity_manager ) {
		if( $activity_manager ) {
			$user_can = false;
			foreach( $activity_managers_caps as $activity_managers_cap ) {
				if( user_can( $activity_manager, $activity_managers_cap ) ) { $user_can = true; break; }
			}
			if( $user_can ) { continue; }
		}
		unset( $activity_managers[ $i ] );
	}
	
	return apply_filters( 'bookacti_activity_managers', $activity_managers );
}


/**
 * Format activity settings
 * @version 1.8.0
 * @param array $activity_settings
 * @return array
 */
function bookacti_format_activity_settings( $activity_settings ) {
	if( empty( $activity_settings ) ) { $activity_settings = array(); }
	
	// Default settings
	$init_default_settings = array(
		'unit_name_singular'		=> '',
		'unit_name_plural'			=> '',
		'show_unit_in_availability'	=> 0,
		'places_number'				=> 0,
		'min_bookings_per_user'		=> 0,
		'max_bookings_per_user'		=> 0,
		'max_users_per_event'		=> 0,
		'booking_changes_deadline'	=> '',
		'allowed_roles'				=> array()
	);
	$default_settings = apply_filters( 'bookacti_activity_default_settings', $init_default_settings );
	
	$settings = array();
	foreach( $default_settings as $setting_key => $setting_default_value ){
		if( isset( $activity_settings[ $setting_key ] ) && is_string( $activity_settings[ $setting_key ] ) ){ $activity_settings[ $setting_key ] = stripslashes( $activity_settings[ $setting_key ] ); }
		$settings[ $setting_key ] = isset( $activity_settings[ $setting_key ] ) ? $activity_settings[ $setting_key ] : $setting_default_value;
	}
	
	// Sanitize by type
	$keys_by_type = array( 
		'str'	=> array( 'unit_name_singular', 'unit_name_plural' ),
		'bool'	=> array( 'show_unit_in_availability' ),
		'int'	=> array( 'places_number', 'min_bookings_per_user', 'max_bookings_per_user', 'max_users_per_event', 'booking_changes_deadline' ),
		'array'	=> array( 'allowed_roles' )
	);
	$settings = bookacti_sanitize_values( $default_settings, $settings, $keys_by_type, array_diff_key( $settings, $init_default_settings ) );
	
	// booking_changes_deadline
	if( is_numeric( $settings[ 'booking_changes_deadline' ] ) && $settings[ 'booking_changes_deadline' ] < 0 ) { $settings[ 'booking_changes_deadline' ] = ''; }
	
	return apply_filters( 'bookacti_activity_settings', $settings, $activity_settings, $default_settings );
}


/**
 * Get event default data
 * @since 1.8.0
 * @version 1.11.0
 */
function bookacti_get_event_default_data() {
	$dt = new DateTime();
	$start = $dt->format( 'Y-m-d H:i:s' );
	$dt->add( new DateInterval( 'PT1H' ) );
	$end = $dt->format( 'Y-m-d H:i:s' );
	return apply_filters( 'bookacti_event_default_data', array(
		'id' => 0,
		'template_id' => 0,
		'activity_id' => 0,
		'title' => esc_html__( 'Event', 'booking-activities' ),
		'start' => $start,
		'end' => $end,
		'availability' => 1,
		'repeat_freq' => 'none',
		'repeat_step' => 1,
		'repeat_on' => '',
		'repeat_from' => '',
		'repeat_to' => '',
		'active' => 1
	));
}

/**
 * Get event default meta
 * @since 1.8.0
 */
function bookacti_get_event_default_meta() {
	return apply_filters( 'bookacti_event_default_meta', array() );
}


/**
 * Get available event repeat periods
 * @since 1.8.0
 * @version 1.11.0
 */
function bookacti_get_event_repeat_periods() {
	return apply_filters( 'bookacti_event_repeat_periods', array( 
		'none' => esc_html__( 'Do not repeat', 'booking-activities' ),
		'daily' => esc_html__( 'Day', 'booking-activities' ),
		'weekly' => esc_html__( 'Week', 'booking-activities' ),
		'monthly' => esc_html__( 'Month', 'booking-activities' )
	) );
}


/**
 * Sanitize event data
 * @since 1.8.0
 * @version 1.11.0
 */
function bookacti_sanitize_event_data( $raw_data ) {
	$default_data = bookacti_get_event_default_data();
	$default_meta = bookacti_get_event_default_meta();
	
	// Sanitize common values
	$keys_by_type = array( 
		'int'		=> array( 'id', 'template_id', 'activity_id', 'availability', 'repeat_step' ),
		'str_html'	=> array( 'title' ),
		'datetime'	=> array( 'start', 'end' ),
		'str_id'	=> array( 'repeat_freq', 'repeat_on' ),
		'date'		=> array( 'repeat_from', 'repeat_to' ),
		'bool'		=> array( 'active' )
	);
	$data = bookacti_sanitize_values( $default_data, $raw_data, $keys_by_type );
	$data[ 'exceptions_dates' ] = ! empty( $raw_data[ 'exceptions_dates' ] ) ? bookacti_sanitize_date_array( $raw_data[ 'exceptions_dates' ] ) : array();
	
	if( ! $data[ 'id' ] && ! empty( $raw_data[ 'event_id' ] ) ) { $data[ 'id' ] = intval( $raw_data[ 'event_id' ] ); }
	
	// Make sure ints are positive
	foreach( $keys_by_type[ 'int' ] as $int ) {
		if( $data[ $int ] < 0 ) { $data[ $int ] = $default_data[ $int ]; }
	}
	
	// Make sure start AND end are set
	if( ! $data[ 'start' ] || ! $data[ 'end' ] ) { 
		$data[ 'start' ] = $default_data[ 'start' ];
		$data[ 'end' ] = $default_data[ 'end' ];
	}
	
	// Make sure start is before end
	$start_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'start' ] );
	$end_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'end' ] );
	if( $start_dt > $end_dt ) {
		$data[ 'start' ] = $end_dt->format( 'Y-m-d H:i:s' );
		$data[ 'end' ] = $start_dt->format( 'Y-m-d H:i:s' );
	}
	else if( $start_dt === $end_dt ) {
		$end_dt->add( new DateInterval( 'PT1H' ) );
		$data[ 'end' ] = $end_dt->format( 'Y-m-d H:i:s' );
	}
	
	// Make sure repeat period exists
	if( ! in_array( $data[ 'repeat_freq' ], array_keys( bookacti_get_event_repeat_periods() ), true ) ) {
		$data[ 'repeat_freq' ] = $default_data[ 'repeat_freq' ];
	}
	
	// Make sure repeat period is consistent
	if( $data[ 'repeat_freq' ] !== 'none' && ( ! $data[ 'repeat_from' ] || ! $data[ 'repeat_to' ] || ! $data[ 'repeat_step' ] ) ) {
		$data[ 'repeat_freq' ] = 'none';
	}
	
	// Sanitize repeat_on according to the repeat_freq
	if( $data[ 'repeat_freq' ] === 'weekly' && $data[ 'repeat_on' ] !== '' ) {
		$repeat_on_array = explode( '_', $data[ 'repeat_on' ] );
		if( array_diff( $repeat_on_array, array( 0, 1, 2, 3, 4, 5, 6 ) ) ) { $data[ 'repeat_on' ] = 'null'; }
	}
	if( $data[ 'repeat_freq' ] === 'monthly' && $data[ 'repeat_on' ] ) {
		if( ! in_array( $data[ 'repeat_on' ], array( 'nth_day_of_month', 'last_day_of_month', 'nth_day_of_week', 'last_day_of_week' ), true ) ) { $data[ 'repeat_on' ] = 'null'; }
	}
	if( $data[ 'repeat_freq' ] === 'daily' ) {
		$data[ 'repeat_on' ] = 'null';
	}
	
	// Check the consistency between the event date and the repeat period
	$data = bookacti_sanitize_event_date_and_repeat_period( $data );
	
	// If the event is repeated
	if( $data[ 'repeat_freq' ] !== 'none' ) {
		// Restrict the repeat period to the actual first and last occurrences
		$bounding_events = bookacti_get_occurrences_of_repeated_event( (object) $data, array( 'exceptions_dates' => $data[ 'exceptions_dates' ], 'past_events' => true, 'bounding_events_only' => true ) );
		if( $bounding_events ) {
			$bounding_events_keys = array_keys( $bounding_events );
			$last_key = end( $bounding_events_keys );
			$first_key = reset( $bounding_events_keys );
			$bounding_dates = array( 
				'start' => substr( $bounding_events[ $first_key ][ 'start' ], 0, 10 ), 
				'end' => substr( $bounding_events[ $last_key ][ 'end' ], 0, 10 )
			);
			
			// Replace repeat period with events bounding dates
			if( strtotime( $bounding_dates[ 'start' ] ) > strtotime( $data[ 'repeat_from' ] ) )	{ $data[ 'repeat_from' ] = $bounding_dates[ 'start' ]; }
			if( strtotime( $bounding_dates[ 'end' ] ) < strtotime( $data[ 'repeat_to' ] ) )		{ $data[ 'repeat_to' ] = $bounding_dates[ 'end' ]; }
			
			// Make the event starts on the first occurrence
			$repeat_from_dt = DateTime::createFromFormat( 'Y-m-d', $data[ 'repeat_from' ] );
			$start_date_dt = DateTime::createFromFormat( 'Y-m-d', substr( $data[ 'start' ], 0, 10 ) );
			$offset_interval = $start_date_dt->diff( $repeat_from_dt );
			$start_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'start' ] );
			$end_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'end' ] );
			$start_dt->add( $offset_interval );
			$end_dt->add( $offset_interval );
			$data[ 'start' ] = $start_dt->format( 'Y-m-d H:i:s' );
			$data[ 'end' ] = $end_dt->format( 'Y-m-d H:i:s' );
			
			// The repeat period may have changed, so, check the consistency again between the event date and the new repeat period
			$data = bookacti_sanitize_event_date_and_repeat_period( $data );
		}
		
		// If the repeat period is only only day, do not repeat the event
		if( $data[ 'repeat_from' ] === $data[ 'repeat_to' ] ) { $data[ 'repeat_freq' ] = 'none'; }
		
		// Remove exceptions out of the repeat period and if they are not on an occurrence
		else if( $data[ 'exceptions_dates' ] ) {
			$repeat_from_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'repeat_from' ] . ' 00:00:00' );
			$repeat_to_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'repeat_to' ] . ' 23:59:59' );
			
			$occurrences = bookacti_get_occurrences_of_repeated_event( (object) $data, array( 'past_events' => true ) );
			foreach( $data[ 'exceptions_dates' ] as $i => $excep_date ) {
				// Remove exceptions out of the repeat period
				$excep_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $excep_date . ' 00:00:00' );
				if( $excep_dt < $repeat_from_dt || $excep_dt > $repeat_to_dt ) {
					unset( $data[ 'exceptions_dates' ][ $i ] );
					continue;
				}
				
				// Remove exception if it is not on an occurrence
				$is_on_occurrence = false;
				foreach( $occurrences as $occurrence ) {
					$occurrence_date = substr( $occurrence[ 'start' ], 0, 10 );
					if( $excep_date === $occurrence_date ) { $is_on_occurrence = true; break; }
				}
				if( ! $is_on_occurrence ) {
					unset( $data[ 'exceptions_dates' ][ $i ] );
				}
			}
		}
	}
	
	// If the event is not repeated, remove all repeat data
	if( $data[ 'repeat_freq' ] === 'none' ) {
		$data[ 'repeat_step' ] = -1;
		$data[ 'repeat_on' ] = 'null';
		$data[ 'repeat_from' ] = 'null';
		$data[ 'repeat_to' ] = 'null';
		$data[ 'exceptions_dates' ] = array();
	} 
	
	return apply_filters( 'bookacti_sanitized_event_data', $data, $raw_data );
}


/**
 * Make sure the event date and its repeat period are consistent
 * @since 1.11.0
 */
function bookacti_sanitize_event_date_and_repeat_period( $data ) {
	if( $data[ 'repeat_freq' ] !== 'none' && $data[ 'repeat_from' ] && $data[ 'repeat_to' ] ) {
		// Make sure repeat from is before repeat to
		$repeat_from_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'repeat_from' ] . ' 00:00:00' );
		$repeat_to_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'repeat_to' ] . ' 23:59:59' );
		if( $repeat_from_dt > $repeat_to_dt ) { 
			$data[ 'repeat_from' ] = $data[ 'repeat_to' ]; 
			$repeat_from_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'repeat_from' ] . ' 00:00:00' );
		}

		// Make sure the event starts in the repeat period (else, set the event date to the repeat_from date)
		$start_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'start' ] );
		if( $start_dt < $repeat_from_dt || $start_dt > $repeat_to_dt ) { 
			$end_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'end' ] );
			$repeat_from_date_dt = DateTime::createFromFormat( 'Y-m-d', $data[ 'repeat_from' ] );
			$start_date_dt = DateTime::createFromFormat( 'Y-m-d', substr( $data[ 'start' ], 0, 10 ) );
			$offset_interval = $start_date_dt->diff( $repeat_from_date_dt );
			$start_dt->add( $offset_interval );
			$end_dt->add( $offset_interval );
			$data[ 'start' ] = $start_dt->format( 'Y-m-d H:i:s' );
			$data[ 'end' ] = $end_dt->format( 'Y-m-d H:i:s' );
		}
	}

	// Check if the monthly repetition type is valid
	if( $data[ 'repeat_freq' ] === 'monthly' && $data[ 'repeat_on' ] ) {
		$start_dt = DateTime::createFromFormat( 'Y-m-d H:i:s', $data[ 'start' ] );
		$nth_in_month = intval( $start_dt->format( 'j' ) );
		$days_in_month = intval( $start_dt->format( 't' ) );
		if( $data[ 'repeat_on' ] === 'last_day_of_month' && $nth_in_month !== $days_in_month )		{ $data[ 'repeat_on' ] = 'nth_day_of_month'; }
		if( $data[ 'repeat_on' ] === 'last_day_of_week' && $nth_in_month < ( $days_in_month - 6 ) )	{ $data[ 'repeat_on' ] = 'nth_day_of_week'; }
	}
	
	return $data;
}


/**
 * Validate event data
 * @since 1.8.0 (was bookacti_validate_event)
 * @version 1.11.0
 * @param array $data
 * @return array
 */
function bookacti_validate_event_data( $data ) {
	// Get info required
	$min_avail		= bookacti_get_min_availability( $data[ 'id' ] );
	$min_period		= bookacti_get_min_period( $data[ 'id' ] );
	
	$utc_timezone	= new DateTimeZone( 'UTC' );
	$repeat_from_dt	= bookacti_sanitize_date( $data[ 'repeat_from' ] ) ? new DateTime( bookacti_sanitize_date( $data[ 'repeat_from' ] ), $utc_timezone ) : 0;
	$repeat_to_dt	= bookacti_sanitize_date( $data[ 'repeat_to' ] ) ? new DateTime( bookacti_sanitize_date( $data[ 'repeat_to' ] ), $utc_timezone ) : 0;
	$max_from_dt	= $min_period ? new DateTime( $min_period[ 'from' ], $utc_timezone ) : 0;
	$min_to_dt		= $min_period ? new DateTime( $min_period[ 'to' ], $utc_timezone ) : 0;
	
	// Init var to check with worst case
	$isAvailSupToBookings			= $min_avail ? false : true;
	$isRepeatPeriodBoundingBookings	= $min_period && $data[ 'repeat_freq' ] !== 'none' ? false : true;

	// Make the tests
	if( ! $isAvailSupToBookings ) {
		if( intval( $data[ 'availability' ] ) >= intval( $min_avail ) ) { $isAvailSupToBookings = true; }
	}
	if( ! $isRepeatPeriodBoundingBookings && $repeat_from_dt && $repeat_to_dt && $max_from_dt && $min_to_dt ) {
		if( $repeat_from_dt <= $max_from_dt && $repeat_to_dt >= $min_to_dt ) { $isRepeatPeriodBoundingBookings = true; }
	}
	
	// Return feedbacks
	$return_array = array(
		'status' => 'success',
		'errors' => array(),
		'message' => ''
	);
	if( ! $isAvailSupToBookings ){
		$return_array[ 'status' ] = 'failed';
		$return_array[ 'min_availability' ] = $min_avail;
		$return_array[ 'errors' ][] = 'error_less_avail_than_bookings';
		$return_array[ 'message' ] = esc_html__( 'You can\'t set less available bookings than it has already on one of the occurrence of this event.', 'booking-activities' );
	}
	if( ! $isRepeatPeriodBoundingBookings ){
		$return_array[ 'status' ] = 'failed';
		$date_format = get_option( 'date_format' );
		$return_array[ 'from' ] = $max_from_dt ? $max_from_dt->format( 'Y-m-d' ) : '';
		$return_array[ 'to' ] = $min_to_dt ? $min_to_dt->format( 'Y-m-d' ) : '';
		$max_from_formatted = $max_from_dt ? apply_filters( 'date_i18n', wp_date( $date_format, $max_from_dt->getTimestamp(), $utc_timezone ), $date_format, $max_from_dt->getTimestamp(), false ) : '';
		$min_to_formatted = $min_to_dt ? apply_filters( 'date_i18n', wp_date( $date_format, $min_to_dt->getTimestamp(), $utc_timezone ), $date_format, $min_to_dt->getTimestamp(), false ) : '';
		$return_array[ 'errors' ][] = 'error_booked_events_out_of_period';
		if( $return_array[ 'message' ] ) { $return_array[ 'message' ] .= '</li><li>'; }
		/* translators: %1$s and %2$s are formatted dates */
		$return_array[ 'message' ] .= sprintf( esc_html__( 'The repetition period must include all booked occurrences (from %1$s to %2$s).', 'booking-activities' ), $max_from_formatted, $min_to_formatted );
	}

	return apply_filters( 'bookacti_validate_event', $return_array, $data ) ;
}



// GROUPS OF EVENTS

/**
 * Validate group of events data input
 * 
 * @since 1.1.0
 * 
 * @param string $group_title
 * @param int $category_id
 * @param string $category_title
 * @param array $events
 * @return array
 */
function bookacti_validate_group_of_events_data( $group_title, $category_id, $category_title, $events ) {
	
	//Init var to check with worst case
	$is_title			= false;
	$is_category		= false;
	$is_category_title	= false;
	$is_events			= false;
	
	//Make the tests to validate the var
	if( is_string( $group_title ) && $group_title !== '' )		{ $is_title = true; }
	if( is_numeric( $category_id ) )							{ $is_category = true; }
	if( is_string( $category_title ) && $category_title !== '' ){ $is_category_title = true; }
	if( is_array( $events ) && count( $events ) >= 2 )			{ $is_events = true; }
	
	$return_array = array();
	$return_array['status'] = 'valid';
	$return_array['errors'] = array();
	if( ! $is_title ) {
		$return_array['status'] = 'not_valid';
		$return_array['errors'][] = 'error_missing_title';
	}
	if( ! $is_category && ! $is_category_title ) {
		$return_array['status'] = 'not_valid';
		$return_array['errors'][] = 'error_missing_title';
	}
	if( ! $is_events ) {
		$return_array['status'] = 'not_valid';
		$return_array['errors'][] = 'error_select_at_least_two_events';
	}
	
	return apply_filters( 'bookacti_validate_group_of_events_data', $return_array, $group_title, $category_id, $category_title, $events );
}


/**
 * Format group of events data or apply default value
 * 
 * @since 1.1.0
 * @version 1.7.17
 * @param array $group_settings
 * @return array
 */
function bookacti_format_group_of_events_settings( $group_settings ) {
	if( empty( $group_settings ) ) { $group_settings = array(); }
	
	// Default settings
	$default_settings = apply_filters( 'bookacti_group_of_events_default_settings', array() );
	
	$settings = array();
		
	// Check if all templates settings are filled
	foreach( $default_settings as $setting_key => $setting_default_value ){
		if( isset( $group_settings[ $setting_key ] ) && is_string( $group_settings[ $setting_key ] ) ){ $group_settings[ $setting_key ] = stripslashes( $group_settings[ $setting_key ] ); }
		$settings[ $setting_key ] = isset( $group_settings[ $setting_key ] ) ? $group_settings[ $setting_key ] : $setting_default_value;
	}
	
	return apply_filters( 'bookacti_group_of_events_settings', $settings, $group_settings, $default_settings );
}




// GROUP CATEGORIES

/**
 * Validate group activity data input
 * 
 * @since 1.1.0
 * 
 * @param string $title
 * @return array
 */
function bookacti_validate_group_category_data( $title ) {
	
	//Init var to check with worst case
	$is_title	= false;
	
	//Make the tests to validate the var
	if( ! empty( $title ) )	{ $is_title = true; }

	$return_array = array();
	$return_array['status'] = 'valid';
	$return_array['errors'] = array();
	if( ! $is_title ) {
		$return_array['status'] = 'not_valid';
		$return_array['errors'][] = 'error_missing_title';
	}
	
	return apply_filters( 'bookacti_validate_group_activity_data', $return_array, $title );
}


/**
 * Format group category data or apply default value
 * @since 1.1.0
 * @version 1.8.0
 * @param array $category_settings
 * @return array
 */
function bookacti_format_group_category_settings( $category_settings ) {
	if( empty( $category_settings ) ) { $category_settings = array(); }
	
	// Default settings
	$init_default_settings = array( 
		'min_bookings_per_user'		=> 0,
		'max_bookings_per_user'		=> 0,
		'max_users_per_event'		=> 0,
		'booking_changes_deadline'	=> '',
		'started_groups_bookable'	=> -1,
		'allowed_roles'				=> array()
	);
	$default_settings = apply_filters( 'bookacti_group_category_default_settings', $init_default_settings );
	
	$settings = array();
		
	// Check if all templates settings are filled
	foreach( $default_settings as $setting_key => $setting_default_value ){
		if( isset( $category_settings[ $setting_key ] ) && is_string( $category_settings[ $setting_key ] ) ){ $category_settings[ $setting_key ] = stripslashes( $category_settings[ $setting_key ] ); }
		$settings[ $setting_key ] = isset( $category_settings[ $setting_key ] ) ? $category_settings[ $setting_key ] : $setting_default_value;
	}
	
	// Sanitize by type
	$keys_by_type = array( 
		'int'	=> array( 'min_bookings_per_user', 'max_bookings_per_user', 'max_users_per_event', 'booking_changes_deadline', 'started_groups_bookable' ),
		'array'	=> array( 'allowed_roles' )
	);
	$settings = bookacti_sanitize_values( $default_settings, $settings, $keys_by_type, array_diff_key( $settings, $init_default_settings ) );
	
	// booking_changes_deadline
	if( is_numeric( $settings[ 'booking_changes_deadline' ] ) && $settings[ 'booking_changes_deadline' ] < 0 ) { $settings[ 'booking_changes_deadline' ] = ''; }
		
	// started_groups_bookable
	if( $settings[ 'started_groups_bookable' ] > 1 || $settings[ 'started_groups_bookable' ] < -1 ) { $settings[ 'started_groups_bookable' ] = $default_settings[ 'started_groups_bookable' ]; }
	
	return apply_filters( 'bookacti_group_category_settings', $settings, $category_settings, $default_settings );
}