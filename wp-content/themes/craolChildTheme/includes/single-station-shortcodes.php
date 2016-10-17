<?PHP
// Add station link shortcode
function station_link() {
    $stationURL = get_field( "website" );
    return "<a href='http://$stationURL' target='_blank'>$stationURL</a>";
}
add_shortcode( 'station-link', 'station_link' );

// Add station contact number shortcode
function station_phone() {
    $stationPhone = get_field( "contact_number" );
    return "<a href='callto://$stationPhone' target='_blank'>$stationPhone</a>";
}
add_shortcode( 'station-phone', 'station_phone' );

// Add station email shortcode
function station_email() {
    $stationEmail = get_field( "station_email" );
    return "<a href='mailto://$stationEmail' target='_blank'>$stationEmail</a>";
}
add_shortcode( 'station-email', 'station_email' );

//add social media links shortcode
function station_social_links(){
    $facebookURL = get_field("facebook");
    $twitterURL = get_field("twitter");

    return '<ul class="et_pb_social_media_follow et_pb_module et_pb_bg_layout_dark  et_pb_social_media_follow_0 clearfix">'
                ."<?php if( '{$facebookURL}' ): ?>".
                    '<li class="et_pb_social_icon et_pb_social_network_link et-social-facebook et_pb_social_media_follow_network_0">
                        <a href="'."{$facebookURL}".'" class="icon rounded_rectangle" title="facebook" target="_blank" style="background-color: #ffffff;"><span>facebook</span></a>
                    </li>
                <?php endif; ?>'
                
                ."<?php if( {$twitterURL} ): ?>".
                    '<li class="et_pb_social_icon et_pb_social_network_link et-social-twitter et_pb_social_media_follow_network_1">
                        <a href="'."{$twitterURL}".'" class="icon rounded_rectangle" title="Twitter" target="_blank" style="background-color: #00aced;"><span>Twitter</span></a>
                    </li>
                <?php endif; ?>

            </ul>';
}
add_shortcode('social-links', 'station_social_links');

function station_address(){
    $stationAddress = get_field("location");
    $stationLat = $stationAddress['address'];

    return "$stationLat";
}
add_shortcode('station-address', 'station_address');

function single_station_map(){
    $location = get_field('location');
    $locationLat = $location['lat'];
    $locationLng = $location['lng'];
    $stationMapAddress = $location['address'];
    return '<iframe width="100%" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q='."{$stationMapAddress}".'&key=AIzaSyA1oXI8EynVbFrt8VA8FZ7T30HtG0S9NiM" allowfullscreen></iframe>';
    
}
add_shortcode ('single-station-map', 'single_station_map');