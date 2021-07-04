<?php
    session_start();
    require 'Function.php';

    $idsession = $_SESSION["ID"];
    $barang = $_GET["barang"];

    $resultAddCart = mysqli_query($conn, "INSERT INTO keranjang_belanja VALUES ()");
?>