<?php
include("conf/koneksi.php");
session_start();

// Mendapatkan username dan password yang di submit.
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if(isset($_POST['submit'])) {
  // Memeriksa apakah data user ada di dalam database.
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['level'] = $user['level'];
    
    header('Location:LTE/');
  } else{
    $_SESSION['error'] = 'Username atau password salah.'; 
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Toko Roti & Kue Hoya</title>

  <!-- Favicon -->
  <link rel="icon" type="image/jpeg" href="LTE/dist/img/hoya-logo.jpeg">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="LTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="LTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="LTE/dist/css/adminlte.min.css">
  <!-- Sweet ALert  -->
  <link rel="stylesheet" href="LTE/plugins/Sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition register-page" style="background-color: skyblue;">
  <div class="register-box">

    <div class="card card-outline card-success">

      <div class="card-header text-center">
        <img src="LTE/dist/img/hoya.jpg" class="rounded" width="100" height="100">
      </div>

      <div class="card-body">
        <p class="login-box-msg font-weight-bold" style="color: black; font-size: 20px; font-family: Helvetica;">Laporan Anggaran Dana</p>
       
        <!-- Menampilkan pesan error -->
        <?php if (isset($_SESSION['error'])) : ?>
        <p style="color: red; text-align: center;"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
        <?php endif ?>

        <form method="post">

          <!-- username -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required value="<?= $username ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <!-- password -->
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required value="<?= $password ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!-- submit -->
          <div class="row">
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery JS -->
  <script src="LTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 JS -->
  <script src="LTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE JS -->
  <script src="LTE/dist/js/adminlte.min.js"></script>
</body>
</html>
