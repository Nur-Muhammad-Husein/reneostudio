<!DOCTYPE html>
<?php
	include_once 'connection.php';
	
	$connection = new Connection();
	$connection = $connection->connection;

	$about_us = $connection->query('SELECT * FROM about_us');
	$fields = array();
	while ($row = $about_us->fetch_assoc()) {
		$fields[$row['field']] = $row['text'];
	}
	
	$connection->close();
?>
<html>

	<?php include('structure/metadata.php'); ?>
	<body>
		<?php include('structure/header.php'); ?>
		
		<div class="main_content">
			<!--ABOUT US-->
			<p style="margin-bottom: 0;"><?php echo nl2br($fields['pretitle']); ?></p>
			<h1 style="margin-top: 0; margin-bottom:0;"><?php echo nl2br($fields['title']); ?></h1>
			<p>
				<?php echo nl2br($fields['content']); ?>
			</p>
		</div>
		
		<?php include('structure/footer.php'); ?>
	<body>
	
</html>