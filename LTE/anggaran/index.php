<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12"> 
        <!-- /.card -->
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
              
              <thead>
                <tr>
                  <th>#</th>
                  <th scope="col">No. Anggaran</th>
                  <th scope="col">Tanggal Anggaran</th>
                  <th scope="col">ID Item</th>
                  <th scope="col">Nominal</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
            
              <tbody>
                <?php
                $no = 0;
                $getAllAnggaran = mysqli_query($koneksi, "SELECT 
                anggaran.id,
                anggaran.no_anggaran,
                anggaran.tgl_anggaran, 
                item.id_item,
                anggaran.nominal FROM anggaran
                INNER JOIN item ON
                anggaran.id_item=item.id");
                ?>
                
                <?php while ($anggaran = mysqli_fetch_array($getAllAnggaran)) : ?>
                <?php $no++ ?>
                <tr>
                  <td width='5%'><?= $no;?></td>
                  <td><?= $anggaran['no_anggaran']; ?></td>
                  <td><?= $anggaran['tgl_anggaran']; ?></td>
                  <td><?= $anggaran['id_item']; ?></td>
                  <td>Rp. <?= number_format($anggaran['nominal'], 0, ',', '.');  ?></td>
                  <td>
                    <div class="btn-group">
                      <!-- Hapus -->
                      <a href="anggaran/hapus.php?id=<?= $anggaran['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        Hapus
                      </a>
                      <!-- Edit -->
                      <a href="index.php?page=edit-anggaran&id=<?= $anggaran['id']; ?>" class="btn btn-info">
                        Edit
                      </a>
                    </div>
                  </td>
                </tr>
                <?php endwhile ?>
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
