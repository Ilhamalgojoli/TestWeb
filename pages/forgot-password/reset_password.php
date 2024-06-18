<?php

include '../../php/koneksi.php';

$token = $_GET["token"];

$token_hash = hash("sha256", $token);


$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $conn ->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<style>
    .input-container input{
        position: relative;
        border: 2px solid white;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        background-color: transparent;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        padding: 10px;
        outline: none;
        width: 300px;
        bottom: 80px;
    }
    .container-password{
        background: rgba(255,255,255,0.2);
        backdrop-filter:blur(10px);
        border-radius: 20px;
        border: 2px solid white;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: auto;
        max-width: 120%;
        min-height: 480px;
    }
    .container-password h1{
        text-align: center;
        background: linear-gradient(to right,#394673, 70%, #023AFF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-transform: uppercase;
        margin-top: 50px;
    }
    .container-password button{
        position: relative;
        top: -40px;
        justify-content: center;
        white-space: nowrap;
        align-items: center;
        text-align: center;
        font-size: 100;
        left: 0;
        display: flex;
        width: 250px;
        height: auto;
    }
    .container-password h4{
        text-align: center;
        position: relative;
        top: 35px;
        background: linear-gradient(to right,#394673, 70%, #023AFF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-transform: uppercase;
    }
    #message {
        position: relative;
        top: 20px;
        display: flex;
        justify-content: center;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        color: red; 
    }
</style>
<body>
    <div class= "container-password">
    <h1>Reset Password</h1>
    <h4>Input new password</h4>
    <form method="POST" action="proses_reset_password.php">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
    <div class = "input-container">        
        <input type="password" id="password" name="password" placeholder = "new password">
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder = "confirm password">
    </div>
        <button id = "password-btn">Reset password</button>
        <div id = "message"></div>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#password-btn").click(function(e){
            e.preventDefault(); 

            var password = $("#password").val();
            var password_confirmation = $("#password_confirmation").val();

            $.ajax({
                type: "POST",
                url: "proses_reset_password.php",
                data: {password: password, password_confirmation: password_confirmation, token: "<?php echo htmlspecialchars($token); ?>"},
                dataType: "json",
                success: function(response){
                    var reset_password = $("#message");
                    reset_password.empty();

                    if(response.includes("Password_must_be_at_least_8_characters")){
                        reset_password.text("Password must be at least 8 characters long").css("color", "red");
                    } else if(response.includes("Password_must_contain_at_least_one_letter")){
                        reset_password.text("Password must contain at least one letter").css("color", "red");
                    } else if(response.includes("Password_must_contain_at_least_one_number")){
                        reset_password.text("Password must contain at least one number").css("color", "red");
                    } else if(response.includes("Passwords_must_match")){
                        reset_password.text("Passwords must match").css("color", "red");
                    } else if(response.includes("Password_updated_you_can_now_login")){
                        reset_password.text("Password updated, you can now login.").css("color", "green");
                    } else if(response.includes("new_password_cant_be_same_as_the_old_password")){
                        reset_password.text("New password can't be the same as the old password").css("color", "red");
                    } else if(response.includes("token_not_found")){ 
                        reset_password.text("Token not found").css("color", "red");
                    }
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>