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
				
				$path = $connection->query("SELECT gambar_contoh FROM good_photo_menu WHERE id=".$_POST['id']);
				$path = $path->fetch_assoc();
				$path = $path['gambar_contoh'];
				if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
					if (file_exists($path)) {
						unlink($path);
					}
					
					$image = $_FILES['gambar'];
					$name = $image['name'];
					$extension = pathinfo($name)['extension'];
					$path = "../good_photo_menu_images/" . $_POST['id'].'.'.$extension;
					move_uploaded_file($image['tmp_name'], $path);
				}
				
				$query = $connection->prepare(
				'UPDATE good_photo_menu 
				SET judul=?, deskripsi=?, maksimum_orang=?, harga=?, gambar_contoh=?
				WHERE id=?'
				);
				$query->bind_param('ssidsi', $_POST['judul'], $_POST['deskripsi'], $_POST['maksimum_orang'], $_POST['harga'], $path, $_POST['id']);
				
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