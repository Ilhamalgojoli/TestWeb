<?php
include "admin_check.php";
include "../php/koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $fakultas = mysqli_real_escape_string($conn, $_POST['fakultas']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $link = $_POST['link'];

    $sql = "UPDATE kegiatan 
            SET kategori='$kategori', fakultas='$fakultas', judul='$judul', deskripsi='$deskripsi', link='$link'
            WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: kegiatan_management.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: kegiatan_management.php");
    exit();
}
?>