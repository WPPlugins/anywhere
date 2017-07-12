<html>
<head>
<title>Anywhere Uninstall Script</title>
</head>
<body>
<?php
/* Include the bootstrap for setting up WordPress environment */
include( get_option( 'siteurl' ) . '/wp-load.php' );

if ( !is_user_logged_in() )
	wp_die( 'You must be logged in to run this script.' );

if ( !current_user_can( 'install_plugins' ) )
	wp_die( 'You do not have permission to run this script.' );

if ( defined( 'UNINSTALL_ANYWHERE' ) )
	wp_die( 'UNINSTALL_ANYWHERE set somewhere else! It must only be set in uninstall.php' );

define( 'UNINSTALL_ANYWHERE', '1' );

if ( !defined( 'UNINSTALL_ANYWHERE' ) || constant( 'UNINSTALL_ANYWHERE' ) == '' ) 
	wp_die( 'UNINSTALL_ANYWHERE must be set to a non-blank value in uninstall.php on line 29' );

?>
<p>This script will uninstall all options created by the <a href='http://austinpassy.com/wordpress-plugins/anywhere/'>Anywhere</a> plugin.</p>
<?php
if ( $_POST[ 'uninstall' ] ) {
	$plugins = (array)get_option( 'active_plugins' );
	$key = array_search( 'anywhere/anywhere.php', $plugins );
	if ( $key !== false ) {
		unset( $plugins[ $key ] );
		delete_option( 'anywhere_settings' ); //Delete options!!
		update_option( 'active_plugins', $plugins );
		echo "Disabled Anywhere plugin : <strong>DONE</strong><br />";
	}

	if ( in_array( 'anywhere/anywhere.php', get_option( 'active_plugins' ) ) )
		wp_die( 'Anywhere is still active. Please disable it on your plugins page first.' );
	echo "<p><strong>Please comment out the UNINSTALL_ANYWHERE <em>define()</em> on line 29 in this file!</strong></p>";
	wp_mail( $current_user->user_email, '@Anywhere Uninstalled', '' );
} else {
	?>
	<form action='uninstall.php' method='POST'>
	<p>Click UNINSTALL to delete the following options:
	<ol>
	<li>get_option( 'anywhere_settings' )</li>
	</ol>
	<input type='hidden' name='uninstall' value='1' />
	<input type='submit' value='UNINSTALL' />
	</form>
	<?php
}

?>
</body>
</html>