<?php
include '../../php/koneksi.php';
include '../../php/login_check.php';

if (isset($_FILES['pfp'])) {
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $username = $_SESSION['username'];
    $pfp = $_FILES['pfp']['name'];
    $pfp_tmp = $_FILES['pfp']['tmp_name'];
    $pfp_ext = pathinfo($pfp, PATHINFO_EXTENSION);

    if (!in_array(strtolower($pfp_ext), $allowed_extensions)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    $new_pfp_name = $username . '_' . time() . '.' . $pfp_ext;

    $sql = "UPDATE users SET pfp = '$new_pfp_name' WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        move_uploaded_file($pfp_tmp, '../../images/' . $new_pfp_name);
        $_SESSION['pfp'] = $new_pfp_name;
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: No file uploaded.";
}
?>
