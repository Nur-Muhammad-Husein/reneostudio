<?php 

include_once 'connection.php'; 

$connection = new Connection();
$connection = $connection->connection;
$alamat = $connection->query('SELECT isi FROM singleton WHERE judul="alamat"');
$alamat = $alamat->fetch_assoc();

$connection->close();

?>
<div class="title_bar">
	<img src="logo.png" alt="Logo Studio Reneo"/>
	<div class="address">
		<p>
			<!--Q376+XH Mangunjaya, Bekasi District, West Java 17510-->
			<?php echo $alamat['isi']; ?>
		</p>
	</div>
</div>

<div class="navigation_bar">
	<div class="side">
		<a href="<?php echo 'book.php'?>"><b>START BOOKING</b></a>
		<p><b>or</b></p>
		<a href="<?php echo 'browse.php'?>"><b>BROWSE YOUR OPTIONS</b></a>
	</div>
	<div class="side">
		<a href="<?php echo 'portfolio.php'?>"><b>PORTFOLIO</b></a>
		<a href="<?php echo 'about_us.php'?>"><b>ABOUT US</b></a>
	</div>
</div>