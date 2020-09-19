<div class="container mt-3">
	
	<h2>Laporan Penjualan</h2>
	<hr>
	<!-- Filter Cabang -->
	<div class="dropdown">
    	<button type="button" class="btn btn-success dropdown-toggle btn-sm float-left" data-toggle="dropdown">Cabang</button>
    	<div class="dropdown-menu">
		<a class="dropdown-item" href="?">All</a>
			<?php foreach ($data_kasir as $kasir): ?>
			<a class="dropdown-item" href="?id_kasir=<?= $kasir['id'] ?>"><?= $kasir['nama'] ?></a>
			<?php endforeach ?>
    	</div>
  	</div>
	<a href="index.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>
	<hr>
	<table class="table table-bordered">
	<thead class="thead-light" class="align-middle">
		<thead>
			<tr>
				<th>No</th>
				<th>Pimpinan Cabang</th>
				<th>Menu</th>
				<th>Jumlah Menu</th>
				<th>Tanggal Transaksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_tb_transaksi as $data): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['nama'] ?></td>
				<td><?= $data['nama_barang'] ?></td>
				<td><?= $data['jumlah_barang'] ?></td>
				<td><?= date('d/m/Y', strtotime($data['tanggal_transaksi'])) ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<button class="nav-link btn btn-primary btn-sm text-white" onclick="window.print()" id='print'><i class="fas fa-print    "></i> Cetak</button>
</div>