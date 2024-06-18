<?php
include '../../../php/login_check.php';
include '../../../php/koneksi.php';

$sql = "SELECT username FROM users";
$username = $_SESSION['username'];


$sql = "SELECT * FROM kegiatan WHERE id = 1";
$result = mysqli_query($conn, $sql);
$kegiatan = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="pemilihanTest.css" rel="stylesheet">
    <title>Plorars | Test Pemilihan</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="../../../images/navbar_logo.svg" alt="Plorars Logo">
            <nav>
                <ul>
                    <li class="home-text"><a href="../../../pages/homepage.php">Home</a></li>
                    <li class="discover-text"><a href="../../../pages/search.php">Discover</a></li>
                    <li class="test-text"><a href="test/PemilihanTest/pemilihan.php">Test</a></li>
                </ul>
            </nav>
            <div class="profile">
                <img src="../../../images/<?php echo $_SESSION['pfp'] ?>" alt="" onclick="toggleMenu()">
                <a href="../../profile/profile.php"><?php echo $username ?></a>
                <?php if ($_SESSION['username'] === 'Plorars') { ?>
                    <a href="../../../admin/kegiatan_management.php" style="color: blue;">Atur Kegiatan</a>
                <?php } ?>
            </div>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="view-profile">
                        <img src="../../../images/<?php echo $_SESSION['pfp'] ?>" alt="">
                        <a href="../../profile/profile.php">View Profile</a>
                        <span>></span>
                    </div>
                    <div class="log-out">
                        <img src="../../../images/log_out.png" alt="">
                        <a href="../../../php/log_out.php">Log Out</a>
                        <span>></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <img class="resize-img" src="image/Frame 138.png">
            <div class="layer-container">
                <div class="title-container">
                    <h1>Take a step towards</h1>
                    <div class="under-title">
                        <h2>understanding yourself better</h2>
                    </div>
                    <div class="test-container">
                        <div class="container-box">
                            <img class="img-test" src="image/Group 80.png">
                            <div class="box">
                                <h1>| Minat dan Bakat</h1>
                                <p>Test ini membantu Anda mengidentifikasi minat dan bakat unik, membimbing
                                    Anda dalam memilih karier atau kegiatan yang sesuai.
                                </p>
                                <a href="../Test Minat Bakat/testMinatBakat.php"><button name="test"><img src="image/Frame 34.png"></button></a>
                            </div>
                        </div>
                        <div class="container-box-MBTI">
                            <img class="img-test-MBTI" src="image/Group 81.png">
                            <div class="box">
                                <h1>| MBTI </h1>
                                <p>Tes MBTI ini membantu Anda mengidentifikasi minat dan bakat unik, membimbing Anda dalam memilih karier atau kegiatan yang sesuai.

                                </p>
                                <a href="../Test MBTI/testMBTI.php"><button name="test"><img src="image/Frame 34.png"></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-img">
                    <img src="../../../images/plorars_footer.png">
                </div>
                <p>Copyright © 2024 Plorars</p>
                <div class="contact-us">
                    <h3>Contact Us</h3>
                    <div class="socials">
                       <a href="https://mail.google.com/mail/?view=cm&fs=1&to=plorarsid@gmail.com&subject=Topik Pesan&body=Teks awal badan pesan" target="_blank">
                        <img src="../images/email.png" alt=""></a> 
                        <a href="https://wa.me/+6282268882235">
                        <img src="../images/whatsapp.png" alt=""></a>
                        <a href="https://www.instagram.com/plorarsid">
                        <img src="../images/instagram.png" alt=""> </a>  
                    </div>
                </div>
            </div>
            <script>
                const subMenu = document.getElementById("subMenu");

                function toggleMenu() {
                    subMenu.classList.toggle("open-menu");
                }
            </script>
</body>

</html>
