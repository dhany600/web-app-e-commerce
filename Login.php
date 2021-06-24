<?php
    require 'Function.php';

    function login($username,$password){
        global $conn;

        $result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$username'");
        if(mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_assoc($result);
            if(password_verify($password,$result["password"])){
                $_SESSION["Login"] = true;
                return true;
            }else{
                return false;
            }  
        }else{
            return false;
        }
    }
?>