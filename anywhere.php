<?php
/*
 * Plugin Name: Anywhere
 * Plugin URI: http://austinpassy.com//wordpress-plugins/anywhere
 * Description: Adds twitter <a href="http://dev.twitter.com/anywhere">@anywhere</a> javascript code to your blog. Built by <a href="http://twitter.com/thefrosty">@TheFrosty</a>.
 * Version: 0.3.4
 * Author: Austin Passy
 * Author URI: http://frostywebdesigns.com
 *
 * @copyright 2010
 * @author Austin Passy
 * @link http://frostywebdesigns.com/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package Anywhere
 */

/**
 * Version 3.0 checker
 * @since 0.1
 */
 	global $wp_db_version;
	$version = 'false';
	if ( $wp_db_version > 13000 ) {
		$version = 'true'; //Version 3.0 or greater!
	}

/**
 * Make sure we get the correct directory.
 * @since 0.1
 */
	if ( !defined( 'WP_CONTENT_URL' ) )
		define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
	if ( !defined( 'WP_CONTENT_DIR' ) )
		define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	if ( !defined( 'WP_PLUGIN_URL' ) )
		define('WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	if ( !defined( 'WP_PLUGIN_DIR' ) )
		define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
 * Define constant paths to the plugin folder.
 * @since 0.1
 */
	define( ANYWHERE, WP_PLUGIN_DIR . '/anywhere' );
	define( ANYWHERE_URL, WP_PLUGIN_URL . '/anywhere' );
	
	define( ANYWHERE_ADMIN, WP_PLUGIN_DIR . '/anywhere/library/admin' );
	define( ANYWHERE_INCLUDES, WP_PLUGIN_DIR . '/anywhere/library/includes' );
	define( ANYWHERE_CSS, WP_PLUGIN_URL . '/anywhere/library/css' );
	define( ANYWHERE_JS, WP_PLUGIN_URL . '/anywhere/library/js' );

/**
 * Add the settings page to the admin menu.
 * @since 0.1
 */
	add_action( 'init', 'anywhere_admin_warnings' );
	add_action( 'admin_init', 'anywhere_admin_init' );
	add_action( 'admin_menu', 'anywhere_add_pages' );
	add_action( 'wp_print_scripts', 'anywhere_script' );
	add_action( 'wp_head', 'anywhere_options' );
	add_action( 'wp_head', 'anywhere_tweet_box' );

/**
 * Filters.
 * @since 0.1
 */	
	add_filter( 'plugin_action_links', 'anywhere_plugin_actions', 10, 2 ); //Add a settings page to the plugin menu
	add_filter( 'the_content', 'anywhere_tweet_box_div' );

/**
 * Load the admin files.
 * @since 0.1
 */
	if ( is_admin() ) :
		require_once( ANYWHERE_ADMIN . '/settings-admin.php' );
		require_once( ANYWHERE_ADMIN . '/dashboard.php' );
	endif;

/**
 * Load external files
 */
	require_once( ANYWHERE_INCLUDES . '/shortcodes.php' );

/**
 * Load the settings from the database.
 * @since 0.1
 */
	$anywhere = get_option( 'anywhere_settings' );

 /**
 * Load the stylesheet
 * @since 0.1
 */   
function anywhere_admin_init() {
	wp_register_style( 'anywhere-tabs', ANYWHERE_CSS . '/tabs.css' );
	wp_register_style( 'anywhere-admin', ANYWHERE_CSS . '/anywhere-admin.css' );
}

/**
 * Function to add the settings page
 * @since 0.1
 */
function anywhere_add_pages() {
	if ( function_exists( 'add_options_page' ) ) 
		$page = add_options_page( 'Anywhere Settings', '@Anywhere', 10, 'anywhere.php', anywhere_page );
			add_action( 'admin_print_styles-' . $page, 'anywhere_admin_style' );
			add_action( 'admin_print_scripts-' . $page, 'anywhere_admin_script' );
}

/**
 * Function to add the style to the settings page
 * @since 0.1
 */
function anywhere_admin_style() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'anywhere-tabs' );
	wp_enqueue_style( 'anywhere-admin' );
}

/**
 * Function to add the script to the settings page
 * @since 0.1
 */
function anywhere_admin_script() {
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_script( 'theme-preview' );
	wp_enqueue_script( 'anywhere-admin', ANYWHERE_JS . '/anywhere.js', array( 'jquery' ), '0.1', false );
}

/**
 * Adds the @anywhere script
 * @since 0.1
 */
function anywhere_script() {
	global $anywhere;
	$api = $anywhere['api'];
	$v = $anywhere['version'];
	
	if ( $api != '' && !is_admin() && is_singular() )
		wp_enqueue_script( 'anywhere', 'http://platform.twitter.com/anywhere.js?id=' . $api . '&amp;v=' . $v . '', false, $v, false );
}

/**
 * Adds @anywhere options
 * @since 0.1
 */
function anywhere_options() {
	global $anywhere;
	$api = $anywhere['api'];
	$users = $anywhere['linkifyusers'];
	$cards = $anywhere['hovercards'];
	if ( ( $api != '' && ( $users != false || $cards != false ) ) && is_singular() ) : ?>
<!-- @anywhere by Austin Passy of Frosty Web Designs -->
<script type="text/javascript">
twttr.anywhere(onAnywhereLoad);
	function onAnywhereLoad(twitter) {
		// configure the @anywhere environment
		<?php if ( $users != false ) echo 'twitter.linkifyUsers();' . "\n"; ?>
		<?php if ( $cards != false ) echo 'twitter.hovercards();' . "\n"; ?>
	};
</script>
<!-- /anywhere -->
<?php endif;
}

