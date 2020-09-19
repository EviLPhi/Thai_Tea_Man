<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$id 			= $_POST['id'];
$nama_barang 	= $_POST['nama_barang'];
$stok_barang	= $_POST['stok_barang'] + $_POST['tambah_stock'];
$harga			= $_POST['harga'];

// $update = $conn->query("UPDATE tb_barang SET nama_barang = '".$nama_barang."', harga = '".$harga."' WHERE id='".$id."'");
$update = $conn->query("UPDATE tb_stock SET stock = '".$stok_barang."' WHERE id_barang='".$id."' AND id_user='".$_SESSION['id_user']."'");
if ($update) {
	header('Location: ../data-barang.php');
} else {
	header('Location: ../data-barang.php?h=edit-barang&id=2');
}