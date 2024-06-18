<?php
include '../../php/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $password_reset = "";

    $token_hash = hash("sha256", $token);

    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null) {
        $password_reset = "token_not_found";
    } elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
        $password_reset = "token_has_expired";
    } elseif (strlen($_POST["password"]) < 8) {
        $password_reset = "Password_must_be_at_least_8_characters";
    } elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
        $password_reset = "Password_must_contain_at_least_one_letter";
    } elseif (!preg_match("/[0-9]/", $_POST["password"])) {
        $password_reset = "Password_must_contain_at_least_one_number";
    } elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
        $password_reset = "Passwords_must_match";
    } elseif (password_verify($_POST["password"], $user["password"])) {
        $password_reset = "new_password_cant_be_same_as_the_old_password";
    } else {
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $password_hash, $user["id"]);
        $stmt->execute();
        $password_reset = "Password_updated_you_can_now_login";
    }

    echo json_encode($password_reset);
    exit; 
}
?>
