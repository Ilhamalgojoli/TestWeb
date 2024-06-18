<?php
include '../../php/login_check.php';
include '../../php/koneksi.php';

$userId = $_SESSION['userid'];
$mbti_sql = "SELECT mbti_type FROM mbti_results WHERE user_id = '$userId'
        ORDER BY id DESC
        LIMIT 1";
$mbti_result = mysqli_query($conn, $mbti_sql);

if ($mbti_result && mysqli_num_rows($mbti_result) > 0) {
    $row = mysqli_fetch_assoc($mbti_result);
    $mbti_type = $row['mbti_type'];
} else {
    $mbti_type = 'N/A';
}

$mbti_info_sql = "SELECT * FROM mbti_info WHERE mbti_type = '$mbti_type'";
$mbti_info_result = mysqli_query($conn, $mbti_info_sql);

if ($mbti_info_result && mysqli_num_rows($mbti_info_result) > 0) {
    $row = mysqli_fetch_assoc($mbti_info_result);
    $image_path = $row['image_path'];
    $nama_mbti = $row['nama_mbti'];
    $deskripsi = $row['deskripsi'];
} else {
    $image_path = '';
    $nama_mbti = 'N/A';
    $deskripsi = 'N/A';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plorars | My MBTI</title>
    <link rel="stylesheet" href="../../css/profile/mbti.css">
</head>

<body>
    <div class="bg-blue"></div>
    <div class="sidebar">
        <a href="../homepage.php"><img src="../../images/profile/logo.png" class="logo"></a>
        <div class="menu">
            <div class="hasil-MBTI">
                <a href="mbti.php">
                    <img src="../../images/profile/mbti.png">
                    <p>Hasil MBTI</p>
                </a>
            </div>
            <div class="bakat">
                <a href="bakat.php">
                    <img src="../../images/profile/minat.png">
                    <p>Bakat</p>
                </a>
            </div>
            <div class="group">
                <a href="group.php">
                    <img src="../../images/profile/bakat.png">
                    <p>Group</p>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-placeholder">
        <img src="../../images/profile/logo.png" class="logo">
        <div class="menu">
            <div class="hasil-MBTI">
                <a href="">
                    <img src="../../images/profile/mbti.png">
                    <p>Hasil MBTI</p>
                </a>
            </div>
            <div class="bakat">
                <a href="">
                    <img src="../../images/profile/minat.png">
                    <p>Bakat</p>
                </a>
            </div>
            <div class="group">
                <a href="">
                    <img src="../../images/profile/bakat.png">
                    <p>Group</p>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <div class="header-section">
                <h1>My MBTI</h1>
                <div class="header-right">
                    <a href=""><img src="../../images/profile/notifikasi.png" alt=""></a>
                    <a href=""><img class="profile-icon" src="../../images/<?php echo $_SESSION['pfp'] ?>" alt=""></a>
                </div>
            </div>
            <hr>
        </div>
        <div class="main">
            <?php if ($mbti_type != 'N/A') { ?>
                <div class="gambar-mbti">
                    <div class="gambar-mbti-judul">
                        <h1 id="mbti-type"><?php echo $mbti_type; ?></h1>
                        <hr>
                    </div>
                    <img src="mbti-types/<?php echo $image_path; ?>" alt="">
                </div>
                <div class="stats-mbti">
                    <div class="stats-mbti-judul">
                        <h1>Sifat - sifat Kepribadian</h1>
                        <hr>
                    </div>
                    <p><?php echo $deskripsi; ?></p>
                    <div class="stats-mbti-bar">
                        <div class="energi">
                            <p>Energi: <span class="mbti-bold"><span class="mbti-energi-color">Ekstrover</span></span></p>
                            <div class="energi-bar">
                                <div class="energi-bar-fill"></div>
                            </div>
                            <div class="energi-chart">
                                <p>Ekstrover</p>
                                <p>Introver</p>
                            </div>
                        </div>
                        <div class="pola-pikir">
                            <p>Pola Pikir: <span class="mbti-bold"><span class="mbti-pola-pikir-color">Penyimak</span></span></p>
                            <div class="pola-pikir-bar">
                                <div class="pola-pikir-bar-fill"></div>
                            </div>
                            <div class="pola-pikir-chart">
                                <p>Intuitif</p>
                                <p>Penyimak</p>
                            </div>
                        </div>
                        <div class="sifat">
                            <p>Sifat: <span class="mbti-bold"><span class="mbti-sifat-color">Pemikir</span></span></p>
                            <div class="sifat-bar">
                                <div class="sifat-bar-fill"></div>
                            </div>
                            <div class="sifat-chart">
                                <p>Pemikir</p>
                                <p>Perasa</p>
                            </div>
                        </div>
                        <div class="taktik">
                            <p>Taktik: <span class="mbti-bold"><span class="mbti-taktik-color">Penilai</span></span></p>
                            <div class="taktik-bar">
                                <div class="taktik-bar-fill"></div>
                            </div>
                            <div class="taktik-chart">
                                <p>Penilai</p>
                                <p>Eksploratif</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="mbti-message">
                    <h3>Anda belum mengisi tes MBTI!</h3>
                    <a href="../../pages/test/PemilihanTest/pemilihan.php" class="mbti-link">Klik disini</a> 
                    untuk mengisi tes MBTI
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        let mbtiType = document.getElementById('mbti-type');
        let letters = mbtiType.textContent.split('');

        function setBarDirectionAndColor() {

            if (letters[0] === 'I') {
                document.querySelector('.energi-bar').classList.add('bar-kanan');
                document.querySelector('.mbti-energi-color').textContent = 'Introver';
            } else {
                document.querySelector('.energi-bar').classList.add('bar-kiri');
                document.querySelector('.mbti-energi-color').textContent = 'Ekstrover';
            }

            if (letters[1] === 'S') {
                document.querySelector('.pola-pikir-bar').classList.add('bar-kanan');
                document.querySelector('.mbti-pola-pikir-color').textContent = 'Penyimak';
            } else {
                document.querySelector('.pola-pikir-bar').classList.add('bar-kiri');
                document.querySelector('.mbti-pola-pikir-color').textContent = 'Intuitif';
            }

            if (letters[2] === 'T') {
                document.querySelector('.sifat-bar').classList.add('bar-kiri');
                document.querySelector('.mbti-sifat-color').textContent = 'Pemikir';
            } else {
                document.querySelector('.sifat-bar').classList.add('bar-kanan');
                document.querySelector('.mbti-sifat-color').textContent = 'Perasa';
            }

            if (letters[3] === 'J') {
                document.querySelector('.taktik-bar').classList.add('bar-kiri');
                document.querySelector('.mbti-taktik-color').textContent = 'Penilai';
            } else {
                document.querySelector('.taktik-bar').classList.add('bar-kanan');
                document.querySelector('.mbti-taktik-color').textContent = 'Eksploratif';
            }
            
        }

        setBarDirectionAndColor();
    </script>

</body>

</html>