<?php
	/*
	Plugin Name: Database Plugin
	Description: This is my first attempt on writing a custom Plugin
	Version: 1.0.0
	Author: Maxim Ustianov
	*/
	
	function DBP_add_front_Page() {
		include_once("DBP_insert_file.php");
		DBP_insert_data();
	}
	
	if (!defined('ABSPATH')) {
		define('ABSPATH', dirname(__FILE__) . '/');
	}
	define('DBP_dir', dirname(__FILE__));
	define('DBP_url', plugins_url('', __FILE__));
	add_action("admin_menu", "DBP_add_menu_function");
	
	include_once("DBP_db_file.php");
	
	register_activation_hook(__FILE__, "DBP_tb_create");
	
	register_activation_hook(__FILE__, "DBP_tb_insert");
	function my_plugin_remove_database() {
		global $wpdb;
		$sql = "DROP TABLE IF EXISTS wp_dbp_tb_login";
		
		$wpdb->query($sql);
	}
	
	register_deactivation_hook(__FILE__, 'my_plugin_remove_database');
	
	function DBP_add_menu_function() {
		add_menu_page(
			'DBP_custom plugin',
			'DBP_custom Plugin',
			'manage_options',
			'DBP_custom_plugin_page',
			'DBP_add_front_page'
		);
	}
	
	function wp_head_extra_code() {
		global $wpdb;
		$DBP_results = $wpdb->get_results("SELECT * FROM wp_dbp_tb_login");
		foreach ($DBP_results as $DBP_row) {
			$content = $DBP_row->content;
		}
		echo $content;
	}
	
	;
	
	add_action("wp_head", "wp_head_extra_code");
	
	

?>