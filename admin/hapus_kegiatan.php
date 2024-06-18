<?php
include "admin_check.php";
include "../php/koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM kegiatan WHERE id='$id'";
if (!mysqli_query($conn, $sql)) {
    header("refresh:3;url=kegiatan.management.php");
    echo "<p>Data gagal dihapus</p>";
} else {
    header("Location: kegiatan_management.php");
}
?>