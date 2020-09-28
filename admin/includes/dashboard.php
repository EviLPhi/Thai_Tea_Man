<div class="container mt-5" >
	
	<div class="row text-center">
		<div class="col-md-4">
			<div class="card" style="width: 19rem;">
				<div class="card-body shadow">
					<?php 
					$sql = $conn->query("SELECT SUM(tb_barang.harga * tb_transaksi.jumlah_barang) AS Total FROM `tb_transaksi` LEFT JOIN `tb_barang` ON tb_transaksi.id_barang = tb_barang.id");
					$total_transaksi = $sql->fetch_assoc();
					?>
					<h5 class="card-title"><b>LAPORAN PENJUALAN</b></h5><hr>
				
					<h4>Rp.<?=$total_transaksi['Total'] ?></h4>
				<br>
					<a class="nav-link btn btn-success btn-sm text-white" href="transaksi.php">Detail</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 19rem;">
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
			<div class="card" style="width: 19rem; ">
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
	<br>
	<br>
	<div class="row text-center">
		<div class="card center " style="width: 69rem;">
			<div class="card-body shadow">
				<h5 class="card-title"><b>GRAFIK PENDAPATAN</b></h5><hr>
				<?php
					$kasir = $conn->query("SELECT nama,id FROM tb_users WHERE id!=1")->fetch_all(MYSQLI_ASSOC);
					$harga = "SELECT SUM(tb_transaksi.harga_barang * tb_transaksi.jumlah_barang) AS Total FROM `tb_transaksi` INNER JOIN tb_users ON tb_transaksi.id_user = tb_users.id";
					$dataPoints = [];
					for ($i=0; $i < $barang['TotalKasir'] ; $i++) { 
						$pendapatan = $conn->query($harga." WHERE tb_users.id=".$kasir[$i]['id'])->fetch_assoc();
						array_push($dataPoints,array("label"=>$kasir[$i]['nama'],"y"=>$pendapatan['Total']));}
				?>
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			</div>
		</div>
	</div>
</div>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	axisY: {
		title: "Pendapatan"
	},
	axisX :{
		title: "Pimpinan Cabang"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Rupiah",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>