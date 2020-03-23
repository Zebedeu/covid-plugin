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
 		<div id='count-tracking' style='display:none;'>
 			<ul>
	 			<li>CONFIRMADOS : <span class='number'><?php echo $value->confirmed; ?></span></li>
	 			<li> SUSPEITOS :  <span class='number'><?php echo $value->deaths;?> </span></li>
	 			<li>RECUPERADOS :  <span class='number'><?php echo $value->recovered; ?></span></li>
	 			<li class="ultima-atualizacao"> Ultima atualização <?php echo $date->format('d/m/Y H:i');?></li>
	 		</ul>
 	<?php }

}
add_action( 'covid_tracking_hook', 'covid_tracking');


