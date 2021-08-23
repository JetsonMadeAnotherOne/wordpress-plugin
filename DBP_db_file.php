<?php
	function DBP_tb_create() {
		global $wpdb;
		$DBP_tb_name = $wpdb->prefix . "dbp_tb_login";
		$DBP_query = "CREATE TABLE $DBP_tb_name(
		id int(10) NOT NULL AUTO_INCREMENT,
		name varchar (100) DEFAULT '',
		content varchar (100) DEFAULT '',
		PRIMARY KEY (id)
		)";
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta($DBP_query);
	}

?>