/**
 * Adds @anywhere tweetbox
 * @since 0.1.1
 */
function anywhere_tweet_box() {
	global $post, $anywhere;
	
	$v = $anywhere['version'];
	$box = $anywhere['tweetbox'];
	$label = $anywhere['tweetbox_label'];
	$usebox = $anywhere['use_tweetbox_content'];
	$tcontent = $anywhere['tweetbox_content'];
	$via = $anywhere['twitter_handle'];
	$height = $anywhere['tweetbox_height'];
	$width = $anywhere['tweetbox_width'];
	
	if ( ( $box != false ) && is_singular() ) : ?>
<!-- @anywhere tweetbox by Austin Passy of Frosty Web Designs -->
<script type="text/javascript">
twttr.anywhere("<?php echo $v; ?>", function (twitter) {
	twitter("#tweetbox").tweetBox({
		<?php if ( $usebox != false && $tcontent != '' ) echo 'defaultContent: "' . esc_html( do_shortcode( $tcontent ) ) . '",' . "\n"; 
		else echo 'defaultContent: "' . esc_html( get_the_title() ) . ' ' . esc_url( do_shortcode( '[anywhere-link]' ) ) . ' /via ' . esc_attr( $via ) . '",' . "\n";
		if ( $label != '' ) echo 'label: "' . esc_attr( $label ). '",' . "\n";
		if ( $height != '' ) echo 'height: "' . esc_attr( $height ) . '",' . "\n";
		if ( $width != '' ) echo 'width: "' . esc_attr( $width ) . '",' . "\n"; ?>
	});
});
</script>
<!-- /anywhere -->
<?php endif;
}

/**
 * filter @anywhere tweetbox into the content
 * @since 0.1.1
 */
function anywhere_tweet_box_div($content) {
	global $anywhere;
	$box = $anywhere['tweetbox'];
	$placement = $anywhere['tweetbox_placement'];
	$author = $anywhere['author'];
	
	if ( $author != false )
		$ll = '<span id="anywhere-author" style="display:inline-block;margin:0 0 20px;font-size:80%"><a href="http://austinpassy.com/wordpress-plugins/anywhere" title="@Anywhere WordPress plugin">@Anywhere</a> plugin made by <a href="http://twitter.com/thefrosty" title="Austin Passy on twitter" class="twitter-anywhere-user">@TheFrosty</a></span>'; 
	else 
		$ll = false;
	
	if ( $box != false ) :
		$tb = '<div id="tweetbox-wrapper"><div id="tweetbox"></div>'.$ll.'</div>';
		if ( is_singular() && !is_page() ) :
			if ( $placement == 'before' )
				return $tb.$content;
			elseif ( $placement == 'after' )
				return $content.$tb;
			elseif ( $placement == 'manual' )
				return $content;
			else 
				return $content;
		else :
			return $content;
		endif;
	else :
		return $content;
	endif;
}

/**
 * RSS Feed
 * @since 0.1
 * @package Admin
 */
if ( !function_exists( 'thefrosty_network_feed' ) ) {
	function thefrosty_network_feed( $attr, $count ) {		
		global $wpdb;
		
		include_once( ABSPATH . WPINC . '/class-simplepie.php' );
		$feed = new SimplePie();
		$feed->set_feed_url( $attr );
		$feed->enable_cache( false );
		$feed->init();
		$feed->handle_content_type();
		//$feed->set_cache_location( 'cache' );

		$items = $feed->get_item();
		echo '<div class="t' . $count . ' tab-content postbox open feed">';		
		echo '<ul>';		
		if ( empty( $items ) ) { 
			echo '<li>No items</li>';		
		} else {
			foreach( $feed->get_items( 0, 3 ) as $item ) : ?>		
				<li>		
					<a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $item->get_description(); ?>'><?php echo $item->get_title(); ?></a><br /> 		
					<span style="font-size:10px; color:#aaa;"><?php echo $item->get_date('F, jS Y | g:i a'); ?></span>		
				</li>		
			<?php endforeach;
		}
		echo '</ul>';		
		echo '</div>';
	}
}

/**
 * Plugin Action /Settings on plugins page
 * @since 0.1
 * @package plugin
 */
function anywhere_plugin_actions( $links, $file ) {
 	if( $file == 'anywhere/anywhere.php' && function_exists( "admin_url" ) ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=anywhere.php' ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}

/**
 * Warnings
 * @since 0.1
 * @package admin
 */
function anywhere_admin_warnings() {
	global $anywhere;
		
		function anywhere_warning() {
			global $anywhere;

			if ( $anywhere['api'] == '' )
				echo '<div id="anywhere-warning" class="updated fade"><p><strong>@anywhere plugin is not configured yet.</strong> It will not load until you enter your <a href="' . admin_url( 'options-general.php?page=anywhere.php' ) . '">api</a>.</p></div>';
		}

		add_action( 'admin_notices', 'anywhere_warning' );
		
		/*
		function anywhere_wrong_settings() {
			global $anywhere;

			if ( $anywhere[ 'hide_ad' ] != false )
				echo '<div id="anywhere-warning" class="updated fade"><p><strong>You&prime;ve just hid the ad.</strong> Thanks for <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7329157" title="Donate on PayPal" class="external">donating</a>!</p></div>';
		}
		add_action( 'admin_notices', 'anywhere_wrong_settings' );
		*/

return;
}

?>