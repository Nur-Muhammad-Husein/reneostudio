<?php
	require 'require_login.php';
?>
<!DOCTYPE html>
<html>
	<body>
		<?php
			require '../connection.php';
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$connection = new Connection();
				$connection = $connection->connection;
				
				$query = $connection->prepare(
				'UPDATE good_photo_menu_additional 
				SET deskripsi=?, harga=? 
				WHERE id=?'
				);
				$query->bind_param('ssi', $_POST['deskripsi'], $_POST['harga'], $_POST['id']);
				
				if ($query->execute() == TRUE) {
					header("Location: good_photo_menu.php");
				} else {
					echo $connection->error;
				}
				
				$connection->close();
			}
		?>
		
		<br/>
		<br/>
		<a href="index.php">Kembali</a>
	</body>
</html>