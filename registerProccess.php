<?php
    require 'Function.php';

    function InsertUser($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $resultallUser = querryRead("SELECT * FROM user");

        if($data["password"] !== $data["retypePassword"]){
            return "wrongPass";
        }else{
            for($i=0;$i < count($resultallUser);$i++){
                if($email == $resultallUser[$i]["email"] ){
                    return "usedEmail";
                }
            }
            //enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);

            //insert into database
            $result = mysqli_query($conn, "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')");

            return mysqli_affected_rows($conn);
        }
    }
?>