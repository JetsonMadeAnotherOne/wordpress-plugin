<div>
	<?php
		global $wpdb;
		$DBP_results = $wpdb->get_results("SELECT * FROM wp_dbp_tb_login");
		foreach ($DBP_results as $DBP_row) {
			$id = $DBP_row->id;
			$name = $DBP_row->name;
			$content = $DBP_row->content;
		}
	?>
</div>

<form method="post">
    <!--    <div style="background: red; width: 50px; height: 100px"/>-->
    <label>
        NAME:
        <textarea name="name"><?php echo $name; ?></textarea>
    </label>
    <label>
        CONTENT:
        <textarea name="content"><?php echo $content; ?></textarea>
    </label>
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


?>
	