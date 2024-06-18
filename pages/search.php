<?php
include '../php/login_check.php';
include '../php/koneksi.php';

$username = $_SESSION['username'];

$category = isset($_GET['category']) ? $_GET['category'] : '';
$fakultas = isset($_GET['fakultas']) ? $_GET['fakultas'] : '';
$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM kegiatan";

if ($category == 'sg') {
    $sql .= " WHERE kategori = 'Study Group'";
} elseif ($category == 'ukm') {
    $sql .= " WHERE kategori = 'Unit Kegiatan Mahasiswa'";
}

if ($fakultas && $fakultas != 'Fakultas') {
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND fakultas = '$fakultas'";
    } else {
        $sql .= " WHERE fakultas = '$fakultas'";
    }
}

if ($query) {
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND judul LIKE '%$query%'";
    } else {
        $sql .= " WHERE judul LIKE '%$query%'";
    }
}

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
    <title>Plorars | Search</title>
    <link rel="stylesheet" href="../css/search-styles.css">
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
        <div class="heading">
            <h1>Temukan <span>Kegiatan</span> yang <span>Tepat</span> untukmu!</h1>
        </div>
        <div class="search">
            <form action="" method="GET">
                <div class="options">
                    <div class="search-bar">
                        <img src="../images/search_icon.png" alt="">
                        <input type="search" name="query" id="query" placeholder="Cari Kegiatan" value="<?php if (isset($_GET['query'])) echo $_GET['query'] ?>">
                    </div>
                    <div class="select">
                        <div class="kategori">
                            <select name="category" id="category">
                                <option value="Kategori">Kategori</option>
                                <option value="sg" <?php if ($category == 'sg') echo "selected" ?>>Study Group</option>
                                <option value="ukm" <?php if ($category == 'ukm') echo "selected" ?>>UKM</option>
                            </select>
                            <img src="../images/arrow_down.png" alt="">
                        </div>
                        <div class="fakultas">
                            <select name="fakultas" id="fakultas">
                                <option value="Fakultas">Fakultas</option>
                                <option value="FIK" <?php if ($fakultas == 'FIK') echo "selected" ?>>FIK</option>
                                <option value="FKB" <?php if ($fakultas == 'FKB') echo "selected" ?>>FKB</option>
                                <option value="FEB" <?php if ($fakultas == 'FEB') echo "selected" ?>>FEB</option>
                                <option value="FIF" <?php if ($fakultas == 'FIF') echo "selected" ?>>FIF</option>
                                <option value="FTE" <?php if ($fakultas == 'FTE') echo "selected" ?>>FTE</option>
                                <option value="FRI" <?php if ($fakultas == 'FRI') echo "selected" ?>>FRI</option>
                                <option value="FIT" <?php if ($fakultas == 'FIT') echo "selected" ?>>FIT</option>
                            </select>
                            <img src="../images/arrow_down.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="search-btn-container">
                    <button class="search-btn">Cari<img src="../images/arrow_icon.png" alt=""></button>
                </div>
            </form>
        </div>
        <div class="kegiatan">
            <div class="kegiatan-grid">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <?php while ($kegiatan = mysqli_fetch_assoc($result)) { ?>
                        <div class="kegiatan-box">
                            <div class="kegiatan-top">
                                <img src="../images/uploads/<?php echo $kegiatan['gambar'] ?>" alt="">
                            </div>
                            <div class="kegiatan-bottom">
                                <p class="kegiatan-kategori"><?php echo $kegiatan['kategori']; ?></p>
                                <div class="kegiatan-judul">
                                    <img src="../images/uploads/<?php echo $kegiatan['gambar'] ?>" alt="">
                                    <h1><?php echo $kegiatan['judul']; ?></h1>
                                </div>
                                <p class="kegiatan-desc"><?php echo $kegiatan['deskripsi']; ?></p>
                                <div class="selengkapnya">
                                    <a href="details.php?id=<?php echo $kegiatan['id']; ?>">Selengkapnya</a>
                                    <img src="../images/selengkapnya_arrow.png" alt="">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
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
        const query = document.getElementById("query");
        query.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("search-form").submit();
            }
        });
    </script>

</body>

</html>
