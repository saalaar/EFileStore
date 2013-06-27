<?php require_once("includes/session.php"); ?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			&nbsp;
		</td>
		<td id="page">
			<h2>Main store</h2>
			<p>Welcome <?php echo  $_SESSION ['fname']; ?> to Your File Store.</p>
			<ul>
				<li><a href="content.php">Manage Your Sell AND Buy</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>
