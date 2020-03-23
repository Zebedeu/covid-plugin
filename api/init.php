<?php

function covid_tracking()
{
	$request = wp_remote_get('https://wuhan-coronavirus-api.laeyoung.endpoint.ainize.ai/jhu-edu/latest?iso2=AO');
	
	if( is_wp_error( $request ) ) {
	return false; // Bail early
	}

$body = wp_remote_retrieve_body( $request );

 	$result = json_decode($body);

 if(! is_array($result) || empty($result)){
 	return false;
 }
 	foreach ($result as $key => $value) {
 		$date = new DateTime($value->lastupdate);
 		echo  "<div id='count-tracking' style='display:none'><li>CONFIRMADOS : <span class='time'>". $value->confirmed . "</span></li><li> SUSPEITOS :  <span class='time'>". $value->deaths . "</span></li><li>RECUPERADOS :  <span class='time'>". $value->recovered . "</span></li><li> Ultima atualização <span class='time'>". $date->format('Y-m-d H:i:s') . "</span></li>";
 	}

}
add_action( 'covid_tracking_hook', 'covid_tracking');


