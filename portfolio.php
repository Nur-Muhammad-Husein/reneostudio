<!DOCTYPE html>
<?php
include_once('connection.php');


$connection = new Connection();
$connection = $connection->connection;
	
$connection->close();
?>
<html>

	<?php include('structure/metadata.php'); ?>
	<head><link href="Lightbox2\src\css\lightbox.css" rel="stylesheet" /></head>
	
	<body>
		<?php include('structure/header.php'); ?>
		
		<div class="main_content">
			<!--SELF-PHOTO STUDIO-->
			<p style="font-size: 26pt; line-height: 1em;">OUR PORTFOLIO</p>
			<div class="brochure_container">
				<div class="brochure">
					<a href="good_photo_menu_images\1.jpg" data-lightbox="image-1" data-title="My caption"><img src="good_photo_menu_images\1.jpg"/></a>
				</div>
				<div class="brochure">
					<a href="good_photo_menu_images\1.jpg" data-lightbox="image-1" data-title="My caption"><img src="good_photo_menu_images\1.jpg"/></a>
				</div><div class="brochure">
					<a href="good_photo_menu_images\1.jpg" data-lightbox="image-1" data-title="My caption"><img src="good_photo_menu_images\1.jpg"/></a>
				</div><div class="brochure">
					<a href="good_photo_menu_images\1.jpg" data-lightbox="image-1" data-title="My caption"><img src="good_photo_menu_images\1.jpg"/></a>
				</div><div class="brochure">
					<a href="good_photo_menu_images\1.jpg" data-lightbox="image-1" data-title="My caption"><img src="good_photo_menu_images\1.jpg"/></a>
				</div>
				<div class="brochure">
					<a href="good_photo_menu_images\1.jpg" data-lightbox="image-1" data-title="My caption"><img src="good_photo_menu_images\1.jpg"/></a>
				</div>
			</div>
		</div>
		
		<?php include('structure/footer.php'); ?>
		
		<script src="Lightbox2\dist\js\lightbox-plus-jquery.js"></script>
	<body>
	
	<style>
	.main_content .featured_card_head a {
		color: #eef4f1;
	}
	</style>
</html>	