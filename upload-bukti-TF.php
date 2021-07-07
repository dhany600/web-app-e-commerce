<?php
    require 'Function.php';
    $idSession = $_SESSION["ID"];
    $idTranksaksi = $_GET["idt"];

    function InsertBuktiTF($data){
        global $conn;global $idTranksaksi;
        $resultTransaksi = querryRead("SELECT * FROM tranksaksi WHERE ID = '$idTranksaksi'")[0];
        $oldBuktiTF = $resultTransaksi["bukti_transfer"];
        
        $resultUploadBuktiTF = uploadBuktiTransfer($data);

        if($resultUploadBuktiTF === "noPict"){
            $resultUpdateBuktiTF = mysqli_query($conn, "UPDATE tranksaksi SET bukti_transfer = '$oldBuktiTF' WHERE ID = '$idTranksaksi'");
        }else{
            $resultUpdateBuktiTF = mysqli_query($conn, "UPDATE tranksaksi SET bukti_transfer = '$resultUploadBuktiTF' WHERE ID = '$idTranksaksi'");
        }
    }    
?>