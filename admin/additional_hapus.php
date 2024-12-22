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
			<p><b>Apakah anda yakin ingin menghapus baris menu berikut dari daftar Additional?</b></p>
			<form action="additional_hapus_confirmed.php" method="POST">
				<?php
					$connection = new Connection();
					$connection = $connection->connection;
					$result = $connection->query('SELECT * FROM good_photo_menu_additional WHERE id='.$_GET['id']);
					$row = $result->fetch_assoc();
				
				?>
				<label><b>Deskripsi:</b> <br/><?php echo nl2br($row['deskripsi']) ?></label> <br/>
				<label><b>Harga:</b> <?php echo  $row['harga'] ?></label> <br/>
				<input type="hidden" name="id" value=<?php echo $row['id']; ?>>
				<input type="submit" value="Hapus">
			</form>
		</div>
	</body>
</html>