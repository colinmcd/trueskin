<?php
/**
 * true Theme Customizer
 *
 * @package true
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function true_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'true_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function true_customize_preview_js() {
	wp_enqueue_script( 'true_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'true_customize_preview_js' );


/**
 * Remove wordpress admin bar when logged in.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Add Dashboard widget
 */
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );

/**
 * Register Dashboard widget
 */
function add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'settings', 'dashboard_widget_function');
}

function dashboard_widget_function() {
	
	echo '<style>
	.bo-tools a { font-size:16px; }
	.bo-tools { margin:0 auto; }
	</style>
	<h1 align="center">True!</h1>
		
	<table width="" class="bo-tools">
	
	<tr>
		<td align="center" colspan="3"> 
		<h1></h1>
			<a href="nav-menus.php?lang=he"><img src="http://netu.co.il/base/keychain-access.png" /></a>
			<p>
				<a href="nav-menus.php?lang=he" tabindex="1">Edit Menus</a><br/>
				<a href="themes.php?page=ot-theme-options">Theme Options</a>
			</p>
			
		</td>
	</tr>
	</table>';

}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('Box (%d)', 'Box (%d)', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
}


// Filter wp_nav_menu() to add additional links and other output
function new_nav_menu_items($items) {
	global $woocommerce;

	// $items = $items."<a class='cart-contents' href='". $woocommerce->cart->get_cart_url() ."' title='". _e('View your shopping cart', 'woothemes')."'>". sprintf(_n('Cart (%d)', 'Cart (%d)', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count)." - ". $woocommerce->cart->get_cart_total() ."</a>";
	$items = $items."<li class='cart'><a class='cart-contents' href='". $woocommerce->cart->get_cart_url() ."' title='". __('View your shopping cart', 'woothemes')."'>". sprintf(_n('Box (%d)', 'Box (%d)', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count)."</a></li>";
	return $items;


}
add_filter( 'wp_list_pages', 'new_nav_menu_items' );
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );

// Remove Option Tree Settings Menu

// add_filter( 'ot_show_pages', '__return_false' );