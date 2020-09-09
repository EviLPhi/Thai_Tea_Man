<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}

// Mengelurkan seluruh data barang yang ada di Databae
$sql 			= "SELECT * FROM tb_users WHERE jabatan = 'kasir'";
$query 			= $conn->query($sql);
$data_kasir 	= $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
if (!isset($_GET['h'])) {
	require_once 'includes/kasir.php';	
} else if ($_GET['h'] == 'tambah-kasir') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'detail-kasir') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'edit-kasir') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'hapus-kasir') {
	
	$hapus = $conn->query("DELETE FROM tb_users WHERE id='".$_GET['id']."'");
	if ($hapus) {
		header('Location: petugas-kasir.php');
	} else {
		header('Location: petugas-kasir.php');
	}

}
require_once 'includes/footer.php';