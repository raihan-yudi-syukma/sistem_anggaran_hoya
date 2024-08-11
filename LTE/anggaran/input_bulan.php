<?php
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';

if(isset($_POST['submit'])) {
	$getAllAnggaran = mysqli_query($koneksi, "SELECT 
		anggaran.id,
		anggaran.no_anggaran,
		anggaran.tgl_anggaran, 
		item.nama,
		anggaran.nominal FROM anggaran
		INNER JOIN item ON
		anggaran.id_item=item.id
		WHERE MONTH(anggaran.tgl_anggaran)=$bulan");
}
?>

<section class="content">
	<div class="container-fluid">

		<form method="get" action="anggaran/informasi_perbulan.php">
			<!-- bulan -->
			<div class="form-group">
				<label for="bulan">Input Bulan (1-12)</label>
				<input class="form-control" type="number" name="bulan" id="bulan" min="1" max="12" maxlength="2" required style="width: fit-content;">
			</div>
			<input class="btn btn-primary mb-3" type="submit" name="submit" value="Cari">
		</form>
	</div>
</section>
