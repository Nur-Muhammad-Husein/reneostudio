<!DOCTYPE html>
<?php
require('connection.php');


$connection = new Connection();
$connection = $connection->connection;

$packages = $connection->query('SELECT * FROM good_photo_menu');
	
$connection->close();
?>
<html>

	<?php include('structure/metadata.php'); ?>
	<body>
		<?php include('structure/header.php'); ?>
		
		<div class="main_content">
			<!--BOOK-->
			<h1>Start Booking</h1>
			<form action="book_action.php" method="POST">
				<label for="name"><b>Your Name</b> (Diperlukan) </label>  <br/>
				<input type="text" name="name" id="name" required />  <br/>
				
				<label for="tel"><b>WhatsApp</b> (Diperlukan) </label>  <br/>
				<input type="tel" pattern="^(\+62|62|0)8[1-9][0-9]{6,9}$" name="tel" id="tel" placeholder="0XXXXXXXXXXX" required />  <br/>
				
				<label for="email"><b>Email</b> (Diperlukan) </label> <br/>
				<input type="email" name="email" id="email" required />  <br/>
				
				<?php
					$package_preselect = "";
					if (isset($_GET['preselect_id'])) {
						$package_preselect = $_GET['preselect_id'];
					}
				?>
				<label for="package"><b>The Package</b> </label>  <br/>
				<select name="package" id="package" required>
					<option value="">--Please choose an option--</option>
					<?php while ($package = $packages->fetch_assoc()) { ?>
						<option <?php echo ($package['id'] === $package_preselect) ? 'selected' : '';?> value="<?php echo $package['id']; ?>"><?php echo $package['judul']; ?></option>
					<?php }  ?>
				</select>  <br/>
				
				<fieldset>
					<legend><b>Additional</b> (Jika Ada):</legend>
					<b>Adult</b> (Jumlah) <b>(+ Rp20.000/orang)</b>:
					<select name="additional_adult" id="additional_adult">
						<option value="">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select> <br/>
					<b>Kids</b> (Jumlah) <b>(+ Rp10.000/orang)</b>: <br/>
					<select name="additional_kids" id="additional_kids">
						<option value="">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select> <br/>
					<b>Print (+ Rp15.000)</b>:
					<input type="radio" id="print_yes" name="print" value="Yes" /> <label for="print_yes">Yes</label>
					<input type="radio" id="print_no" name="print" value="No" checked /> <label for="print_no">No</label> <br/>
				</fieldset>
				
				<label for="tanggal"><b>Tanggal</b> (Diperlukan) </label>
				<input type="datetime-local" name="tanggal" id="tanggal" value="" step=1800 min="10:00" max="20:00" required />
				
				<input type="submit" value="Konfirmasikan Pesanan" />
			</form>
		</div>
		
		<?php include('structure/footer.php'); ?>
	<body>
	
</html>	