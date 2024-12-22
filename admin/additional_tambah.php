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
			<h1>Tambah ke Self-Photo Studio: Additional</h1>
			
			<form action="additional_tambah.php" method="POST" enctype="multipart/form-data">
				<label for="deskripsi">Deskripsi:</label> <br/>
				<textarea rows="5" cols="50" id="deskripsi" name="deskripsi" required></textarea> <br/>
				
				<label for="harga">Harga:</label>
				<input type="number" id="harga" name="harga" required> <br/>
				
				<input type="submit" value="Tambah">
			</form>
			<p><?php if (isset($_GET['submit_success']) && $_GET['submit_success'] == true) { echo "Berhasil ditambahkan.";} ?></p>
		</div>
		
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$connection = new Connection();
				$connection = $connection->connection;
				
				$query = $connection->prepare(
				'INSERT INTO good_photo_menu_additional (deskripsi, harga)
				VALUES (?, ?)');
				// s = string, i = int, d = float, b = blob
				$query->bind_param('ss', $_POST['deskripsi'], $_POST['harga']);
				
				if ($query->execute() == TRUE) {
					header('Location: additional_tambah.php?submit_success=true');
				} else {
					echo $connection->error;
				}
				
				$connection->close();
			}
		?>
	</body>
</html>