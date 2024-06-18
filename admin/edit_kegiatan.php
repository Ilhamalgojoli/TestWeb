<?php
include "admin_check.php";
include "../php/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
</head>
<body>
    <?php if (!isset($_GET['id'])) {
        echo "ID tidak valid.";
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM kegiatan WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Kegiatan tidak ditemukan";
        } else { ?>
            <h1>Edit Kegiatan</h1>
            <a href="kegiatan_management.php">Back</a>
            <form action="proses_edit_kegiatan.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                <label for="kategori">Kategori: </label>
                <select name="kategori" id="kategori">
                    <option value="Study Group" <?php if ($row['kategori'] == "Study Group") echo "selected" ?>>Study Group</option>
                    <option value="Unit Kegiatan Mahasiswa" <?php if ($row['kategori'] == "Unit Kegiatan Mahasiswa") echo "selected" ?>>Unit Kegiatan Mahasiswa</option>
                    <option value="Bootcamp" <?php if ($row['kategori'] == "Bootcamp") echo "selected" ?>>Bootcamp</option>
                </select><br>
                <label for="fakultas">Fakultas: </label>
                <select name="fakultas" id="fakultas">
                    <option value="None"<?php if ($row['fakultas'] == "None") echo "selected" ?>>None</option>
                    <option value="FIK" <?php if ($row['fakultas'] == "FIK") echo "selected" ?>>Fakultas Industri Kreatif</option>
                    <option value="FKB" <?php if ($row['fakultas'] == "FKB") echo "selected" ?>>Fakultas Komunikasi dan Bisnis</option>
                    <option value="FEB" <?php if ($row['fakultas'] == "FEB") echo "selected" ?>>Fakultas Ekonomi dan Bisnis</option>
                    <option value="FIF" <?php if ($row['fakultas'] == "FIF") echo "selected" ?>>Fakultas Informatika</option>
                    <option value="FTE" <?php if ($row['fakultas'] == "FTE") echo "selected" ?>>Fakultas Teknik Elektro</option>
                    <option value="FRI" <?php if ($row['fakultas'] == "FRI") echo "selected" ?>>Fakultas Rekayasa Industri</option>
                    <option value="FIT" <?php if ($row['fakultas'] == "FIT") echo "selected" ?>>Fakultas Ilmu Terapan</option>
                </select><br>
                <label for="judul">Nama Kegiatan: </label>
                <input type="text" name="judul" id="judul" value="<?php echo $row['judul'] ?>"><br>
                <label for="deskripsi">Deskripsi Kegiatan: </label>
                <textarea name="deskripsi" id="deskripsi"><?php echo $row['deskripsi'] ?></textarea><br>
                <label for="link">Link: </label>
                <input type="text" name="link" id="link" value="<?php echo $row['link'] ?>"><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        <?php }
    }?>
    
</body>
</html>