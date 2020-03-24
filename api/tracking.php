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
 		?>
 		<div id='count-tracking' style='display:inline;'>
 			<ul>
	 			<li>CONFIRMADOS : <span class='time'><?php echo $value->confirmed; ?></span></li>
	 			<li> SUSPEITOS :  <span class='time'><?php echo $value->deaths;?> </span></li>
	 			<li>RECUPERADOS :  <span class='time'><?php echo $value->recovered; ?></span></li>
	 			<li> Ultima atualização <span class='time'><?php echo $date->format('Y-m-d H:i:s');?></span></li>
	 		</ul>
 	<?php }

}
add_action( 'covid_tracking_hook', 'covid_tracking');


