<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'admin') {
	header('Location: ../admin/index.php');
}

// Mengelurkan seluruh data barang yang ada di Databae
$sql 			= "SELECT * FROM tb_barang";
$query 			= $conn->query($sql);
$data_barang 	= $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
if (!isset($_GET['h'])) {
	require_once 'includes/barang.php';	
} else if ($_GET['h'] == 'tambah') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'detail') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'edit-barang') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'hapus') {
	
	$hapus = $conn->query("DELETE FROM tb_barang b, tb_stock s WHERE s.id_barang='".$_GET['id']."' b.id='".$_GET['id']."'");
	if ($hapus) {
		header('Location: barang-barang.php');
	} else {
		header('Location: barang-barang.php');
	}

}
require_once 'includes/footer.php';