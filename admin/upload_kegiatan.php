<?php
include "admin_check.php";
include "../php/koneksi.php";

if (isset($_POST['submit']) && isset($_FILES['gambar'])) {
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $fakultas = mysqli_real_escape_string($conn, $_POST['fakultas']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $link = $_POST['link'];

    $img_name = $_FILES['gambar']['name'];
    $img_size = $_FILES['gambar']['size'];  
    $img_tmp_name = $_FILES['gambar']['tmp_name'];  
    $img_error = $_FILES['gambar']['error'];  

    if ($img_error != 0) {
        $em = "unknown error.";
        header("Location: kegiatan_management.php?error=$em");
    } else {
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ext_lwc = strtolower($img_ext);

        $allowed_exts = array("jpg", "jpeg", "png");

        if (!in_array($img_ext_lwc, $allowed_exts)) {
            $em = "You can't upload files of this type";
            header("Location: kegiatan_management.php?error=$em");  
        } else {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ext_lwc;
            $img_upload_path = '../images/uploads/'.$new_img_name;
            move_uploaded_file($img_tmp_name, $img_upload_path);

            $sql = "INSERT INTO kegiatan (kategori, fakultas, judul, deskripsi, gambar, link) 
            VALUES ('$kategori', '$fakultas', '$judul', '$deskripsi', '$new_img_name', '$link')";

            if (mysqli_query($conn, $sql)) {
                header("Location: kegiatan_management.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }  
} else {
    header("Location: kegiatan_management.php");
    exit();
}
?>