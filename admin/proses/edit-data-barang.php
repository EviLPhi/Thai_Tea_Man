<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$id 			= $_POST['id'];
$nama_barang 	= $_POST['nama_barang'];
$stok_barang	= $_POST['stok_barang'];
$harga			= $_POST['harga'];
$jenis 			= $_POST['jenis_barang'];
$id_kasir		= $_POST['id_kasir'];

$update = $conn->query("UPDATE tb_barang b, tb_stock s SET b.nama_barang = '".$nama_barang."', s.stock = '".$stok_barang."', b.harga = '".$harga."', b.jenis_barang = '".$jenis."'  WHERE b.id='".$id."' AND s.id_barang=b.id AND s.id_user = $id_kasir");

if ($update) {
	header('Location: ../data-barang.php?id_kasir='.$id_kasir);
} else {
	header('Location: ../data-barang.php?h=edit-barang&id=2');
}