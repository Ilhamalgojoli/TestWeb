<?php
include '../../php/login_check.php';
include '../../php/koneksi.php';
include 'mbti_recommendation.php';

$sql = "SELECT * FROM kegiatan WHERE judul IN ('$r1', '$r2')";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plorars | My Group</title>
    <link rel="stylesheet" href="../../css/profile/groups.css">
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
                <h1>Study Group</h1>
                <div class="header-right">
                    <a href=""><img src="../../images/profile/notifikasi.png" alt=""></a>
                    <a href=""><img class="profile-icon" src="../../images/<?php echo $_SESSION['pfp'] ?>" alt=""></a>
                </div>
            </div>

            <hr>
        </div>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="main">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <a class="group-box" href="../details.php?id=<?php echo $row['id']; ?>">
                        <div class="group-top">
                            <img src="../../images/uploads/<?php echo $row['gambar']; ?>" alt="">
                        </div>
                        <div class="group-bottom">
                            <h3><?php echo $row['judul']; ?></h3>
                        </div>
                    </a>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="mbti-message">
                <h3>Anda belum mengisi tes MBTI!</h3>
                <a href="../../pages/test/PemilihanTest/pemilihan.php" class="mbti-link">Klik disini</a>
                untuk mengisi tes MBTI
            </div>
        <?php } ?>

    </div>

</html>