<div class="container mt-5">
	
	<h2>Tambah Data Menu </h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>

	<form action="proses/tambah_barang.php" method="POST" class="mt-3" autocomplete="off">
		<div class="form-group">
			<label for="nama_barang">Nama Menu</label>
			<input type="text" name="nama_barang" placeholder="Nama Menu" class="form-control" autofocus required>
		</div>
		<div class="form-group">
			<label for="jenis_barang">Jenis Menu</label>
			<select name="jenis_barang" class="form-control" required>
				<option value="">-- Pilih Jenis Menu --</option>
				<option value="makanan">Makanan</option>
				<option value="minuman">Minuman</option>
				<option value="topping">Topping</option>
			</select>
		</div>
		<div class="form-group">
			<label for="harga">Harga Menu</label>
			<input type="number" name="harga" placeholder="Harga Menu" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary float-right">Tambah Menu</button>
	</form>

</div>