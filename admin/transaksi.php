<?php 
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php?pesan=belum_login');
}
if ($_SESSION['jabatan'] == 'kasir') {
	header('Location: ../petugas/index.php');
}
$tb_kasir 		= $conn->query("SELECT id, nama FROM tb_users WHERE jabatan = 'kasir'");
$data_kasir 	= $tb_kasir->fetch_all(MYSQLI_ASSOC);
$sysdate  		= $conn->query("SELECT DATE_FORMAT(SYSDATE(), '%Y-%m')")->fetch_row();
$sysdate  		= $sysdate[0];
if(isset($_POST['id_kasir']) && $_POST['id_kasir']>0){
	$sysdate = $_POST['date'];
	$nama_kasir = $data_kasir[searchForId($_POST['id_kasir'],$data_kasir,'id')]['nama'];
	$id = $_POST['id_kasir'];
	$where = " WHERE tb_transaksi.id_user = $id AND DATE_FORMAT(tb_transaksi.tanggal_transaksi, '%Y-%m') = '$sysdate'";
}
else{
	if(isset($_POST['id_kasir']) && $_POST['id_kasir']==0){$sysdate = $_POST['date']; $_POST['id_kasir'];}
	$nama_kasir = "All";
	$where=" WHERE DATE_FORMAT(tb_transaksi.tanggal_transaksi, '%Y-%m') = '$sysdate'";
}
$tb_transaksi 		= $conn->query("SELECT tb_transaksi.*, tb_barang.*, tb_users.nama, (tb_barang.harga * tb_transaksi.jumlah_barang) AS Total FROM tb_transaksi INNER JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id INNER JOIN tb_users ON tb_transaksi.id_user = tb_users.id".$where);
$data_tb_transaksi 	= $tb_transaksi->fetch_all(MYSQLI_ASSOC);

$no = 1;

$total = [];
for ($i=0; $i < $tb_transaksi->num_rows; $i++) { 
	array_push($total, $data_tb_transaksi[$i]['Total']);
}
$total_transaksi = array_sum($total);

require_once 'includes/header.php';
require_once 'includes/transaksi.php';
require_once 'includes/footer.php';

function searchForId($id, $array, $text) {
	foreach ($array as $key => $val) {
		if ($val[$text] === $id) {
			return $key;
		}
	}
	return null;
 }
?>