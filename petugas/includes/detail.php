<div class="container mt-5">
	
	<h2>Detail Data Menu </h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>
	
	<?php 
		$sql = $conn->query("SELECT * FROM tb_barang b JOIN tb_stock s ON b.id = s.id_barang WHERE b.id = '".$_GET['id']."' AND s.id_user='".$_SESSION['id_user']."'");
		$data = $sql->fetch_assoc();
	?>

	<div class="card mt-3">
		<div class="card-header">
			<?= $data['nama_barang'] ?>
		</div>
		<div class="card-body">
			<p>Stok Menu : <?= $data['stock'] ?></p>
			<p>Jenis Menu : <?= $data['jenis_barang'] ?></p>
		</div>
	</div>

</div>