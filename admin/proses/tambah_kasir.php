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

if ($query) {
	$conn->query("INSERT INTO tb_stock (id_barang, id_user) SELECT b.id, u.id FROM tb_users u JOIN tb_barang b WHERE u.id=(SELECT MAX(id) FROM tb_users)");
	header('Location: ../petugas-kasir.php');
} else {
	header('Location: ../petugas-kasir.php?h=tambah');
}