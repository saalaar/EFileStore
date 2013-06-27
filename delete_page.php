<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	if (intval($_GET['page']) == 0) {
		redirect_to('content.php');
	}
	
	$id = mysql_prep($_GET['page']);
	if ($page = get_page_by_id($id)) {
		$query = "DELETE FROM pages WHERE id = {$page['id']} LIMIT 1";
		$result = mysql_query ($query);
		if (mysql_affected_rows() == 1) {
			redirect_to("edit_subject.php?subj={$page['subject_id']}");
		} else {
			echo "<p>Page deletion failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
			echo "<a href=\"content.php\">Return to Main Site</a>";
		}
	} else {
		redirect_to('content.php');
	}
?>
<?php 
mysql_close($db);
?>
