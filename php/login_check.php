<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: ../pages/sign_up.php');
  exit();
}
?>
