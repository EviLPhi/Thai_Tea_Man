<?php

session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php');
}


require_once 'includes/header.php';
require_once 'includes/dashboard.php';
require_once 'includes/footer.php';