<?php // this page is included by new_page.php and edit_page.php ?>
<?php if (!isset($new_page)) {$new_page = false;} ?>

<p>Page name: <input type="text" name="menu_name" value="<?php echo $sel_page['menu_name']; ?>" id="menu_name" /></p>

<p>Position: <select name="position">
	<?php
		if (!$new_page) {
			$page_set = get_pages_for_subject($sel_page['subject_id']);
			$page_count = mysql_num_rows($page_set);
		} else {
			$page_set = get_pages_for_subject($sel_subject['id']);
			$page_count = mysql_num_rows($page_set) + 1;
		}
		for ($count=1; $count <= $page_count; $count++) {
			echo "<option value=\"{$count}\"";
			if ($sel_page['position'] == $count) { echo " selected"; }
			echo ">{$count}</option>";
		}
	?>
</select></p>

<p>
Visible: 
	<input type="radio" name="visible" value="0"<?php 
	if ($sel_page['visible'] == 0) { echo " checked"; } 
	?> /> No
	&nbsp;
	<input type="radio" name="visible" value="1"<?php 
	if ($sel_page['visible'] == 1) { echo " checked"; } 
	?> /> Yes
</p>
<p>Content: <br/ >
	<textarea name="content" rows="16" cols="70"><?php echo $sel_page['content']; ?></textarea>
	</p>

<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
