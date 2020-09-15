<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
	<link rel="shortcut icon" href="..\assets\img\favicon.ico">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manager</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body >
	
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand">
		<img src="..\assets\img\logo.png" width="80" height="60" alt="Thaitea">
		Thai Tea Man
		</a>
		</nav>

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="./index.php">Dashboard <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./transaksi.php">Laporan Penjualan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./data-barang.php">Stock Menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./petugas-kasir.php">Pimpinan Cabang</a>
					</li>
			</ul>
		</div>
		<a href="logout.php" class="btn btn-outline-danger">Log Out</a>
	</nav>