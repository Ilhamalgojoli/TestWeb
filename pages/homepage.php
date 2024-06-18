<?php
include '../php/login_check.php';
include '../php/koneksi.php';

if (isset($_COOKIE['remember_token'])) {
    $remember_token = $_COOKIE['remember_token'];
    $sql = "SELECT * FROM users WHERE remember_token = '$remember_token'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['userid'] = $row['id'];
        $_SESSION['pfp'] = $row['pfp'];
    }
}else{
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sql_photo = "SELECT pfp FROM users WHERE username = '$username'";
        $result_photo = mysqli_query($conn, $sql_photo);
            if($result_photo && mysqli_num_rows($result_photo) === 1){
                $row = mysqli_fetch_assoc($result_photo);
                $_SESSION['pfp'] = $row['pfp'];
            }
    }
}

$sql_kegiatan = "SELECT * FROM kegiatan";
$result_kegiatan = mysqli_query($conn, $sql_kegiatan);

if (!$result_kegiatan) {
    die("Error: " . mysqli_error($conn));
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (!isset($_SESSION['email'])) {
        $sql_user = "SELECT * FROM users WHERE username = '$username'";
        $result_user = mysqli_query($conn, $sql_user);

        if ($result_user && mysqli_num_rows($result_user) === 1) {
            $row = mysqli_fetch_assoc($result_user);
            $_SESSION['email'] = $row['email'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['pfp'] = $row['pfp'];
        }
    } else {
        $_SESSION['userid'] = $row['id'] ?? null;
        $_SESSION['pfp'] = $row['pfp'] ?? null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plorars | Homepage</title>
    <link rel="stylesheet" href="../css/homepage-styles.css">
    <script defer src="../js/navigation.js"></script>
</head>

<body>
    <div class="container">
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
                <a href="profile/profile.php"><?php echo $username ?></a>
                <?php if ($_SESSION['username'] === 'Plorars') { ?>
                    <a href="../admin/kegiatan_management.php" style="color: blue;">Atur Kegiatan</a>
                <?php } ?>
            </div>

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="view-profile">
                        <img src="../images/<?php echo $_SESSION['pfp'] ?>" alt="">
                        <a href="profile/profile.php">View Profile</a>
                        <span></span>
                    </div>
                    <div class="log-out">
                        <img src="../images/log_out.png" alt="">
                        <a href="../php/log_out.php">Log Out</a>
                        <span>></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="welcome-user">
            <div class="welcome-bg">
                <img src="../images/welcome_background.png" alt="">
                <div class="welcome-text">
                    <h1>Welcome, <?php echo $username ?>!</h1>
                </div>
            </div>

        </div>
        <div class="discover">
            <div class="discover-text subheader">
                <img src="../images/blue_line.png" alt="">
                <h1>Discover</h1>
            </div>
            <div class="discover-menu">
                <div class="search">
                    <form action="search.php" method="GET">
                        <img src="../images/search_icon.png" alt="">
                        <input type="search" name="query" id="query" placeholder="Cari Kegiatan">
                    </form>
                </div>
                <div class="categories">
                    <a href="search.php?category=sg">
                        <div class="study-group">
                            <span>📚</span>
                            <span>Study Group</span>
                        </div>
                    </a>
                    <a href="search.php?category=ukm">
                        <div class="ukm">
                            <span>🎉</span>
                            <span>Unit Kegiatan Mahasiswa</span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="test">
            <div class="subheader">
                <img src="../images/blue_line.png" alt="">
                <h1>Test</h1>
            </div>
            <div class="test-banner">
                <a href="test/PemilihanTest/pemilihan.php">
                    <img src="../images/test_banner.png" alt="">
                </a>
            </div>
        </div>
        <div class="kegiatan">
            <div class="subheader">
                <img src="../images/blue_line.png" alt="">
                <h1>Semua Kegiatan</h1>
                <a href="search.php">
                    <img src="../images/arrow_icon_kegiatan.png" alt="">
                </a>

            </div>
            <div class="kegiatan-grid">
                <?php if (mysqli_num_rows($result_kegiatan) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($result_kegiatan)) { ?>
                        <div class="kegiatan-box">
                            <div class="kegiatan-top">
                                <img src="../images/uploads/<?php echo $row['gambar'] ?>" alt="">
                            </div>
                            <div class="kegiatan-bottom">
                                <p class="kegiatan-kategori"><?php echo $row['kategori']; ?></p>
                                <div class="kegiatan-judul">
                                    <img src="../images/uploads/<?php echo $row['gambar'] ?>" alt="">
                                    <h1><?php echo $row['judul']; ?></h1>
                                </div>
                                <p class="kegiatan-desc"><?php echo $row['deskripsi']; ?></p>
                                <div class="selengkapnya">
                                    <a href="details.php?id=<?php echo $row['id']; ?>">Selengkapnya</a>
                                    <img src="../images/selengkapnya_arrow.png" alt="">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
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
    </div>

    <script>
        const subMenu = document.getElementById("subMenu");
            function toggleMenu() {
                subMenu.classList.toggle("open-menu");
            }
    </script>

</body>

</html>
