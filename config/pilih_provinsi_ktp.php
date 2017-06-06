<?php include('koneksi.php') ?>

<?php $query = "SELECT * FROM sk_province WHERE country_iso = '$_GET[country_ktp]' ORDER BY name"; ?>
<?php $qry = mysql_query($query) ?>
	<select name="province_ktp" id="province_ktp">
		<?php while ($kece = mysql_fetch_assoc($qry)) {
		?>
		<option value="<?php echo $kece['id']?>"><?php echo $kece['name'] ?></option>
		<?php
		} ?>										
	</select>