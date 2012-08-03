<?php
/*
Plugin Name: Facebox Highlight
Plugin URI: http://plugins.webdevstudios.com/
Description: Facebox Highlight is a WordPress wrapper for "<a href="http://defunkt.io/facebox/" target="_blank">Facebox</a>" - a jQuery-based, Facebook-style lightbox which can display images, divs, or entire remote pages. This plugin differs from the other Facebox clones in that it does NOT convert all images to facebox. The only way to get the facebox popup is to link to content using the "facebox" rel tag. (see <a href="http://defunkt.io/facebox/" target="_blank">http://defunkt.io/facebox</a>)
Author: WebdevStudios LLC
Author URI: http://webdevstudios.com
Version: 1.0
*/

// Enqueue Styles
add_action('wp_enqueue_scripts', 'wds_fahi_styles');
function wds_fahi_styles() { 
	if ( is_admin() )
		return;
	wp_enqueue_style('fahi-css', plugins_url('/css/fahi.css', __FILE__));
}

// Paging Dr. Jquery
add_action('wp_print_scripts', 'wds_fahi_jquery');
function wds_fahi_jquery() {
	wp_enqueue_scripts('jquery');
}

// Enqueue Script
add_action('wp_print_scripts', 'wds_fahi_script');
function wds_fahi_script() { 
	if ( is_admin() )
		return;
   wp_enqueue_script('fahi-js', plugins_url('/js/fahi.js', __FILE__ ), array('jquery'), '1.0' );
}

// Add js links to plugin images & initialize Facebox
add_action('wp_print_footer_scripts', 'wds_fahi_head_script');
function wds_fahi_head_script() {
	if ( is_admin() )
		return; 
?>
	<script type="text/javascript"> 
	jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
			loadingImage   : '<?php echo plugins_url('/images/loading.gif', __FILE__ ); ?>',
			// closeImage     : '<?php echo plugins_url('/images/closelabel.png', __FILE__ ); ?>'
			closeImage     : '<?php echo plugins_url('/images/wds_ph_closelabel.png', __FILE__ ); ?>'
		})
	})
	</script> 
<?php 
}

?>