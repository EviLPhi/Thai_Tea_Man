<head>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">RESET</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Apakah Anda yakin ?
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		  <a href="./proses/batal-transaksi.php" class="btn btn-danger">Iya</a>
        </div>
        
      </div>
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col">
	<?php foreach ($data_barang as $barang): ?>
		<?php if ($barang['stock'] < 5): ?>
			<div class="alert alert-danger" role="alert">
			  <strong>Perhatian!!</strong> Stok <strong><?= $barang['nama_barang'] ?></strong> kurang dari 5.
			</div>
		<?php endif ?>
	<?php endforeach ?>
		<div class="card-body">
		<div class="shadow-none p-3 mb-5 bg-light rounded">
			Petugas Cabang Thai Tea Man : <?= $_SESSION['user'] ?>
		</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-5">
					<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="mt-3" autocomplete="off">
						
					<div class="shadow p-3 mb-5 bg-white rounded">
						<div class="form-group">
						
							<label for="id_barang">Nama Menu</label>
							<input list="barang" name="nama_barang" placeholder="Nama menu pesanan" class="form-control" required>
							<datalist id="barang">
								<?php foreach ($data_barang as $barang): ?>
								<option value="<?= $barang['nama_barang'] ?>">
								<?php endforeach ?>
							</select>
						</div>
					
						<div class="form-group">
							<label for="jumlah_barang">Jumlah Menu</label>
							<input type="number" name="jumlah_barang" placeholder="Jumlah menu Pesanan" min="1" max="1000" class="form-control" required>
						</div>
						<button type="submit" class="btn btn-primary float-right"><i class="fas fa-cart-plus    "></i> Transaksi</button>
						<a data-toggle="modal" data-target="#myModal" class="btn btn-danger float-left"><i class="fas fa-sync-alt    "></i></a>
						<div class="clearfix"></div>
					</form>
   					</div>
	</div>
    <div class="col">
	<div class="shadow p-3 mb-5 bg-white rounded">
	<h3>Input Penjualan</h3>
					<?php 

					if (isset($_POST['nama_barang'], $_POST['jumlah_barang'])) {
						
						$nama_barang 	= $_POST['nama_barang'];
						$jumlah_barang 	= $_POST['jumlah_barang'];
						$id_user 		= $_SESSION['id_user'];
						
						$barang 		= $conn->query("SELECT * FROM tb_barang b JOIN tb_stock s ON b.id = s.id_barang WHERE nama_barang = '".$nama_barang."' AND s.id_user='".$_SESSION['id_user']."'");
						$data_barang 	= $barang->fetch_assoc();


						if (!isset($_SESSION['list_pembelian'])) {
							$_SESSION['list_pembelian']	= [];
						}
						else{
							$array_barang = $_SESSION['list_pembelian'];
						}
						// if(count($_SESSION['list_pembelian']['jumlah'] > 0)){
							$min_stock = 0;
							foreach ($_SESSION['list_pembelian'] as $pembelian){
								if($pembelian['nama_barang'] == $nama_barang){
									$min_stock = $pembelian['jumlah'];
								}
							}
						
						$stock = $data_barang['stock'] - $min_stock;
						if ($jumlah_barang <= $stock){
							$push = True;
							$flag = 0;
							foreach($_SESSION['list_pembelian'] as $beli){
								if($beli['nama_barang'] == $nama_barang){
									$array_barang[$flag]['jumlah'] = $array_barang[$flag]['jumlah'] + $jumlah_barang;
									$push = False;
								}
								$flag++;
							}
							if($push == True){
								array_push($_SESSION['list_pembelian'], [
									'nama_barang' => $nama_barang, 
									'jumlah' => $jumlah_barang, 
									'harga' => $data_barang['harga']]);
							}
							else{
								$_SESSION['list_pembelian'] = $array_barang;
							}
							// if($_SESSION['list_pembelian'] != []){
							// 	foreach(array_keys($_SESSION['list_pembelian']) as $key => $value){
							// 		echo"$key => $value";
							// 	}
							// }
							// else{
							// 	array_push($_SESSION['list_pembelian'], [
							// 		'nama_barang' => $nama_barang, 
							// 		'jumlah' => $jumlah_barang, 
							// 		'harga' => $data_barang['harga']]);
							// 	}
							}

						if (!isset($_SESSION['total_bayar'])) {
							$_SESSION['total_bayar'] = [];
						}

						if ($jumlah_barang <= $stock){
						$total_bayar = ($jumlah_barang * $data_barang['harga']);
						array_push($_SESSION['total_bayar'], $total_bayar);
						
						}
					?>
					<?php foreach ($_SESSION['list_pembelian'] as $pembelian): ?>
						<p><?= $pembelian['nama_barang'] ?> (<?= $pembelian['jumlah'] . ' x ' . $pembelian['harga'] ?>)</p>
					<?php endforeach ?>
					<hr>
					<h3 class="float-right">Total : Rp. <?= number_format(array_sum($_SESSION['total_bayar'])) ?></h3>
					<div class="clearfix"></div>
					
					<a href="data-barang.php" class="btn btn-success btn-block">Submit</a>
					
				   
					
					<?php
					}
					?>

				</div>
				
			</div>
		</div>
	</div>
	</div>
  </div>


<script>
function reset(){
	session_start();
	session_unset($_SESSION['list_pembelian'], $_SESSION['total_bayar']);
	header('Location: ../index.php');
}							
</script>