<?php

function covid_tracking()
{
	$request = wp_remote_get('https://coronavirus-tracker-api.herokuapp.com/v2/locations?country_code=AO');
	
	if( is_wp_error( $request ) ) {
	return false; // Bail early
	}

$body = wp_remote_retrieve_body( $request );

 	$result = json_decode($body);

 if(! is_array($result->locations) || empty($result->locations)){
 	return false;
 }
foreach ($result->locations as $key => $value) {
                
                $data_last_updated 	=$value->last_updated;
                $data_confirmed 	= $value->latest->confirmed;
                $data_deaths 		= $value->latest->deaths;
                $data_recovered 	= $value->latest->recovered;
                $date = new \DateTime($data_last_updated);

        ?>
        <div id='count-tracking' style='display:none;'>
            <ul>
                <li>CONFIRMADOS : <span class='number'><?php echo $data_confirmed; ?></span></li>
                <li> SUSPEITOS :  <span class='number'><?php echo $data_deaths;?> </span></li>
                <li>RECUPERADOS :  <span class='number'><?php echo $data_recovered; ?></span></li>
                <li class="last-updated"> Ultima actualização <?php echo $date->format('d/m/Y H:i');?></li>
            </ul>
            <?php

     }

}
add_action( 'covid_tracking_hook', 'covid_tracking');


