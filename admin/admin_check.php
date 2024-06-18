<?php
session_start();

if ($_SESSION['username'] != 'Plorars') {
  header('Location: ../pages/homepage.php');
  exit();
}
?>