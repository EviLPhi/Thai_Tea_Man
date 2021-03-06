<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'admin') {
	header('Location: ../admin/index.php');
}

$id = $_SESSION['id_user'];

// Mengelurkan seluruh data barang yang ada di Databae
$sql 			= "SELECT * FROM tb_barang b JOIN tb_stock s ON b.id=s.id_barang WHERE s.id_user='$id'";
$query 			= $conn->query($sql);
$data_barang 	= $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
if (!isset($_GET['h'])) {
	require_once 'includes/dashboard.php';	
} else if ($_GET['h'] == 'barang') {
	require_once 'includes/'.$_GET['h'].'.php';	
}
require_once 'includes/footer.php';