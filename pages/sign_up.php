<?php

session_start();
// $error_messages = $_SESSION['error_messages'] ?? [];
// unset($_SESSION['error_messages']);

if (isset($_COOKIE['remember_token'])) {
    require_once '../php/koneksi.php';
    
    $remember_token = $_COOKIE['remember_token'];

    $sql = "SELECT * FROM users WHERE remember_token = '$remember_token'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header('Location: homepage.php');
        exit();
    }
}

$email = $_SESSION['email'] ?? '';
$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/sign-up-styles.css">
    <title>Login Plorars</title>
    <script defer src="../js/loginRegister.js"></script>
    <script defer src="../js/handleFormSubmit.js"></script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="register-form">
                <h1 style="position: relative; text-transform: uppercase;">Create Account</h1>
                <div class = "register-in">
                    <input type = "email" name = "email" placeholder= "Email"required>
                    <input type = "text" name = "username_register" placeholder = "Username" required>
                    <input type = "password" name = "password_register" placeholder = "Password" required>
                    <input type = "password" name = "confirm_password" placeholder = "Confirm Password" required>
                </div>
                <span id="error-message-register"></span><br>
                <button style="top: 10px;" class = "btn-sign-up" type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form id="login-form">
                <div class="img-container">
                    <img class ="resize-img" src="../images/Vector.png" alt="logo">
                </div>
                <input type = "text" name = "username" placeholder = "Username" required>
                <input type = "password" name = "password" placeholder = "Password" required>
                <div class="checkbox-container">
                    <label class="checkbox-label" for ="rememberMe">
                        <input type="checkbox" class="checkbox-input" id="rememberMe" name="remember">
                        <p>Remember me<p>
                    </label>
                </div>
                <span id="error-message-login"></span><br>
                <div class = "forgot-pass">
                    <a>Forgot your password ?</a>
                    <a class ="click" href ="forgot-password/forgot-password.php">Click here</a><br>
                </div>
                <button type="submit" name="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <div class = "img-container-register">
                        <img class = "resize-img" src = "../images/Vector.png">
                        <div class = "title">
                            <p style="margin-top: 50px;" class = "resize-text">plorars</p1>
                        </div>
                    </div>
                    <div class="btn-sign-in">
                        <button class = "hidden"id="login">Sign In</button>
                    </div>
                </div>
                <div class="toggle-panel toggle-right">
                    <div class = "text-container">
                        <h2>Welcome Back !</h2>
                    </div>
                <div class = "title">
                    <h1 style="margin-left: 30px;">PLORARS</h1>
                </div>
                <div class = "group-img">
                    <img src = "../images/Group.png" class = "group-resize">
                </div>
                <p style="letter-spacing: 5px; font-size: 12px;" class = "text">if you dont have an account</p>
                <div class="btn-register">
                    <button style="top: 140px;" class="hidden" id="register">Sign Up</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>