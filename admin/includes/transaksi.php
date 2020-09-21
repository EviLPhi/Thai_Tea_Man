<div class="container mt-3">
	<h2>Laporan Penjualan</h2>
	<hr>
	<!-- Filter Cabang -->
	<form action="./transaksi.php" method="post">
		<input class="form-control col-3 float-left" type="month" value="<?= $sysdate ?>" name="date">
		<select name="id_kasir" class="form-control col-2 float-left" value="<?= $data['jenis_barang'] ?>">
				<option value="0">All</option>
				<?php foreach ($data_kasir as $kasir): ?>
				<option value="<?= $kasir['id'] ?>"><?= $kasir['nama'] ?></option>
				<?php endforeach ?>
			</select>
		<button type="submit" class="btn btn-success float-left">Filter</button>
	</form>
	<a href="index.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>
	<hr>
	<table class="table table-bordered">
	<thead class="thead-light" class="align-middle">
		<thead>
			<tr>
				<th>Tanggal Transaksi</th>
				<th>Pimpinan Cabang</th>
				<th>Menu</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_tb_transaksi as $data): ?>
			<tr>
				<td><?= date('d/m/Y h:i:s', strtotime($data['tanggal_transaksi'])) ?></td>
				<td><?= $data['nama'] ?></td>
				<td><?= $data['nama_barang'] ?></td>
				<td><?= $data['jumlah_barang'] ?></td>
				<td><?= $data['jumlah_barang']*$data['harga'] ?></td>
			</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="4" class="h5">Pendapatan</td>
				<td class="h5"><?= $total_transaksi?></td>
			</tr>
		</tbody>
	</table>
	<button class="nav-link btn btn-primary btn-sm text-white" onclick="window.print()" id='print'><i class="fas fa-print    "></i> Cetak</button>
</div>