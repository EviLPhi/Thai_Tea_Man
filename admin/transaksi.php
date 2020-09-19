<?php 

session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'kasir') {
	header('Location: ../petugas/index.php');
}
if(isset($_GET['id_kasir'])){
	$id = $_GET['id_kasir'];
	$where = " WHERE tb_transaksi.id_user = $id";
}
else{
	$where="";
}

$tb_kasir 			= $conn->query("SELECT id, nama FROM tb_users WHERE jabatan = 'kasir'");
$data_kasir 		= $tb_kasir->fetch_all(MYSQLI_ASSOC);
$tb_transaksi 		= $conn->query("SELECT tb_transaksi.*, tb_barang.*, tb_users.* FROM tb_transaksi INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id INNER JOIN tb_users ON tb_transaksi.id_user = tb_users.id".$where);
$data_tb_transaksi 	= $tb_transaksi->fetch_all(MYSQLI_ASSOC);
$no = 1;

require_once 'includes/header.php';
require_once 'includes/transaksi.php';
require_once 'includes/footer.php';

?>