<?php
session_start();

require_once 'koneksi.php';

$error_messages = [];
$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $remember = $_POST['remember'] ?? null;

    if (empty($username) || empty($password)) {
        $error_messages[] = "All fields are required";
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $error_messages[] = "Database Error: " . mysqli_error($conn);
        } else {
            $row = mysqli_fetch_assoc($result);
            if (!$row) {
                $error_messages[] = "Username not found";   
            } else {
                if (!password_verify($password, $row['password'])) {
                    $error_messages[] = "Incorrect password";
                } else {
                    $_SESSION['username'] = $username;
                    // $_SESSION['email'] = $email;
                    $response['success'] = true;
                    echo json_encode($response);
                    
                    if (isset($_POST['remember'])) {
                        $token = base64_encode(openssl_random_pseudo_bytes(32));

                        $sql = "UPDATE users SET remember_token = '$token' WHERE username = '$username'";
                        $result = mysqli_query($conn, $sql);

                        setcookie('remember_token', $token, time() + (86400 * 7), '/');
                    }
                    exit();
                }
            }
        }
    }
    $response['success'] = false;
    $response['errors'] = $error_messages;
    echo json_encode($response);
    exit();
    
}
?>