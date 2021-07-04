<?php
    session_start();
    require 'Function.php';

    $idsession = $_SESSION["ID"];
    $idBarangKeranjang = $_GET["barang"];

    $resultDelete = mysqli_query($conn, "DELETE FROM keranjang_belanja WHERE ID_user = $idsession AND ID_barang = $idBarangKeranjang");
    if(mysqli_affected_rows($conn) > 0){
        header("location: keranjang-belanja.php");
    }
?>