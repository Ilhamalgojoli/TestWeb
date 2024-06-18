<?php
include '../php/login_check.php';
include '../php/koneksi.php';

$username = $_SESSION['username'];
if (!isset($_SESSION['email']) && isset($_SESSION['username'])) {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
    }
}

$currentId = $_GET['id'];
$sql = "SELECT * FROM kegiatan WHERE id = '$currentId'";
$result = mysqli_query($conn, $sql);
$kegiatan = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel = "stylesheet" href="../css/detailPages.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
    <script defer src="../js/navigation.js"></script>
    <title>Document</title>
</head>
<body>
<div class="navbar">
    <img src="../images/navbar_logo.svg" alt="Plorars Logo">
    <nav>
        <ul>
            <li class="home-text"><a href="homepage.php">Home</a></li>
            <li class="discover-text"><a href="search.php">Discover</a></li>
            <li class="test-text"><a href="test/PemilihanTest/pemilihan.php">Test</a></li>
        </ul>
    </nav>
    <div class="profile">
        <img src="../images/<?php echo $_SESSION['pfp'] ?>" alt="" onclick="toggleMenu()">
        <a href="#"><?php echo $username ?></a>
        <?php if ($_SESSION['username'] === 'Plorars') { ?>
            <a href="../admin/kegiatan_management.php" style="color: blue;">Atur Kegiatan</a>
        <?php } ?>
    </div>
    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="view-profile">
                <img src="../images/<?php echo $_SESSION['pfp'] ?>" alt="">
                <a href="./profile/profile.php">View Profile</a>
                <span>></span>
            </div>
            <div class="log-out">
                <img src="../images/log_out.png" alt="">
                <a href="../php/log_out.php">Log Out</a>
                <span>></span>
            </div>
        </div>
    </div>
</div>        
<div class="container">
    <div class="container-top">
        <div class="rounded-img">
            <img src = "../images/uploads/<?php echo $kegiatan['gambar'] ?>">
        </div>
        <div class="side-details">
            <h1><?php echo $kegiatan['judul']; ?></h1>
            <div class="detail-points">
                <div class="faculty">At Faculty: <?php echo $kegiatan['fakultas']; ?></div>
                <div class="link-group">Link: <a href="<?php echo $kegiatan['link']; ?>"><?php echo $kegiatan['link']; ?></a></div>
            </div>
        </div>
    </div>
    <div class="description">
        <h1>DESCRIPTION</h1>
        <p><?php echo $kegiatan['deskripsi']; ?></p>
    </div>
</div>
<div class="footer">
    <div class="footer-img">
        <img src="../images/plorars_footer.png" alt="">
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
