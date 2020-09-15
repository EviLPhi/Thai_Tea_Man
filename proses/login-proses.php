<?php

session_start();
require_once '../config/db.php';

$nama 		= mysqli_real_escape_string($conn,$_POST['nama']);
$password	= mysqli_real_escape_string($conn,md5($_POST['password']));

if (empty($nama) || empty($password)) {
	header('Location: ../index.php');
}

$sql 	= "SELECT * FROM tb_users WHERE nama = '".$nama."' AND password = '".$password."'";
$query 	= $conn->query($sql);
$result = $query->fetch_assoc();

$jabatan =$result['jabatan'];

if ($query->num_rows > 0) {
	
	$_SESSION['user'] = $result['nama'];
	$_SESSION['id_user'] = $result['id'];
	$_SESSION['jabatan'] = $result['jabatan'];
	
	if ($result['jabatan'] == 'admin') {
		header('Location: ../admin/index.php');
	} else {
		header('Location: ../petugas/index.php');
	}

} else {
	header('Location: ../index.php?pesan=gagal');
	
}