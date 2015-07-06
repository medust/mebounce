<?php 
require_once( '../../../wp-config.php');
global $wpdb;

$table_name = $wpdb->prefix . "mebounce_user";
$time = date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) );

	$query = $wpdb->insert( $table_name, array( 'email' => $_POST['email'], 'time' => $time ) );
	
	if($query==true) {
		return true;
	}
	else 
		return false;

?>