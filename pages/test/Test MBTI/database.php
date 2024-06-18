<?php
    $server = "localhost";
    $user = "phpmyadmin";
    $pass = "";
    $data_base = "plorars" ;

    $conn = mysqli_connect($server,$user,$pass,$data_base);

    if($conn -> connect_error){
        die("Connect failed" . $conn -> connect_error);
    }
?>
