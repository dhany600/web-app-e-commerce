<?php
    require 'Function.php';
    $idsession = $_SESSION["ID"];
    $idsession = querryRead("SELECT * FROM user WHERE id = $idsession")[0];

    function insertBarang($data)
    {
        global $conn;

        $namaBarang = $data["name"];
        $hargaBarang = $data["price"];
        $stokBarang = $data["stock"];
        $kategoriBarang = $data["category"];
        $deskripsiBarang = $data["description"];
        $namaFileGambar = ["thumb-gambar", "gambar1", "gambar2"];
        $insertGambar = [];

        for($i=0;$i<3;$i++){
            $namaGambar = uploadGambarBarang($namaFileGambar[$i]);
            array_push($insertGambar,$namaGambar);
        }

        $resultAddStock = mysqli_query($conn, "INSERT INTO barang (Nama, Deskripsi, Kategori, Harga, Stok, thumbnail, gambar_1, gambar_2) VALUES ('$namaBarang', '$deskripsiBarang', '$kategoriBarang', $hargaBarang, $stokBarang, '$insertGambar[0]', '$insertGambar[1]', '$insertGambar[2]')");
        return mysqli_affected_rows($conn);
    }
?>