<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'chat';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal Terhubung ke database');
