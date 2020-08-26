<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$nama_barang 	= $_POST['nama_barang'];
$stok_barang 	= $_POST['stok_barang'];
$jenis_barang 	= $_POST['jenis_barang'];
$harga_barang 	= $_POST['harga'];

if (!isset($nama_barang, $stok_barang, $jenis_barang)) {
	header('Location: ../data-barang.php?h=tambah');
}

$sql = "INSERT INTO `tb_barang`(`id`, `nama_barang`, `stok_barang`, `jenis_barang`,`harga`) VALUES ('', '".$nama_barang."', '".$stok_barang."', '".$jenis_barang."', '".$harga_barang."')";
$query = $conn->query($sql);

if ($query) {
	header('Location: ../data-barang.php');
} else {
	header('Location: ../data-barang.php?h=tambah');
}