<div class="container mt-5">
	
	<h2>Edit Data Menu </h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>
	
	<?php 
		$sql = $conn->query("SELECT * FROM tb_barang b JOIN tb_stock s ON b.id = s.id_barang WHERE b.id = '".$_GET['id']."' AND s.id_user='".$_SESSION['id_user']."'");
		$data = $sql->fetch_assoc();
	?>

	<div class="card mt-3">
		<div class="card-header">
			Edit data <?= $data['nama_barang'] ?>
		</div>
		<div class="card-body">
			<form action="proses/edit-data-barang.php" method="POST">
				<div class="form-group">
					<label for="nama_barang">Nama Menu</label>
					<input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" class="form-control" required readonly>
				</div>
				<div class="form-group">
					<label for="stok_barang">Stok Menu</label>
					<input type="number" name="stok_barang" value="<?= $data['stock'] ?>" min="1" max="10000" class="form-control" required readonly>	
				</div>
				<div class="form-group">
						<input placeholder='tambah stock' type="number" name="tambah_stock" min="1" max="10000" class="form-control" required>
					</div>
				<div class="form-group">
					<label for="harga">Harga</label>
					<input type="number" name="harga" value="<?= $data['harga'] ?>" min="1" max="10000" class="form-control" required readonly>
				</div>
				<input type="hidden" name="id" value="<?= $data['id'] ?>">
				<button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>

</div>