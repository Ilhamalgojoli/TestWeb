<?php   
include '../../php/login_check.php';
include '../../php/koneksi.php';
include 'display_bakat.php';
include 'mbti_recommendation.php';

$username = $_SESSION['username'];
$email = $_SESSION['email'];

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

    $results = array($result1, $result2, $result3);
    $randomResult = $results[array_rand($results)];
} else {
    $result1 = $result2 = $result3 = 'N/A';
}

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
    $info = 'N/A';
}

$sql_recommendation = "SELECT * FROM kegiatan WHERE judul IN ('$r1', '$r2')";
$result_recommendation = mysqli_query($conn, $sql_recommendation);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plorars | My Profile</title>
    <link rel="stylesheet" href="../../css/profile/profiles.css">
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
                <h1>My Profile</h1>
                <div class="header-right">
                    <a href=""><img src="../../images/profile/notifikasi.png" alt=""></a>
                    <a href=""><img class="profile-icon" src="../../images/<?php echo $_SESSION['pfp'] ?>" alt=""></a>
                </div>
            </div>

            <hr>
        </div>
        <div class="main">
            <div class="bio">
                <div class="bio-name">
                    <div class="pfp">
                        <img class="profile-pic" src="../../images/<?php echo $_SESSION['pfp'] ?>" alt="">
                        <div class="pencil-container">
                            <img class="pencil" src="../../images/profile/Pencil.png" alt="" onclick="activateFileInput()">
                        </div>
                        <form class="pfp-form" id="pfp-form" action="upload_pfp.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="pfp" id="pfp" onchange="form.submit()">
                        </form>
                    </div>
                    <h1><?php echo $username ?></h1>
                    <div class="mahasiswa">
                        <p>Mahasiswa</p>
                    </div>
                </div>
                <div class="bio-details">
                    <div class="email">
                        <p class="bio-details-title">Email</p>
                        <p class="bio-details-content"><?php echo $email ?></p>
                    </div>
                    <div class="fakultas">
                        <p class="bio-details-title">Fakultas</p>
                        <p class="bio-details-content">Fakultas Ilmu Terapan</p>
                    </div>
                    <div class="tahun-masuk">
                        <p class="bio-details-title">Tahun Masuk</p>
                        <p class="bio-details-content">2023</p>
                    </div>
                </div>            
            </div>
            <div class="main-right">
                <div class="main-right-top">
                    <div class="MBTI">  
                        <h1><?php echo isset($nama_mbti) ? $nama_mbti : 'N/A' ?></h1>
                        <?php if (isset($image_path)) { ?>
                        <img src="mbti-types/<?php echo $image_path ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="peran">
                        <h1><?php echo isset($randomResult) ? $randomResult : 'N/A' ?></h1>
                    </div>        
                </div>
                <div class="kegiatan">
                <?php if (isset($nama_mbti)) { ?>
                    <div class="kegiatan-judul">
                        <h1>Study Group</h1>
                        <hr> 
                    </div>
                    <p>Rekomendasi</p>
                    <?php while ($row = mysqli_fetch_assoc($result_recommendation)) { ?>
                    <div class="kegiatan-name">
                        <h3><?php echo $row['judul'] ?></h3>
                        <p><?php echo implode(' ', array_slice(explode(' ', $row['deskripsi']), 0, 25)) . ' ...' ?></p>
                        <hr>
                    </div>
                    <?php } ?>
                <?php } else { ?>
                    <h1 style="text-align: center;">N/A</h1>
                <?php } ?>
                </div>
            </div>
        </div>   
    </div>     
</div>

<script defer>
    function activateFileInput() {
        document.getElementById("pfp").click();
    }
</script>

</body>
</html>