<?php

//GET LOCATION
function event_location(){
    $eventLocation = get_field("event_location");
    $eventAddress = $eventLocation['address'];

    return "$eventAddress";
}
add_shortcode('event-location', 'event_location');

//GET EVENT DATE
function event_date(){
	// get raw date
	$eventDate = get_field('event_start_date', false, false);


	// make date object
	$eventDate = new DateTime($eventDate);

	//store formated date as a variable
	$formatDate = $eventDate->format('D, jS M');

	
	return "$formatDate";
}
add_shortcode('event-date', 'event_date');

//ADD TO CAL LINK
function add_to_cal(){
	$startDate = get_field('event_start_date');
	$startTime = get_field('event_start_time');
	$endDate = get_field('event_end_date');
	$endTime = get_field('event_end_time');
	$eventTitle = get_the_title();
	$eventBlurb = get_the_excerpt();
	$eventLocation = get_field("event_location");
    $eventAddress = $eventLocation['address'];

    return '<span class="addtocalendar atc-style-blue">
		        <var class="atc_event">
		            <var class="atc_date_start">'."$startDate $startTime".'</var>
		            <var class="atc_date_end">'."$endDate $endTime".'</var>
		            <var class="atc_timezone">Europe/Dublin</var>
		            <var class="atc_title">'."$eventTitle".'</var>
		            <var class="atc_description">'."$eventBlurb".'</var>
		            <var class="atc_location">'."$eventAddress".'</var>
		            <var class="atc_organizer">CRAOL</var>
		            <var class="atc_organizer_email">info@craol.ie</var>
		        </var>
		    </span>';
}
add_shortcode('add-to-cal', 'add_to_cal');

//REPLACE BG IMAGE ON SINGLE EVENT
	function event_featured_image(){
		$eventImage = get_the_post_thumbnail_url(); 
			echo "<script>jQuery('.et_parallax_bg').css('background-image', 'url({$eventImage})');</script>";	
				
	}
	add_action( 'wp_footer', 'event_featured_image' );

function event_map(){
    $eventLocation = get_field('event_location');
    $locationLat = $eventLocation['lat'];
    $locationLng = $eventLocation['lng'];
    $eventAddress = $eventLocation['address'];
 
   
    //echo '<div class="acf-map"><div class="marker" data-lat="53.2778905" data-lng="-9.0419142"></div></div>';
    return '<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q='."{$eventAddress}".'&key=AIzaSyA1oXI8EynVbFrt8VA8FZ7T30HtG0S9NiM" allowfullscreen></iframe>';
    
}
add_shortcode ('event-map', 'event_map');