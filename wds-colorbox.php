<?php
/*
Plugin Name: WDS ColorBox include
Plugin URI: http://plugins.webdevstudios.com/
Description: Includes ColorBox (http://www.jacklmoore.com/colorbox) for use in WordPress
Author: WebdevStudios LLC
Author URI: http://webdevstudios.com
Version: 1.0
*/

class WDSColorBox {

	private $plugin_name = 'WDS ColorBox';

	function __construct() {

		define( 'WDSCOLORBOX_PATH', plugin_dir_path( __FILE__ ) );
		define( 'WDSCOLORBOX_URL', plugins_url('/', __FILE__ ) );

		add_action( 'init', array( &$this, 'register_scripts_styles' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue' ) );
		add_action('wp_print_footer_scripts', 'colorbox_script');

	}

	private function register_scripts_styles() {
		wp_register_script( 'colorbox', DWSNIPPET_URL .'js/colorbox.js', array('jquery'), '1.0' );
		// wp_register_style( 'prettify', DWSNIPPET_URL .'lib/css/prettify.css', null, '1.0' );

	}

	private function enqueue() {
		wp_enqueue_script( 'colorbox' );
		// wp_enqueue_style( 'prettify' );
		// wp_enqueue_style( 'prettify-plus' );
	}

	private function colorbox_script() {
		if ( is_admin() )
			return;
	?>
		<script type="text/javascript">
		// jQuery(document).ready(function($) {
		// 	$('a[rel*=facebox]').facebox({
		// 		loadingImage   : '<?php echo plugins_url('/images/loading.gif', __FILE__ ); ?>',
		// 		// closeImage     : '<?php echo plugins_url('/images/closelabel.png', __FILE__ ); ?>'
		// 		closeImage     : '<?php echo plugins_url('/images/wds_ph_closelabel.png', __FILE__ ); ?>'
		// 	})
		// })
		</script>
	<?php
	}


}

new WDSColorBox;

?>