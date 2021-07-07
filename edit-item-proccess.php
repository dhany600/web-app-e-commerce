<?php
    require 'Function.php';
    $idsession = $_SESSION["ID"];
    $idsession = querryRead("SELECT * FROM user WHERE id = $idsession")[0];

    function updateBarang($data,$idBarang){
        global $conn;
        $resultoldBarang = querryRead("SELECT * FROM barang WHERE ID = $idBarang")[0];
        $oldbarangPict = [$resultoldBarang["thumbnail"],$resultoldBarang["gambar_1"],$resultoldBarang["gambar_2"]];

        $namaBarang = $data["name"];
        $hargaBarang = $data["price"];
        $stokBarang = $data["stock"];
        $kategoriBarang = $data["category"];
        $deskripsiBarang = $data["description"];
        $namaFileGambar = ["thumb-gambar", "gambar1", "gambar2"];
        $insertGambar = [];

        for($i=0;$i<3;$i++){
            $namaGambar = uploadGambarBarang($namaFileGambar[$i]);
            if($namaGambar == "noPict"){
                array_push($insertGambar,"$oldbarangPict[$i]");
            }else{
                array_push($insertGambar,$namaGambar);
            }
        }

        $resulUpdate = mysqli_query($conn, "UPDATE barang SET Nama = '$namaBarang', Deskripsi = '$deskripsiBarang', Kategori = '$kategoriBarang', Harga = $hargaBarang, Stok = $stokBarang, thumbnail = '$insertGambar[0]', gambar_1 = '$insertGambar[1]', gambar_2 = '$insertGambar[2]' WHERE ID = $idBarang");
    }
?>