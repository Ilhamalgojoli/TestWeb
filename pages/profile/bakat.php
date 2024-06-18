<?php
include '../../php/login_check.php';
include '../../php/koneksi.php';
include 'display_bakat.php';

$userId = $_SESSION['userid'];
$sql = "SELECT result1, result2, result3 FROM minat_bakat_results WHERE user_id = '$userId'
        ORDER BY id DESC
        LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $result1 = $row['result1'];
    $result2 = $row['result2'];
    $result3 = $row['result3'];
} else {
    $result1 = $result2 = $result3 = 'N/A';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plorars | My Bakat</title>
    <link rel="stylesheet" href="../../css/profile/bakat.css">
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
                    <p href="">Bakat</p>
                </a>
            </div>
            <div class="group">
                <a href="group.php">
                    <img src="../../images/profile/bakat.png">
                    <p href="">Group</p>
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
                    <p href="">Hasil MBTI</p>
                </a>
            </div>
            <div class="bakat">
                <a href="">
                    <img src="../../images/profile/minat.png">
                    <p href="">Bakat</p>
                </a>
            </div>
            <div class="group">
                <a href="">
                    <img src="../../images/profile/bakat.png">
                    <p href="">Group</p>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <div class="header-section">
                <h1>My Bakat</h1>
                <div class="header-right">
                    <a href=""><img src="../../images/profile/notifikasi.png" alt=""></a>
                    <a href=""><img class="profile-icon" src="../../images/<?php echo $_SESSION['pfp'] ?>" alt=""></a>
                </div>
            </div>

            <hr>
        </div>
        <?php if ($result && mysqli_num_rows($result) > 0) { ?>
        <div class="main">
            <h1>Rekomendasi Detail Minat & Bakat Anda</h1>
            <div class="minat-bakat-menu">
                <div class="minat-bakat1">
                    <?php display_bakat($result1) ?>
                </div>
                <div class="minat-bakat2">
                    <?php display_bakat($result2) ?>
                </div>
                <div class="minat-bakat3">
                    <?php display_bakat($result3) ?>
                </div>
            </div>

        </div>
        <?php } else { ?>
            <div class="mbti-message">
                    <h3>Anda belum mengisi tes Minat dan Bakat!</h3>
                    <a href="../../pages/test/PemilihanTest/pemilihan.php" class="mbti-link">Klik disini</a> 
                    untuk mengisi tes Minat dan Bakat
                </div>
        <?php } ?>
    </div>

</html>