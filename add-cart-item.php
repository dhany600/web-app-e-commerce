<?php
    require 'Function.php';
    $idsession = $_SESSION["ID"];

    function addCart($barang,$quantity){
        global $conn;
        global $idsession;

        $resultCart = querryRead("SELECT * FROM keranjang_belanja WHERE ID_Barang = $barang AND ID_user = $idsession");
        $stokBarang = querryRead("SELECT * FROM barang WHERE ID = $barang")[0];
        $stokBarang = $stokBarang["Stok"];
        
        if(count($resultCart) > 0){
            if($quantity <= $stokBarang){
                $resultAddCart = mysqli_query($conn, "UPDATE keranjang_belanja SET jumlah_barang = jumlah_barang + $quantity WHERE ID_Barang = $barang AND ID_user = $idsession");
                if(mysqli_affected_rows($conn) > 0){
                    return true;
                }else return false;
            }else return "outStock";
            
        }else{
            if($quantity <= $stokBarang){
                $resultAddCart = mysqli_query($conn, "INSERT INTO keranjang_belanja (ID_user,ID_Barang,jumlah_barang) VALUES ($idsession,$barang,$quantity)");
                if(mysqli_affected_rows($conn)){
                    return true;
                }else return false;
            }else return "outStock";
        }
    }
?>