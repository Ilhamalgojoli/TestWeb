<?php
session_start();

require_once 'koneksi.php';

$error_messages = [];
$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username_register']);
    $password = $_POST['password_register'];
    $confirm_password = $_POST['confirm_password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = "Invalid email format";
    }

    if ($password != $confirm_password) {
        $error_messages[] = "Password do not match";
    }

    if (strlen($password) < 8) {
        $error_messages[] = "Password must be at least 8 characters long";
    }

    if (!empty($error_messages)) {
        $response['success'] = false;
        $response['errors'] = $error_messages;
        echo json_encode($response);
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed_password')";

    if (!mysqli_query($conn, $sql)) {
        $error_messages[] = "Database Error" . mysqli_error($conn);
        $_SESSION['error_messages'] = $error_messages;
        header('Location: ../pages/sign_up.php');
        exit();
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $response['success'] = true;
        echo json_encode($response);
        exit();  
    }
}
?>