<?php



/**
 * Enqueue Styles
 *
 * @param string $handle Style name
 * @param string $src Style url
 * @param array $deps (optional) Array of style names on which this style depends
 * @param string|bool $ver (optional) Style version (used for cache busting), set to null to disable
 * @param bool $header (optional) Whether to enqueue the style before </head> or before </body>
 */
function covid_style() {
		wp_enqueue_style( 'covid-main', PLUGIN_URL . 'covid/assets/css/main.css', array(  ), false, 'all' );
}
add_action( 'wp_head', 'covid_style' );

/**
 * Enqueue scripts
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 */

function covid_scripts() {
	wp_enqueue_script( 'covid-main', PLUGIN_URL . 'covid/assets/js/main.js', array( 'jquery' ), false, true );
}

add_action( 'wp_head', 'covid_scripts' );

function shapeSpace_print_scripts() { 
	
	?>
	
	<script>
		var assetsCovid = <?php echo json_encode( PLUGIN_URL . "covid/assets/" ) ; ?>;
	</script>
	
	<?php
	
}
add_action('wp_print_scripts', 'shapeSpace_print_scripts');