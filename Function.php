<?php
    $conn = mysqli_connect("localhost","root","","projek_fai");

    function querryRead($querry){
        global $conn;

        $result = mysqli_query($conn, $querry);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    function querryInsert($querry){
        global $conn;

        $email = strtolower(stripslashes($querry["email"]));
        $password = strtolower(stripslashes($querry["password"]));
        $user = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");

        if(mysqli_fetch_assoc($user)){
            echo "<script>
                    alert('Data Gagal Dimasukan');
                </script>";
            return false;
        }

        //ENCRYPTING PASSWORD 
        $password = password_hash($password,PASSWORD_DEFAULT);

        //TAMBAHKAN KE DATABASE
        mysqli_query($conn, "INSERT INTO user (password,email) VALUES ('$password','$email')");

        return mysqli_affected_rows($conn);
    }
?>