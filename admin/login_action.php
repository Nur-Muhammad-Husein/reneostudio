<?php
	require '../connection.php';
	
	$connection = new Connection();
	$connection = $connection->connection;
	$statement = $connection->prepare('SELECT * FROM administrator WHERE username=? AND password=?');
	$statement->bind_param('ss', $_POST['username'], $_POST['password']);
	$statement->execute();
	$admin = $statement->get_result();
	$valid = mysqli_num_rows($admin) > 0;

	if ($valid) {
		session_start();
		$_SESSION['valid'] = true;
		header('Location: index.php');
	} else { 
		$error_message = "Username atau Password salah.";
		header('Location: login.php?login_false='.$error_message);
	}
?>