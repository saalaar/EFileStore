<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	include_once("includes/form_functions.php");
	
	// START FORM 
	if (isset($_POST['submit'])) { // Form submitted.
		$errors = array();

		// validations on form 
		$required_fields = array('email', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('email' => 30, 'password' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$email = trim(mysql_prep($_POST['email']));
		$password = trim(mysql_prep($_POST['password']));
		$hashed_password = sha1($password);
		
		if ( empty($errors) ) {
			// Check database  email and the hashed password 
			$query = "SELECT id, email , fname ";
			$query .= "FROM users ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND hashed_password = '{$hashed_password}' ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// email/password 
				// only 1 
				$found_user = mysql_fetch_array($result_set);
				
				$_SSESION['id'] = $found_user['id'] ;
				$_SSESION['fname'] = $found_user['fname'] ;
				redirect_to("staff.php");
			} else {
				// email/password not found in database
				$message = "email/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
		
	} else { // Form not submitted.
		$email = "";
		$password = "";
	}
?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="index.php">Return to Site</a>
		</td>
		<td id="page">
			<h2>Login</h2>
			<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
			<?php if (!empty($errors)) { display_errors($errors); } ?>
			<form action="login.php" method="post">
			<table>
				<tr>
					<td>email:</td>
					<td><input type="text" name="email" maxlength="30" value="<?php echo htmlentities($email); ?>" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Login" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>