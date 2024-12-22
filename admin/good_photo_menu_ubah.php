<?php
	require 'require_login.php';
?>
<!DOCTYPE html>
<html>
	<?php include 'metadata.php'; ?>
	<body>
		<?php include('header.php'); ?>
		<?php 
			require '../connection.php';
			
			$connection = new Connection();
			$connection = $connection->connection;
			$result = $connection->query('SELECT * FROM good_photo_menu WHERE id='.$_GET['id']);
			$row = $result->fetch_assoc();
		?>
	
		<div class="main_content">
			<h1>Ubah Rincian Good Photo Menu</h1>
			
			<form action="good_photo_menu_ubah_confirmed.php" method="POST" enctype="multipart/form-data">
				<label for="judul">Judul:</label>
				<input type="text" id="judul" name="judul" required value="<?php echo $row['judul']; ?>"> <br/>
				
				<label for="deskripsi">Deskripsi:</label> <br/>
				<textarea rows="5" cols="50" id="deskripsi" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea> <br/>
				
				<label for="harga">Harga:</label>
				<input type="number" id="harga" name="harga" required value="<?php echo $row['harga']; ?>"> <br/>
				
				<label for="maksimum_orang">Maksimum Pelanggan per Pesanan:</label>
				<input type="number" id="maksimum_orang" name="maksimum_orang" value="<?php echo $row['maksimum_orang']; ?>"> <br/>
				
				<label for="gambar">Gambar contoh <b>baru</b>:</label>
				<input type="file" name="gambar" id="gambar"> <br/><br/>
				
				<label for="gambar_sudah_ada">Gambar contoh yang <b>sudah ada</b>:</label>
				<img style="max-width: 100%;" src=<?php echo $row['gambar_contoh']; ?>>
				
				<input type="hidden" name="id" value=<?php echo $row['id']; ?>>
				
				<input type="submit" value="Ubah">
			</form>
		</div>
	</body>
</html>