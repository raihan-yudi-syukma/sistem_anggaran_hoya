<?php
// Get values.
$no_anggaran = isset($_POST['no_anggaran']) ? trim($_POST['no_anggaran']) : '';
$tgl_anggaran = isset($_POST['tgl_anggaran']) ? trim($_POST['tgl_anggaran']) : '';
$id_item = isset($_POST['id_item']) ? $_POST['id_item'] : '';
$nominal = isset($_POST['nominal']) ? $_POST['nominal'] : '';
?>

<div class="card card-outline card-primary">

  <!-- header -->
  <div class="card-header">
    <h4>Form Input Anggaran</h4>
  </div>

  <form class="card-body" method="post" action="anggaran/tambah_control.php" id="formData">
    <div class="form-row">
      <!-- nomor anggaran -->
      <div class="col-md-6 mb-3">
        <label for="no_anggaran">No. Anggaran</label>
        <input type="text" id="no_anggaran" name="no_anggaran" class="form-control" value="<?= $no_anggaran ?>" maxlength="15" required>
      </div>

      <!-- tanggal anggaran -->
      <div class="col-md-6 mb-3">
        <label for="tgl_anggaran">Tgl. Anggaran</label>
        <input type="date" id="tgl_anggaran" name="tgl_anggaran" class="form-control" value="<?= $tgl_angaran ?>" required>
      </div>

      <!-- id item -->
      <?php $getAllItem = mysqli_query($koneksi, "SELECT * FROM item"); ?>
      <div class="col-md-6 mb-3">
        <label for="id_item">Item</label>
        <select name="id_item" id="id_item" required class="form-control">
          <option selected disabled hidden>-Pilih Item-</option>
          <?php while($item = mysqli_fetch_array($getAllItem)) : ?>
          <option value="<?= $item['id'] ?>" <?= $item['id'] === $id_item ? 'selected' : '' ?>><?= $item['id_item'].' > '.$item['nama'] ?></option>
          <?php endwhile ?>
        </select>
      </div>

      <!-- nominal -->
      <div class="col-md-6 mb-3">
        <label for="nominal">Nominal</label>
        <input type="number" id="nominal" name="nominal" class="form-control" value="<? $nominal ?>" maxlength="30" required>
      </div>
    </div>

    <input class="btn btn-primary btn-block" type="submit" name="submit" value="Simpan">
  </form>
  <!-- /.card-body -->
</div>
