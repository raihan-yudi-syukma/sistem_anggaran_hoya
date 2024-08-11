<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT 
	anggaran.id,
	anggaran.no_anggaran,
	anggaran.tgl_anggaran, 
	item.id_item,
	anggaran.nominal FROM anggaran
	INNER JOIN item ON
	anggaran.id_item=item.id
	WHERE anggaran.id=$id");
$anggaran = mysqli_fetch_assoc($query); 
?>

<section class="content">
  <div class="conteiner-fluid">
    <div class="card card-outline card-info">

			<!-- header -->
      <div class="card-header">
        <h3 class="card-title">Form Edit Data Anggaran</h3>
      </div>
    
			<!-- body -->
      <div class="card-body">
        <form method="post" action="anggaran/edit_control.php">

					<!-- id -->
					<input type="hidden" name="id" value="<?= $id ?>">

					<!-- no. anggaran -->
					<div class="form-group">
						<label for="no_anggaran">No. Anggaran</label>
						<input type="text" id="no_anggaran" name="no_anggaran" class="form-control" value="<?= $anggaran['no_anggaran'] ?>">
					</div>

					<!-- tgl. anggaran -->
					<div class="form-group">
						<label for="tgl_anggaran">Tgl. Anggaran</label>
						<input type="date" id="tgl_anggaran" name="tgl_anggaran" class="form-control" value="<?= $anggaran['tgl_anggaran'] ?>">
					</div>
							
					<!-- id item -->
					<?php
					$getAllItem = mysqli_query($koneksi, "SELECT * FROM item") ?>
					<div class="form-group">
						<label for="item">ID Item</label>
						<select class="form-control" name="item" id="item" required>
              <option selected disabled hidden>-Pilih-</option>
							<?php while($item = mysqli_fetch_array($getAllItem)) : ?>
							<option value="<?= $item['id'] ?>" <?= $item['id_item'] === $anggaran['id_item'] ? 'selected' : '' ?>><?= $item['id_item'].' > '.$item['nama'] ?></option>
							<?php endwhile ?>
            </select>
					</div>

          <!-- tgl. anggaran -->
					<div class="form-group">
						<label for="nominal">Nominal</label>
						<input type="number" id="nominal" name="nominal" class="form-control" maxlength="30" value="<?= $anggaran['nominal'] ?>">
					</div>

					<!-- submit -->
					<button type="submit" class="btn btn-info">Edit</button>
				</form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
