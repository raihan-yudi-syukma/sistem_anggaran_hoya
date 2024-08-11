<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- brand logo -->
  <a href="index.php" class="brand-link" style="background-color: orange;">
    <img src="dist/img/hoya-logo.jpeg" alt="Hoya logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-normal">Sistem Anggaran Hoya</span>
  </a>
  
  <div class="sidebar sidebar-light" style="background-color: orangered;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
          <a href="index.php?page=dashboard" class="nav-link text-dark">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- kelola user -->
        <?php if($_SESSION['level'] === 'SUPERVISOR') : ?>
        <li class="nav-item">
          <a href="index.php?page=user" class="nav-link text-dark">
            <i class="fas fa-users nav-icon"></i>
            <p>Data User</p>
          </a>
        </li>
        <?php endif ?>


        <!-- data item -->
        <?php if($_SESSION['level'] === 'KARYAWAN') :?>
        <li class="nav-item">
          <a href="index.php?page=item" class="nav-link text-dark">
            <i class="fas fa-shopping-basket nav-icon"></i>
            <p>Data item</p>
          </a>
        </li>
        <?php endif ?>

        <!-- anggaran dana -->
        <?php if($_SESSION['level'] === 'KARYAWAN' || $_SESSION['level'] === 'SUPERVISOR') :?>
        <li class="nav-item">
          <a href="#" class="nav-link text-dark">
            <i class="fas fa-money nav-icon">$</i>
            <p>Anggaran Dana <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">

             <!-- input data anggaran -->
             <li class="nav-item">
              <a class="nav-link" href="index.php?page=tambah-data-anggaran">
                <i class="nav-icon fas fa-circle"></i>
                <p>Tambah Data Anggaran</p>
              </a>
            </li>

            <!-- data anggaran -->
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=anggaran">
                <i class="nav-icon fas fa-circle"></i>
                <p>Data Anggaran</p>
              </a>
            </li>

            <!-- laporan anggaran -->
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=informasi-anggaran">
                <i class="fas fa-circle nav-icon"></i>
                <p>Info. Anggaran Perbulan</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif ?>
        <!-- /.anggaran dana -->

        <!-- logout -->
        <li class="nav-item">
          <a href="logout.php" class="nav-link text-dark">
            <i class="nav-icon fas fa-power-off"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>
