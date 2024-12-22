<!DOCTYPE html>
<?php
require('connection.php');


$connection = new Connection();
$connection = $connection->connection;

$menu_utama = $connection->query('SELECT * FROM good_photo_menu');
$menu_additional = $connection->query('SELECT * FROM good_photo_menu_additional');
	
$connection->close();


function shortNumber($num) 
{
    $units = ['', 'K', 'M', 'B', 'T'];
    for ($i = 0; $num >= 1000; $i++) {
        $num /= 1000;
    }
    return round($num, 1) . $units[$i];
}

?>
<html>

	<?php include('structure/metadata.php'); ?>
	<body>
		<?php include('structure/header.php'); ?>
		
		<div class="main_content">
			<!--SELF-PHOTO STUDIO-->
			<p style="font-size: 26pt; line-height: 1em;">THE <b>GOOD PHOTO</b> MENU</p>
			<div class="brochure_container">
				<?php while ($row = $menu_utama->fetch_assoc()) { ?>
					<table>
						<thead>
							<tr>
								<th scope="col" colspan="2" class="featured_card_head">
									<a href="self_photo_detail.php?id=<?php echo $row['id']?>"><?php echo strtoupper($row['judul']); ?></a>
								</th>
								<th scope="col" colspan="2"><a href="book.php?preselect_id=<?php echo $row['id']?>">Book This</a></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" class="featured_card_description">
									<?php echo nl2br($row['deskripsi']); ?>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="featured_card_footnote">
									<i><?php if (isset($row['deskripsi'])) {echo '*Max '.$row['maksimum_orang'].' Person';} ?></i>
								</td>
								<td colspan="1" class="featured_card_price">
									<?php echo shortNumber($row['harga']); ?>
								</td>
							</tr>
						</tbody>
					</table>
				<?php } ?>
			</div>
			
			<?php if ($menu_additional->num_rows > 0) { ?>
				<table class="the_additional">
					<thead>
						<tr>
							<th scope="col" colspan="2">THE ADDITIONAL</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = $menu_additional->fetch_assoc()) { ?>
							<tr>
								<td>
									<?php echo $row['deskripsi']; ?>
								</td>
								<td><?php echo shortNumber($row['harga']); ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
		
		<?php include('structure/footer.php'); ?>
	<body>
	
	<style>
	.main_content .featured_card_head a {
		color: #eef4f1;
	}
	</style>
</html>	