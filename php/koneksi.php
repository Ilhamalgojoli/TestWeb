<?php
$host = 'localhost';
$user = 'phpmyadmin';
$pass = '';
$db = 'plorars';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>