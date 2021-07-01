<?php
    require 'Function.php';
    $idsession = $_SESSION["ID"];
    $idsession = querryRead("SELECT * FROM user WHERE id = $idsession");
    $idsession = $idsession[0];

    function insertBarang($data)
    {
        global $conn;

        $namaBarang = $data["name"];
        $hargaBarang = $data["price"];
        $stokBarang = $data["stock"];
        $kategoriBarang = $data["category"];
        $deskripsiBarang = $data["description"];

        $resultAddStock = mysqli_query($conn, "INSERT INTO barang (Nama, Deskripsi, Kategori, Harga, Stok) VALUES ('$namaBarang', '$deskripsiBarang', $kategoriBarang, $hargaBarang, $stokBarang)");
        
        return mysqli_affected_rows($conn);
    }
?>