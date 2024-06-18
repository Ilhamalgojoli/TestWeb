<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<style>
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
        position: relative;
        top : 70px;
        display: flex;
        text-transform: uppercase;
        justify-content: center;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right,#394673, 70%, #023AFF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 20px;
    }
    .container-password h4{
        position: relative; 
        top: 130px; 
        background: linear-gradient(to right,#394673, 70%, #023AFF);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display:flex; 
        justify-content:center;
        text-transform: uppercase;
    }
    .input-email input{
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
        bottom: 30px;
    }
    .button-checker button{
        position: relative;
        top: 0px;
        display: flex;
        background-color: transparent;
        border-radius: 2px solid white;
        margin-right: 10px;
        padding: 20px 10px;
        left: -17px;
        color: black;
        z-index: 1;
        overflow: hidden;
        transition: .8s;
    }
    .button-checker button:hover{
        color:white;
    }
    .button-checker button:nth-child(1)::before{
        background-color: #B5D5E2;
    }
    .button-checker button:nth-child(1):hover{
        color :white;
    }
    .button-checker button::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: linear-gradient(to right, aqua );
        z-index: -1;
        transition: .7s;
        border-radius: 2px;
    }
    .button-checker button:hover::before{
        width: 100%;
    }
    .Logo{
        position: relative;
        top : 40px ;
        display: flex;
        justify-content: center;
    }
    .Logo img{
        width: 50px;
        height: auto;
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
<div class = "container-password">
    <div class ="Logo">
        <img src="images/vector.png">
    </div>
        <h1> Forgot password </h1>
        <h4> confirm your email</h4>
    <form action="send_password_reset.php" method="POST">
    <div class = "input-email">
        <input type="email" name="email" placeholder="Enter your email" id="email">
    </div>
    <div class = "button-checker">
        <button id="emailBtn">Send You Link</button>
    </div>
    <div id="message"></div> <!-- Tempat buat generate message dari ajax -->
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#emailBtn").click(function(e){
            e.preventDefault(); 
            var email = $("#email").val();
            $.ajax({
                type: "POST",
                url: "send_password_reset.php",
                data: {email: email},
                dataType: "json",
                success: function(response){
                    var messageDiv = $("#message");
                    messageDiv.empty(); 
                    if (response.includes("Invalid_email_format")) {
                        messageDiv.text("Invalid email format").css("color", "red");
                    } else if (response.includes("email_not_found")) {
                        messageDiv.text("Email not found").css("color", "red");
                    } else if (response.includes("Message sent, please check your inbox.")) {
                        messageDiv.text("Message sent, please check your inbox.").css("color", "green");
                    } else {
                        messageDiv.text("An unexpected error occurred").css("color", "red");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
