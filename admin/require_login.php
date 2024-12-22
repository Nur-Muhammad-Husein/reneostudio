<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	if ($_SESSION['valid'] == false) {
		header('Location: login.php');
	}
?>