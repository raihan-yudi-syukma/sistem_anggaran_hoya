<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

						<!-- button tambah item -->
            <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#modal-lg">
              Tambah User <i class="fas fa-plus"></i>
            </button>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Jenis Kelamin</th>
									<th scope="col">Level</th>
                  <th scope="col">Aksi</th>
								</tr>
              </thead>
              <tbody>
								<?php 
								$no = 1;
								$query = mysqli_query($koneksi, "SELECT * FROM user");
								while ($user = mysqli_fetch_array($query)){
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $user['nama'] ?></td>
									<td><?= $user['jenis_kelamin'] ?></td>
                  <td><?= $user['level'] ?></td>
									<td>
										<div class="btn-group">
											<!-- Hapus -->
											<a href="user/hapus.php?id=<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
												Hapus
											</a>
											<!-- Edit -->
											<a href="index.php?page=edit-user&id=<?= $user['id']; ?>" class="btn btn-info">
												Edit
											</a>
										</div>
									</td>
								</tr>
								<?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

<!-- modal tambah item -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

			<!-- header -->
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold text-dark">Form Input User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="user/tambah_control.php"> 
        <div class="modal-body">
					<!-- username -->
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" maxlength="50" required>
					</div>

					<!-- password -->
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control" maxlength="15" required>
					</div>

          <!-- nama -->
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" id="nama" name="nama" class="form-control" maxlength="100" required>
					</div>

          <!-- jenis kelamin -->
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
              <option selected disabled hidden>-Pilih-</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
					</div>

          <!-- level -->
					<div class="form-group">
						<label for="level">Level</label>
						<select class="form-control" name="level" id="level" required>
              <option selected disabled hidden>-Pilih-</option>
              <option value="SUPERVISOR">Supervisor</option>
              <option value="MANAJER">Manajer</option>
              <option value="Karyawan">Karyawan</option>
            </select>
					</div>
				</div>

        <div class="modal-footer justify-content-between">
          <!-- submit -->
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="confirmClose()">Batal</button>
          <button type="submit" class="btn btn-info" onclick="confirmSave()">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
