<?php
	require 'require_login.php';
?>
<!DOCTYPE html>
<html>
	<?php include('header.php'); ?>
	<body>
		<?php
			require '../connection.php';
			
			$connection = new Connection();
			$connection = $connection->connection;
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$query = $connection->prepare('DELETE FROM good_photo_menu_additional WHERE id=?');
				$query->bind_param('i', $_POST['id']);
				
				if ($query->execute() == TRUE) {
					header('Location: good_photo_menu.php');
				} else {
					echo $connection->error;
				}
				
				$connection->close();
			}
		?>
		
		<br/>
		<br/>
		<a href="good_photo_menu.php">Kembali</a>
	</body>
</html>