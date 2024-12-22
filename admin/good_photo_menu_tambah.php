<?php
	require 'require_login.php';
?>
<!DOCTYPE html>
<html>
	<?php include 'metadata.php'; ?>
	<body>
		<?php include('header.php'); ?>
		<?php require '../connection.php'; ?>
	
		<div class="main_content">
			<h1>Tambah ke Self-Photo Studio: Good Photo Menu</h1>
			
			<form action="good_photo_menu_tambah.php" method="POST" enctype="multipart/form-data">
				<label for="judul">Judul:</label>
				<input type="text" id="judul" name="judul" required> <br/>
				
				<label for="deskripsi">Deskripsi:</label> <br/>
				<textarea rows="5" cols="50" id="deskripsi" name="deskripsi" required></textarea> <br/>
				
				<label for="harga">Harga:</label>
				<input type="number" id="harga" name="harga" required> <br/>
				
				<label for="maksimum_orang">Maksimum Pelanggan per Pesanan:</label>
				<input type="number" id="maksimum_orang" name="maksimum_orang" required> <br/>
				
				<label for="gambar">Gambar contoh:</label>
				<input type="file" name="gambar" id="gambar"> <br/><br/>
				
				<input type="submit" value="Tambah">
			</form>
			<p><?php if (isset($_GET['submit_success']) && $_GET['submit_success'] == true) { echo "Berhasil ditambahkan.";} ?></p>
		</div>
		
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$connection = new Connection();
				$connection = $connection->connection;
				
				$last_id = $connection->query('SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME="good_photo_menu"');
				$last_id = $last_id->fetch_assoc();
				$last_id = $last_id['AUTO_INCREMENT'];
				
				$path = "";
				if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
					$image = $_FILES['gambar'];
					$name = $image['name'];
					$extension = pathinfo($name)['extension'];
					$path = $connection->query("SELECT gambar_contoh FROM good_photo_menu WHERE id=".$_POST['id']);
					$path = $path->fetch_assoc();
					$path = $path['gambar_contoh'];
					$path = "../good_photo_menu_images/" . $last_id.'.'.$extension;
					move_uploaded_file($image['tmp_name'], $path);
				}
				
				$query = $connection->prepare(
				'INSERT INTO good_photo_menu (judul, deskripsi, maksimum_orang, harga, gambar_contoh)
				VALUES (?, ?, ?, ?, ?)');
				// s = string, i = int, d = float, b = blob
				$query->bind_param('ssids', $_POST['judul'], $_POST['deskripsi'], $_POST['maksimum_orang'], $_POST['harga'], $path);
				
				if ($query->execute() == TRUE) {
					header('Location: good_photo_menu_tambah.php?submit_success=true');
				} else {
					echo $connection->error;
				}
				
				$connection->close();
			}
		?>
	</body>
</html>