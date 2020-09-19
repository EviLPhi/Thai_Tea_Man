<?php
session_start();
require_once '../config/db.php';


if(isset($_GET['pesand'])){
	if($_GET['pesand'] == "gagal"){
		echo '<script language="javascript">alert("Hapus Gagal")</script>';
	}else if($_GET['pesand'] == "logout"){
		echo '<script language="javascript">alert("Hapus Berhasil")</script>';
	}
}

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'kasir') {
	header('Location: ../petugas/index.php');
}

$tb_kasir 			= $conn->query("SELECT id, nama FROM tb_users WHERE jabatan = 'kasir'");
$data_kasir 		= $tb_kasir->fetch_all(MYSQLI_ASSOC);

if(isset($_GET['id_kasir'])){
	$id_kasir = $_GET['id_kasir'];
	$nama_kasir = $data_kasir[searchForId($id_kasir,$data_kasir,'id')]['nama'];
	$where = "WHERE s.id_user = $id_kasir";
}
else{
	$id_kasir = $data_kasir[0]['id'];
	$nama_kasir = $data_kasir[0]['nama'];
	$where = "WHERE s.id_user = $id_kasir";
}

// Mengelurkan seluruh data barang yang ada di Databae
$sql 			= "SELECT * FROM tb_barang b JOIN tb_stock s ON b.id=s.id_barang ".$where;
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
	
	$hapus = $conn->query("DELETE FROM tb_barang , tb_stock USING tb_barang JOIN tb_stock ON tb_barang.id=tb_stock.id_barang WHERE tb_barang.id='".$_GET['id']."' AND tb_stock.id_barang='".$_GET['id']."'");
	if ($hapus) {
		header('Location: data-barang.php?pesand=berhasil&id_kasir='.$id_kasir);
	} else {
		header('Location: data-barang.php?pesand=gagal&id_kasir='.$id_kasir);
	}

}
require_once 'includes/footer.php';

function searchForId($id, $array, $text) {
	foreach ($array as $key => $val) {
		if ($val[$text] === $id) {
			return $key;
		}
	}
	return null;
 }