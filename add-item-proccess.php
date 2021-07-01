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
        $namaFileGambar = ["thumb-gambar", "gambar1", "gambar2"];

        $resultAddStock = mysqli_query($conn, "INSERT INTO barang (Nama, Deskripsi, Kategori, Harga, Stok) VALUES ('$namaBarang', '$deskripsiBarang', $kategoriBarang, $hargaBarang, $stokBarang)");
        $idBarangTerakhir = mysqli_insert_id($conn);

        for($i=0;$i<3;$i++){
            $namaGambar = upload($namaFileGambar[$i]);
            $insertGambar = insertIntoDB($idBarangTerakhir,$namaGambar);
        }

        return mysqli_affected_rows($conn);
    }
?>