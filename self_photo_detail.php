<!DOCTYPE html>
<?php
require('connection.php');


$connection = new Connection();
$connection = $connection->connection;

$item = $connection->query('SELECT * FROM good_photo_menu WHERE id='.$_GET['id']);
$row = $item->fetch_assoc();
	
$connection->close();
?>
<html>

	<?php include('structure/metadata.php'); ?>
	<body>
		<?php include('structure/header.php'); ?>
		
		<div class="main_content">
			<!--ITEM DETAIL-->
			<h1 style="margin-bottom:0;"><?php echo $row['judul']; ?></h1>
			<p>
				<b>Rp<?php echo $row['harga']; ?></b> <br/>
				<?php echo nl2br($row['deskripsi']); ?> <br>
				<?php if ($row['gambar_contoh']) { ?>
					<img style="width: 60%;" src="good_photo_menu/<?php echo $row['gambar_contoh']; ?>" />
				<?php } ?>
			</p>
			<p>
				<a href="book.php?preselect_id=<?php echo $row['id']?>"><b>Book This</b></a>
			</p>
		</div>
		
		<?php include('structure/footer.php'); ?>
	<body>
	
</html>