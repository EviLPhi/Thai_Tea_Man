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

$update = $conn->query("UPDATE tb_barang SET nama_barang = '".$nama_barang."', stok_barang = '".$stok_barang."', harga = '".$harga."', jenis_barang = '".$jenis."'  WHERE id='".$id."'");

if ($update) {
	header('Location: ../data-barang.php');
} else {
	header('Location: ../data-barang.php?h=edit-barang&id=2');
}