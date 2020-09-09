<div class="container mt-5">
	
	<h2>Detail Data Menu </h2>
	<hr>
	
	<a href="data-barang.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<div class="clearfix"></div>
	
	<?php 
		$sql = $conn->query("SELECT * FROM tb_barang WHERE id = '".$_GET['id']."'");
		$data = $sql->fetch_assoc();
	?>

	<div class="card mt-3">
		<div class="card-header">
			<?= $data['nama_barang'] ?>
		</div>
		<div class="card-body">
			<p>Stok Menu : <?= $data['stok_barang'] ?></p>
			<p>Jenis Menu : <?= $data['jenis_barang'] ?></p>
		</div>
	</div>

</div>