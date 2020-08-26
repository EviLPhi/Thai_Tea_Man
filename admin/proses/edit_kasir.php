<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$nama 	= $_POST['nama'];
$id = $_POST['id'];
$password = md5($_POST['password']);

$update = $conn->query("UPDATE tb_users SET nama = '".$nama."', password = '".$password."' WHERE id = '".$id."'");

if ($update) {
	header('Location: ../petugas-kasir.php');
} else {
	header('Location: ../petugas-kasir.php?h=edit-kasir&id=2');
}