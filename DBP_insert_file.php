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
		if (isset($_POST['save'])) {
			global $wpdb;
			
			$DBP_name = $_POST['name'];
			$DBP_content = $_POST['content'];
			
			$wpdb->insert('wp_dbp_tb_login',
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