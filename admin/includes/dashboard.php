<div class="container mt-5" >
	
	<div class="row text-center">
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body shadow">
					<?php 
					$sql = $conn->query("SELECT (tb_barang.harga * tb_transaksi.jumlah_barang) AS Total FROM `tb_transaksi` LEFT JOIN `tb_barang` ON tb_transaksi.id_barang = tb_barang.id");
					$array_total = $sql->fetch_all(MYSQLI_ASSOC);
					$total = [];
					for ($i=0; $i < $sql->num_rows; $i++) { 
						array_push($total, $array_total[$i]['Total']);
					}
					$total_transaksi = array_sum($total);
					?>
					<h5 class="card-title"><b>LAPORAN PENJUALAN</b></h5><hr>
				
					<h4>Rp. <?= number_format($total_transaksi) ?></h4>
				<br>
					<a class="nav-link btn btn-success btn-sm text-white" href="transaksi.php">Detail</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body shadow">
					<?php 
					$sql = $conn->query("SELECT COUNT(*) AS TotalBarang FROM tb_barang");
					$barang = $sql->fetch_assoc();
					?>
					<h5 class="card-title"><b>STOCK MENU</b></h5><hr>
				
					<h3><?= $barang['TotalBarang'] ?></h3>
					<br>
					<a class="nav-link btn btn-info btn-sm text-white" href="data-barang.php">Detail</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 ;" >
			<div class="card" style="width: 18rem; ">
				<div class="card-body shadow">
					<?php 
					$sql = $conn->query("SELECT COUNT(*) AS TotalKasir FROM tb_users WHERE jabatan = 'kasir'");
					$barang = $sql->fetch_assoc();
					?>
					<h5 class="card-title"><b>PIMPINAN CABANG</b></h5><hr>
				
					<h3><?= $barang['TotalKasir'] ?></h3>
					<br>
					<a class="nav-link btn btn-primary btn-sm text-white" href="petugas-kasir.php">Detail</a>
				</div>
			</div>
		</div>
	</div>
</div>

