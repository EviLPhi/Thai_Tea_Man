<?php
session_start();
require_once '../config/db.php';

if(isset($_GET['pesand'])){
	if($_GET['pesand'] == "gagal"){
		echo '<script language="javascript">alert("Hapus Gagal")</script>';
	}else if($_GET['pesand'] == "berhasil"){
		echo '<script language="javascript">alert("Hapus Berhasil")</script>';
	}
}

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'kasir') {
	header('Location: ../petugas/index.php');
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
	$hapus = $conn->query("DELETE FROM tb_users, tb_stock USING tb_users JOIN tb_stock ON tb_users.id=tb_stock.id_user WHERE tb_users.id='".$_GET['id']."' AND tb_stock.id_user='".$_GET['id']."'");
	if ($hapus) {
		header('Location: petugas-kasir.php?pesand=berhasil');
	} else {
		header('Location: petugas-kasir.php?pesand=gagal');
	}

}
require_once 'includes/footer.php';