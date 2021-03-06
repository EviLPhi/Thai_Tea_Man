<div class="container mt-5">
	
	<h2>Edit Data Menu</h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>
	
	<?php 
		$sql = $conn->query("SELECT * FROM tb_barang b JOIN tb_stock s ON b.id= s.id_barang WHERE b.id = '".$_GET['id']."' AND s.id_user = $id_kasir");
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
					<input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="stok_barang">Stok Menu</label>
					<input type="number" name="stok_barang" value="<?= $data['stock'] ?>" min="1" max="10000" class="form-control" required>
				</div>
				<div class="form-group">
				<label for="jenis_barang">Jenis Menu</label>
				<select name="jenis_barang" class="form-control" value="<?= $data['jenis_barang'] ?>" required>
					<option value="">-- Pilih Jenis Menu --</option>
					<option value="makanan">Makanan</option>
					<option value="minuman">Minuman</option>
					<option value="topping">Topping</option>
				</select>
				</div>
				<div class="form-group">
					<label for="harga">Harga Menu</label>
					<input type="number" name="harga" placeholder="Harga Menu" class="form-control" value="<?= $data['harga'] ?>" min="0" required>
				</div>
				<input type="hidden" name="id" value="<?= $data['id'] ?>">
				<input type="hidden" name="id_kasir" value="<?= $id_kasir ?>">
				<button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>

</div>