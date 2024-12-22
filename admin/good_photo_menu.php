<?php
	require 'require_login.php';
?>
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
			<p><b><a href="">Ubah <i>banner</i> Self-Photo Studio</a></b></p>
			<table>
				<tr>
					<th colspan="7" align="center">The Good Photo Menu</th>
				</tr>
				<tr>
					<th>Judul</th>
					<th>Deskripsi</th>
					<th>Maksimum Pelanggan</th>
					<th>Harga</th>
					<th colspan="2"><a href="good_photo_menu_tambah.php">Tambah</a></th>
				</tr>
				<?php
					$connection = new Connection();
					$connection = $connection->connection;
					$result = $connection->query('SELECT * FROM good_photo_menu');
					
					while ($row = $result->fetch_assoc()) { ?>
						
						<tr>
							<td><?php echo $row["judul"]; ?></td>
							<td><?php echo ($row["deskripsi"] != NULL ? nl2br($row["deskripsi"]) : '-'); ?></td>
							<td><?php echo ($row["maksimum_orang"] > 0 ? $row["maksimum_orang"].' / pesanan' : '-'); ?></td>
							<td><?php echo $row["harga"]; ?></td>
							<td><a href="good_photo_menu_ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a></td>
							<td><a href="good_photo_menu_hapus.php?id=<?php echo $row["id"]; ?>">Hapus</a></td>
						</tr>
				<?php } ?>
			</table>
			
			<table>
				<tr>
					<th colspan="7" align="center">The Additional</th>
				</tr>
				<tr>
					<th>Deskripsi</th>
					<th>Harga</th>
					<th colspan="2"><a href="additional_tambah.php">Tambah</a></th>
				</tr>
				<?php
					$connection = new Connection();
					$connection = $connection->connection;
					$result = $connection->query('SELECT * FROM good_photo_menu_additional');
					
					while ($row = $result->fetch_assoc()) { ?>
						
						<tr>
							<td><?php echo ($row["deskripsi"] != NULL ? nl2br($row["deskripsi"]) : '-'); ?></td>
							<td><?php echo $row["harga"]; ?></td>
							<td><a href="additional_ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a></td>
							<td><a href="additional_hapus.php?id=<?php echo $row["id"]; ?>">Hapus</a></td>
						</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>
	