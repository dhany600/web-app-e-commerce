<?php
    require 'Function.php';
    $idSession = $_SESSION["ID"];

    function updateProfile($data){
        global $conn;global $idSession;
        $alamat = $data["alamat"];
        $telepon = $data["telepon"];

        $resultInsert = mysqli_query($conn, "UPDATE user SET alamat = '$alamat', telepon = '$telepon' WHERE ID = $idSession");

        return mysqli_affected_rows($conn);
    }
?>