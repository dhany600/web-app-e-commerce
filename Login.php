<?php
    require 'Function.php';

    function login($username,$password){
        global $conn;

        $result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$username'");
        if(mysqli_num_rows($result) > 0){
            $result = mysqli_fetch_assoc($result);
            if(password_verify($password,$result["password"])){
                if($result["Status"] == 1){
                    $_SESSION["ID"] = $result["ID"];
                    $_SESSION["LoginAdmin"] = true;
                    return true;
                }else{
                    $_SESSION["ID"] = $result["ID"];
                    $_SESSION["LoginUser"] = true;
                    return true;
                }
            }else{
                return false;
            }  
        }else{
            return false;
        }
    }
?>