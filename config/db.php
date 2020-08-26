<?php

try {
	$conn = new mysqli('localhost', 'root', '','db_kasir');
} catch (Exception $e) {
	echo $e->getMessage();
}