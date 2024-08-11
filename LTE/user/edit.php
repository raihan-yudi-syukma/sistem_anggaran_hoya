<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT *FROM user WHERE id='$id'");
$user = mysqli_fetch_assoc($query); 
?>

<section class="content">
  <div class="conteiner-fluid">
    <div class="card card-outline card-info">

			<!-- header -->
      <div class="card-header">
        <h3 class="card-title">Form Edit Data User</h3>
      </div>
    
			<!-- body -->
      <div class="card-body">
        <form method="post" action="user/edit_control.php">

					<!-- id -->
					<input type="hidden" name="id" value="<?= $id ?>">

					<!-- username -->
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" value="<?= $user['username'] ?>">
					</div>

					<!-- nama -->
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" id="nama" name="nama" class="form-control" placeholder="nama" value="<?= $user['nama'] ?>">
					</div>
							
					<!-- jenis kelamin -->
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
              <option selected disabled hidden>-Pilih-</option>
              <option value="Laki-laki" <?= $user['jenis_kelamin'] === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
					</div>

          <!-- level -->
					<div class="form-group">
						<label for="level">Level</label>
						<select class="form-control" name="level" id="level" required>
              <option selected disabled hidden>-Pilih-</option>
              <option value="SUPERVISOR" <?= $user['level'] === 'SUPERVISOR' ? 'selected' : '' ?>>Supervisor</option>
              <option value="MANAJER" <?= $user['level'] === 'MANAJER' ? 'selected' : '' ?>>Manajer</option>
              <option value="Karyawan" <?= $user['level'] === 'KARYAWAN' ? 'selected' : '' ?>>Karyawan</option>
            </select>
					</div>

					<!-- submit -->
					<button type="submit" class="btn btn-info">Edit</button>
				</form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
