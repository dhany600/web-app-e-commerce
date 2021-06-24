<?php
    require 'Function.php';

    function InsertUser($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);

        if($data["password"] !== $data["retypePassword"]){
            return false;
        }else{
            //enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);

            //insert into database
            $result = mysqli_query($conn, "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')");

            return mysqli_affected_rows($conn);
        }
    }
?>