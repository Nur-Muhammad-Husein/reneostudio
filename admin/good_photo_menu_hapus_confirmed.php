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
				$gambar_contoh = $connection->query("SELECT gambar_contoh FROM good_photo_menu WHERE id=".$_POST['id']);
				$gambar_contoh = $gambar_contoh->fetch_assoc();
				$gambar_contoh = $gambar_contoh['gambar_contoh'];
				if (file_exists($gambar_contoh)) {
					unlink($gambar_contoh);
				}
				
				$query = $connection->prepare('DELETE FROM good_photo_menu WHERE id=?');
				$query->bind_param('i', $_POST['id']);
				
				if ($query->execute() == TRUE) {
					echo 'Dihapus dari daftar.';
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