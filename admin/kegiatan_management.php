<?php
include "admin_check.php";
include "../php/koneksi.php";

$sql = "SELECT * FROM kegiatan";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Kegiatan</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f8f8;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
    <script defer>
        function confirmDelete(id) {
            if (confirm("Hapus data ini?") == true) {
                window.location.href = 'hapus_kegiatan.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <h1>Input Kegiatan</h1>
    <a href="../pages/homepage.php">Back</a>
    <form action="upload_kegiatan.php" method="POST" enctype="multipart/form-data">
        <label for="kategori">Kategori: </label>
        <select name="kategori" id="kategori">
            <option value="Study Group">Study Group</option>
            <option value="Unit Kegiatan Mahasiswa">Unit Kegiatan Mahasiswa</option>
        </select><br>
        <label for="fakultas">Fakultas: </label>
        <select name="fakultas" id="fakultas">
            <option value="None">None</option>
            <option value="FIK">Fakultas Industri Kreatif</option>
            <option value="FKB">Fakultas Komunikasi dan Bisnis</option>
            <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
            <option value="FIF">Fakultas Informatika</option>
            <option value="FTE">Fakultas Teknik Elektro</option>
            <option value="FRI">Fakultas Rekayasa Industri</option>
            <option value="FIT">Fakultas Ilmu Terapan</option>
        </select><br>
        <label for="judul">Nama Kegiatan: </label>
        <input type="text" name="judul" id="judul"><br>
        <label for="deskripsi">Deskripsi Kegiatan: </label>
        <textarea name="deskripsi" id="deskripsi"></textarea><br>
        <label for="link">Link: </label>
        <input type="text" name="link" id="link"><br>
        <label for="gambar">Gambar: </label>
        <input type="file" name="gambar" id="gambar"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php if (isset($_GET['error'])) { ?>
        <p><?php echo $_GET['error'] ?></p>
    <?php } ?>

    <hr>

    <?php if (mysqli_num_rows($result) > 0) { ?>
    <table>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Fakultas</th>
            <th>Link</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><img src="../images/uploads/<?php echo $row['gambar'] ?>"></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['fakultas']; ?></td>
            <td><?php echo $row['link']; ?></td>
            <td><a href="edit_kegiatan.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="#" onclick="confirmDelete(<?php echo $row['id']; ?>)">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php 
    } else {
        echo '<div class="empty-message">Data tabel atau kegiatan kosong</div>';
    }
    ?>

</body>
</html>