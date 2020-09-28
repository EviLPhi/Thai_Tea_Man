<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'admin') {
	header('Location: ../admin/index.php');
}

if (isset($_SESSION['list_pembelian'], $_SESSION['total_bayar'])) {
	foreach ($_SESSION['list_pembelian'] as $beli) {
		
		$barang 		= $conn->query("SELECT * FROM tb_barang b JOIN tb_stock s ON b.id=s.id_barang WHERE s.id_user='".$_SESSION['id_user']."' AND nama_barang='".$beli['nama_barang']."'");
		$data_barang 	= $barang->fetch_assoc();

		// $dt_tr = $conn->query("SELECT * FROM tb_transaksi WHERE id_barang = '".$data_barang['id']."' AND id_user = '".$_SESSION['id_user']."'");
		// $dt_arr 	= $dt_tr->fetch_assoc();
		
		$jumlah_stok = ($data_barang['stock'] - $beli['jumlah']);

		$harga = $conn->query("SELECT harga FROM tb_barang WHERE id = '".$data_barang['id']."'")->fetch_row();

		$transaksi 		= $conn->query("INSERT INTO `tb_transaksi`(`id`, `id_barang`, `id_user`, `jumlah_barang`,`harga_barang`) VALUES ('','".$data_barang['id']."','".$_SESSION['id_user']."','".$beli['jumlah']."','".$harga[0]."')");

		$update_data_barang = $conn->query("UPDATE tb_stock SET stock = '".$jumlah_stok."' WHERE id_user='".$_SESSION['id_user']."' AND id_barang = '".$data_barang['id']."'");


		// if ($dt_tr->num_rows > 0) {
			
		// 	$jml_brg_tr  = ($dt_arr['jumlah_barang'] + $beli['jumlah']);

		// 	$update = $conn->query("UPDATE tb_transaksi SET jumlah_barang = '".$jml_brg_tr."' WHERE id = '".$dt_arr['id']."'");
			
		// 	$update_data_barang = $conn->query("UPDATE tb_stock SET stock = '".$jumlah_stok."' WHERE id_user='".$_SESSION['id_user']."' AND id_barang = '".$data_barang['id']."'");

		// } else {
		// 	$harga = $conn->query("SELECT harga FROM tb_barang WHERE id = '".$data_barang['id']."'")->fetch_row();
		// 	print_r($harga);
		// 	$transaksi 		= $conn->query("INSERT INTO `tb_transaksi`(`id`, `id_barang`, `id_user`, `jumlah_barang`,`harga_barang`) VALUES ('','".$data_barang['id']."','".$_SESSION['id_user']."','".$beli['jumlah']."','".$harga[0]."')");

		// 	$update_data_barang = $conn->query("UPDATE tb_stock SET stock = '".$jumlah_stok."' WHERE id_user='".$_SESSION['id_user']."' AND id_barang = '".$data_barang['id']."'");

		// }


	}
	unset($_SESSION['list_pembelian'], $_SESSION['total_bayar']);
}
header('Location: ../index.php');