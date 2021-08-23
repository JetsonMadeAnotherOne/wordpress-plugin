<form method="post">
    <label>Header Setting</label>

    <label>NAME:</label>
    <input type="text" name="name"/>

    <label>CONTENT:</label>
    <input class="input" type="text" name="content"/>

    <button type="submit" name="save">Save</button>
</form>

<?php
	
	function DBP_insert_data() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'wp_dbp_tb_login';
		
		$DBP_name = $_POST['name'];
		$DBP_content = $_POST['content'];
		if (isset($_POST['save'])) {
			$wpdb->insert($table_name,
				array(
					'name' => $DBP_name,
					'content' => $DBP_content
				),
				array(
					'%s',
					'%s',
				)
			);
		}
	}