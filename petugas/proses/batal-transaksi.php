<?php

session_start();
unset($_SESSION['list_pembelian'], $_SESSION['total_bayar']);
header('Location: ../index.php');