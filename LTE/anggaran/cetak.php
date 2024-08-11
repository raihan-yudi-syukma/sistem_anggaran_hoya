<?php
include("../../conf/koneksi.php");
session_start();
if (!$_SESSION['nama']) {
  header('Location:../index.php?session=expired');
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$bulan = $_GET['bulan'];
	$anggaranTotal = $_GET['anggaranTotal'];

	// Mendapatkan semua anggaran berdasarkan bulan.
	$getAllAnggaran = mysqli_query($koneksi, "SELECT 
		anggaran.id,
		anggaran.no_anggaran,
		anggaran.tgl_anggaran, 
		item.id_item,
		anggaran.nominal FROM anggaran
		INNER JOIN item ON
		anggaran.id_item=item.id
		WHERE MONTH(anggaran.tgl_anggaran)=$bulan");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Website Laporan Anggaran Dana</title>

		<!-- Favicon -->
		<link rel="icon" type="image/jpeg" href="../dist/img/hoya-logo.jpeg">
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- JQVMap -->
		<link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../dist/css/adminlte.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
		<!-- summernote -->
		<link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
		<!-- Sweet Alert 2 -->
			<link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	</head>

	<body class="p-5" onload="window.print()">
		<h3 class="text-center">Laporan Pengeluaran</h3>
		<?= date('d').'-'.date('m').'-'.date('Y') ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">No.</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Nama Item</th>
					<th scope="col">Nominal</th>
				</tr>
			</thead>

			<tbody>
				<?php $no = 1; ?>
				<?php while ($anggaran = mysqli_fetch_array($getAllAnggaran)) : ?>
				<tr>
					<td width='5%'><?= $no++; ?></td>
					<td><?= $anggaran['no_anggaran']; ?></td>
					<td><?= $anggaran['tgl_anggaran']; ?></td>
					<td><?= $anggaran['id_item']; ?></td>
					<td>Rp. <?= number_format($anggaran['nominal'], 0, ',', '.'); ?></td>
				</tr>
				<?php endwhile ?>
				<tr>
					<td class="font-weight-bold text-center" colspan="4">Total:</td>
					<td class="font-weight-bold">Rp. <?= number_format($anggaranTotal, 0, ',', '.'); ?></td>
				</tr>
			</tbody>
		</table>
	</body>
</html>
