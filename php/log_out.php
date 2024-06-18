<?php
session_start();

include "koneksi.php";

setcookie('remember_token', '', time() - 3600, '/');
unset($_SESSION['username']);
unset($_SESSION['email']);
header('Location: ../pages/sign_up.php');
exit(); 
?>