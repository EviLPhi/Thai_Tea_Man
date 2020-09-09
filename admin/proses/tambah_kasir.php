<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$nama 		= $_POST['nama'];
$password 	= md5($_POST['password']);
$jabatan 	= 'kasir';

if (!isset($nama, $password, $jabatan)) {
	header('Location: ../petugas-kasir.php?h=tambah');
}

$sql = "INSERT INTO `tb_users`(`id`, `nama`, `password`, `jabatan`) VALUES ('', '".$nama."', '".$password."', '".$jabatan."')";
$query = $conn->query($sql);

// $add = "ALTER TABLE tb_barang ADD 'stock_".$nama."' INT DEFAULT 0";

if ($query) {
	// $conn->query($add);
	header('Location: ../petugas-kasir.php');
} else {
	header('Location: ../petugas-kasir.php?h=tambah');
}