<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!$_SESSION['nama']) {
  header('Location:../index.php?session=expired');
  exit;
}
?>

<?php include("../conf/koneksi.php");  ?>
<?php include("partials/header.php") ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- navbar -->
    <?php include("partials/navbar.php"); ?>
    <!-- sidebar -->
    <?php include("partials/sidebar.php"); ?>
    <!-- content wrapper -->
    <div class="content-wrapper p-3">
      <!-- header -->
      <?php include("partials/content_header.php"); ?>  

      <!-- content -->
      <?php 
      if (isset($_GET['page'])) {
        // dashboard
        if ($_GET['page'] === 'dashboard') {
          include('dashboard.php');
        }

        // user
        else if ($_GET['page'] === 'user') {
          include('user/index.php');
        }
        else if ($_GET['page'] === 'edit-user') {
          include('user/edit.php');
        }

        // item
        else if ($_GET['page'] === 'item') {
          include('item/index.php');
        }
        else if ($_GET['page'] === 'edit-item') {
          include('item/edit.php');
        }

        // anggaran
        else if ($_GET['page'] === 'anggaran') {
          include('anggaran/index.php');
        }
        else if ($_GET['page'] === 'tambah-data-anggaran') {
          include('anggaran/tambah.php');
        }
        else if ($_GET['page'] === 'informasi-anggaran') {
          include('anggaran/input_bulan.php');
        }
        else if ($_GET['page'] === 'edit-anggaran') {
          include('anggaran/edit.php');
        }

        // not found
        else {
          include('not_found.php');
        }
      } else {
        include('dashboard.php');
      }
      ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php include("partials/footer.php"); ?> 
  </div>
  <!-- ./wrapper -->
</body>
</html>
