<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<body>
		<form action="login_action.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required> <br/>
			
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required> <br/>
			
			<input type="submit" value="Login">
		</form>
		<?php 
			if (isset($_GET['login_false'])) {
				echo $_GET['login_false'];
			}
		?>
	</body>
</html>