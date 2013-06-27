<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	include_once("includes/form_functions.php");
	
	// START FORM 
	if (isset($_POST['submit'])) { 
		$errors = array();

		
		$required_fields = array('fname', 'lname','email', 'card', 'phone' , 'password' );
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('fname' => 30, 'lname' => 30, 'email' => 30, 'card' => 20, 'phone' =>18, 'password' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$fname = trim(mysql_prep($_POST['fname']));
		$lname = trim(mysql_prep($_POST['lname']));
		$email = trim(mysql_prep($_POST['email']));
		$card = trim(mysql_prep($_POST['card']));
		$phone = trim(mysql_prep($_POST['phone']));
		$password = trim(mysql_prep($_POST['password']));
		
		$hashed_password = sha1($password);

		if ( empty($errors) ) {
			$query = "INSERT INTO users (
							fname , lname , email , card , phone , hashed_password
						) VALUES (
							'{$fname}', '{$lname}', '{$email}', '{$card}', '{$phone}', '{$hashed_password}'

						)";
			$result = mysql_query($query, $connection);
			if ($result) {
				$message = "The user was successfully created.";
			} else {
				$message = "The user could not be created.";
				$message .= "<br />" . mysql_error();
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
	} else { 
		$fname = "" ;
		$lname = "" ;
		$email = "" ;
		$card = "" ;
		$phone = "" ;
		$password = "" ;
	}
?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="staff.php">Return to Menu</a><br />
			<br />
		</td>
		<td id="page">
			<h2>Create New User</h2>
			<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
			<?php if (!empty($errors)) { display_errors($errors); } ?>
			<form action="new_user.php" method="post">
			<table>
				<tr>
					<td>firstname:</td>
					<td><input type="text" name="fname" maxlength="30" value="<?php echo htmlentities($fname); ?>" /></td>
				</tr>
				<tr>
					<td>lastname:</td>
					<td><input type="text" name="lname" maxlength="30" value="<?php echo htmlentities($lname); ?>" /></td>
				</tr>
				<tr>
					<td>email:</td>
					<td><input type="text" name="email" maxlength="30" value="<?php echo htmlentities($email); ?>" /></td>
				</tr>
				<tr>
					<td>card:</td>
					<td><input type="text" name="card" maxlength="20" value="<?php echo htmlentities($card); ?>" /></td>
				</tr>
				<tr>
					<td>phone:</td>
					<td><input type="text" name="phone" maxlength="18" value="<?php echo htmlentities($phone); ?>" /></td>
				</tr>
				
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Create user" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>