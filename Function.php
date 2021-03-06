<?php
    $conn = mysqli_connect("localhost","root","","projek_fai");

    function querryRead($querry){
        global $conn;

        $result = mysqli_query($conn, $querry);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        
        return $rows;
    }

    function querryInsert($querry){
        global $conn;

        $email = strtolower(stripslashes($querry["email"]));
        $password = strtolower(stripslashes($querry["password"]));
        $user = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");

        if(mysqli_fetch_assoc($user)){
            echo "<script>
                    alert('Data Gagal Dimasukan');
                </script>";
            return false;
        }

        //ENCRYPTING PASSWORD 
        $password = password_hash($password,PASSWORD_DEFAULT);

        //TAMBAHKAN KE DATABASE
        mysqli_query($conn, "INSERT INTO user (password,email) VALUES ('$password','$email')");

        return mysqli_affected_rows($conn);
    }

    function uploadGambarBarang($namaFilesGambar){
        $errorState = $_FILES[$namaFilesGambar]["error"];
        if($errorState === 4){
            return "noPict";
        }elseif($errorState === 0){
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

            $namaFile = $_FILES[$namaFilesGambar]["name"];
            $tmpFile = $_FILES[$namaFilesGambar]["tmp_name"];

             //pengecekan jenis file
            $ekstensiGambar = explode(".", $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
                echo "<script>
                        alert('pastikan yang anda upload gambar')
                    </script>";
                return false;
            }

            $namaFilebaru = uniqid();
            $namaFilebaru .= ".";
            $namaFilebaru .= $ekstensiGambar; 

            move_uploaded_file($tmpFile, 'dist/img/img-src-barang/' . $namaFilebaru);
        
            return $namaFilebaru;
        }       
    }

    function uploadBuktiTransfer($data){
        $idTranksaksi = $_GET["idt"];
        $buktiTF =  $_FILES[$data];
        if($buktiTF["error"] === 4){
            return "noPict";
        }elseif($buktiTF["error"] === 0){
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

            $namaFile = $buktiTF["name"];
            $tmpFile = $buktiTF["tmp_name"];
            //pengecekan jenis file
            $ekstensiGambar = explode(".", $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
                echo "<script>
                        alert('pastikan yang anda upload gambar')
                    </script>";
                return false;
            }
            $namaFilebaru = $idTranksaksi;
            $namaFilebaru .= ".";
            $namaFilebaru .= $ekstensiGambar; 

            move_uploaded_file($tmpFile, 'dist/img/img-bukti-transfer/' . $namaFilebaru);
        
            return $namaFilebaru;
        }
    }

    function updateDetailTransaksi($data,$transaksi){
        global $conn;
        $idTranksaksi = $transaksi["ID"];
        $status = $data["Status"];
        $noResi = $data["noResi"];

        if($data["Status"] != 0 && ($transaksi["bukti_transfer"] == "" or $transaksi["bukti_transfer"] == null)){
            echo "<script>alert('Belum ada Bukti Transfer')</script>";
        }
        
        $resultUpdateTransaksi = mysqli_query($conn, "UPDATE tranksaksi SET Status = $status, no_resi = '$noResi' WHERE ID = '$idTranksaksi'");
    }

    function insertIntoDB($idbarang,$namagambar){
        global $conn;

        $insertGambar = mysqli_query($conn, "INSERT INTO gambar_barang VALUES ($idbarang,'$namagambar')");

        return mysqli_affected_rows($conn);
    }
?>