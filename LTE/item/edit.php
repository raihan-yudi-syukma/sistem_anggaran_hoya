<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT *FROM item WHERE id='$id'");
$item = mysqli_fetch_assoc($query); 
?>

<section class="content">
  <div class="conteiner-fluid">
    <div class="card card-outline card-info">

			<!-- header -->
      <div class="card-header">
        <h3 class="card-title">Form Edit Data Item</h3>
      </div>
    
			<!-- body -->
      <div class="card-body">
        <form method="post" action="item/edit_control.php">

					<!-- id -->
					<input type="hidden" name="id" value="<?= $id ?>">

					<!-- id item -->
					<div class="form-group">
						<label for="id_item">ID Item</label>
						<input type="text" id="id_item" name="id_item" class="form-control" value="<?= $item['id_item'] ?>">
					</div>

					<!-- nama item -->
					<div class="form-group">
						<label for="nama">Nama Item</label>
						<input type="text" id="nama" name="nama" class="form-control" placeholder="nama" value="<?= $item['nama'] ?>">
					</div>
							
					<!-- submit -->
					<button type="submit" class="btn btn-info">Edit</button>
				</form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
