<?php 
function bnfs_load_twentythirteen_javascript() {
	wp_enqueue_script(
			'theme_js',
			plugins_url( 'js/twentythirteen.js',(__FILE__)),
			array( 'jquery' )
	);
}
function bnfs_check_theme() {
	$theme_1 = get_option('theme');

	switch($theme_1) {
		// Zerif (Do nothing)
		case 'zerif':
			break;
		// Twenty Thirteen
		case '213':
			add_action( 'init', 'bnfs_load_twentythirteen_javascript' );
			break;
		// Twenty Fifteen
		case '215':
			add_action( 'init', 'bnfs_load_twentythirteen_javascript' );
			break;
		// Twenty Fourteen
		case '213':
			add_action( 'init', 'bnfs_load_twentythirteen_javascript' );
			break;
		// Default (Do nothing)
		case 'default':
			break;
	}

}
add_action ('plugins_loaded', 'bnfs_check_theme');
?>