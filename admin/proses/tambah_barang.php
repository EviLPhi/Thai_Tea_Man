<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$nama_barang 	= $_POST['nama_barang'];
$jenis_barang 	= $_POST['jenis_barang'];
$harga_barang 	= $_POST['harga'];

if (!isset($nama_barang, $stok_barang, $jenis_barang)) {
	header('Location: ../data-barang.php?h=tambah');
}

$sql = "INSERT INTO `tb_barang`(`id`, `nama_barang`, `jenis_barang`,`harga`) VALUES ('', '".$nama_barang."', '".$jenis_barang."', '".$harga_barang."')";
$query = $conn->query($sql);

if ($query) {
	$conn->query("INSERT INTO tb_stock (id_barang, id_user) SELECT b.id, u.id FROM tb_barang b JOIN tb_users u WHERE u.id != 1 AND b.id=(SELECT MAX(id) FROM tb_barang)");
	header('Location: ../data-barang.php');
} else {
	header('Location: ../data-barang.php?h=tambah');
}