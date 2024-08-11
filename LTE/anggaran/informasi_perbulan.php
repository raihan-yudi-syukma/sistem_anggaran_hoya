<?php
include("../../conf/koneksi.php");
session_start();
if (!$_SESSION['nama']) {
  header('Location:../index.php?session=expired');
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$bulan = $_GET['bulan'];

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

	// Total anggaran perbulan.
	$anggaranSum = mysqli_query($koneksi, "SELECT SUM(nominal) AS nominalTotal FROM anggaran WHERE MONTH(anggaran.tgl_anggaran)=$bulan");
	$anggaranTotal = mysqli_fetch_assoc($anggaranSum)['nominalTotal'];
}
?>

<!DOCTYPE html>
<html lang="en"><head>
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
<body class="hold-transition sidebar-mini layout-fixed">
	

		<!-- navbar -->
		<nav class="main-header navbar navbar-expand navbar-success navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
			</ul>
		</nav>

    <!-- sidebar -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- brand logo -->
			<a href="../index.php" class="brand-link" style="background-color: orange;">
				<img src="../dist/img/hoya-logo.jpeg" alt="Hoya logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-normal">Sistem Anggaran Hoya</span>
			</a>
			
			<div class="sidebar sidebar-light" style="background-color: orangered;">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block text-dark font-weight-bold">
							<?= $_SESSION['nama']; ?><br>
							<small><?= $_SESSION['level']; ?></small>
						</a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- dashboard -->
						<li class="nav-item">
							<a href="../index.php?page=dashboard" class="nav-link text-dark">
								<i class="nav-icon fas fa-th"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<!-- kelola user -->
						<?php if($_SESSION['level'] === 'SUPERVISOR') : ?>
						<li class="nav-item">
							<a href="../index.php?page=data-user" class="nav-link text-dark">
								<i class="fas fa-users nav-icon"></i>
								<p>Data User</p>
							</a>
						</li>
						<?php endif ?>


						<!-- data item -->
						<?php if($_SESSION['level'] === 'KARYAWAN') :?>
						<li class="nav-item">
							<a href="../index.php?page=item" class="nav-link text-dark">
								<i class="fas fa-shopping-basket nav-icon"></i>
								<p>Data item</p>
							</a>
						</li>
						<?php endif ?>

						<!-- anggaran dana -->
						<li class="nav-item">
							<a href="#" class="nav-link text-dark">
								<i class="fas fa-money nav-icon">$</i>
								<p>Anggaran Dana <i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview">

								<!-- input data anggaran -->
								<li class="nav-item">
									<a class="nav-link" href="../index.php?page=tambah-data-anggaran">
										<i class="nav-icon fas fa-circle"></i>
										<p>Tambah Data Anggaran</p>
									</a>
								</li>

								<!-- data anggaran -->
								<li class="nav-item">
									<a class="nav-link" href="../index.php?page=anggaran">
										<i class="nav-icon fas fa-circle"></i>
										<p>Data Anggaran</p>
									</a>
								</li>

								<!-- laporan anggaran -->
								<li class="nav-item">
									<a class="nav-link" href="../index.php?page=informasi-anggaran">
										<i class="fas fa-circle nav-icon"></i>
										<p>Info. Anggaran Perbulan</p>
									</a>
								</li>
							</ul>
						</li>
						<!-- /.anggaran dana -->

						<!-- logout -->
						<li class="nav-item">
							<a href="../z`logout.php" class="nav-link text-dark">
								<i class="nav-icon fas fa-power-off"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
		</aside>

    <!-- content wrapper -->
    <div class="content-wrapper p-3">

      <!-- header -->
      <div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 font-weight-bold">Toko Roti & Kue Hoya Pekanbaru</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>

			<!-- content -->
			<h4>Bulan: <?= $bulan ?></h4>

			<!-- cetak laporan anggaran -->
			<?php if ($_SESSION['level'] === 'KARYAWAN') : ?>
			<form action="cetak.php" method="get">
				<input type="hidden" name="bulan" value="<?= $bulan ?>">
				<input type="hidden" name="anggaranTotal" value="<?= $anggaranTotal ?>">
				<button class="btn btn-info mb-1" type="submit">
					<i class="fas fa-print"></i> Cetak
				</button>
			</form>
			<?php endif ?>
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
						<td class="font-weight-bold"><?= number_format($anggaranTotal, 0, ',', '.'); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.content-wrapper -->
		<!-- footer -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">Toko Roti & Kue Hoya Pekanbaru</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.2.0
			</div>
		</footer>

		<!-- jQuery -->
		<script src="../plugins/jquery/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>$.widget.bridge('uibutton', $.ui.button)</script>
		<!-- Bootstrap 4 -->
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- ChartJS -->
		<script src="../plugins/chart.js/Chart.min.js"></script>
		<!-- <script src="../plugins/sparklines/sparkline.js"></script> -->
		<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
		<!-- JQVMap -->
		<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="../plugins/moment/moment.min.js"></script>
		<script src="../plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script src="../plugins/summernote/summernote-bs4.min.js"></script>
		<!-- overlayScrollbars -->
		<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.js"></script>
		<!-- DataTables  & ../Plugins -->
		<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
		<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
		<script src="../plugins/jszip/jszip.min.js"></script>
		<script src="../plugins/pdfmake/pdfmake.min.js"></script>
		<script src="../plugins/pdfmake/vfs_fonts.js"></script>
		<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
		<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

		<script>
			$(function () {
				$("#example1").DataTable({
					"responsive": true, "lengthChange": false, "autoWidth": false,
					"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
				}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
					"responsive": true,
				});
			});
		</script>
  </div>
  <!-- ./wrapper -->
</body>
</html>
