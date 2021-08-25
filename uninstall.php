<?php
	if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS wp_dbp_tb_login" );
	delete_option("my_plugin_db_version");
?>