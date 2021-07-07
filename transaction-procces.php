<?php 
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require 'Function.php';
    $idsession = $_SESSION["ID"];
    $date = date('Y-m-d H:m:s');
    $totalHarga =0;
    $idTranksaksi = $idsession. date('YmdHms');
    // var_dump($idTranksaksi);die;
    $resultKeranjang = querryRead("SELECT * FROM keranjang_belanja WHERE ID_user = $idsession");

    for($i=0;$i < count($resultKeranjang);$i++){
        $idBarang = $resultKeranjang[$i]["ID_Barang"];
        $jumlahBarangKeranjang = $resultKeranjang[$i]["jumlah_barang"];
        $resultHargaBarang = querryRead("SELECT Harga FROM barang WHERE ID = $idBarang")[0];
        $resultHargaBarang = $resultHargaBarang["Harga"];
        $resultInsertDetailtranksaksi = mysqli_query($conn,"INSERT INTO detail_tranksaksi (ID_tranksaksi,ID_Barang,jumlah_barang,harga) VALUES ('$idTranksaksi',$idBarang,$jumlahBarangKeranjang,$resultHargaBarang)");
        $totalHarga += $resultHargaBarang;
    }

    $resultInsertTransaksi = mysqli_query($conn, "INSERT INTO tranksaksi (ID,ID_user,Total_Harga, Date) VALUES ('$idTranksaksi',$idsession,$totalHarga,'$date')");
    $resultDeleteCart = mysqli_query($conn, "DELETE FROM keranjang_belanja WHERE ID_user = $idsession");
    header('location:user-transaction-detail.php?idt='.$idTranksaksi);
?>