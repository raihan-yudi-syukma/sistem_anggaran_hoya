<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

						<!-- button tambah item -->
            <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#modal-lg">
              Tambah Item <i class="fas fa-plus"></i>
            </button>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
								<tr>
									<th>#</th>
									<th>Kode Item</th>
									<th>Nama Item</th>
									<th>Aksi</th>
								</tr>
              </thead>
              <tbody>
								<?php 
								$no = 1;
								$query = mysqli_query($koneksi, "SELECT * FROM item");
								while ($item = mysqli_fetch_array($query)){
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $item['id_item'] ?></td>
									<td><?= $item['nama'] ?></td>
									<td>
										<div class="btn-group">
											<!-- Hapus -->
											<a href="item/hapus.php?id=<?= $item['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
												Hapus
											</a>
											<!-- Edit -->
											<a href="index.php?page=edit-item&id=<?= $item['id']; ?>" class="btn btn-info">
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
        <h4 class="modal-title font-weight-bold text-dark">Form Input Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="item/tambah_control.php"> 
        <div class="modal-body">
					<!-- id item -->
					<div class="form-group">
						<label for="id_item">ID Item</label>
						<input type="text" id="id_item" name="id_item" class="form-control" maxlength="10" required>
					</div>

					<!-- nama item -->
					<div class="form-group">
						<label for="nama_item">Nama Item</label>
						<input type="text" id="nama_item" name="nama_item" class="form-control"	 required>
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
