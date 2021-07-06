<?php
    session_start();
    require 'Function.php';
    $idSession = $_SESSION["ID"];
    
    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false){
        if(!isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == false){
            header("location: index.php");
        }
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession");
    $resultUser = $resultUser[0];
    $resultBarang = querryRead("SELECT * FROM barang");
?>


<?php include 'header.php'; ?>
<section class="section-1 transaction-list">
    <div class="prelative">
        <div class="table-header">
            <div class="col-md-12">
                <div class="box-container">
                    <div class="row">
                        <div class="col-md-3 no-border-left">
                            <p class="header-title">
                                Status
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="header-title">
                                ID Transaksi
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p class="header-title">
                                Total Harga
                            </p>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    Tanggal
                                </div>
                                <div class="col-md-6">
                                    Jam
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-container-content">
                <div class="row">
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle bayaren"></i>
                            Bayaren
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            ID Transaksi
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            Total Harga
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                Tanggal
                            </div>
                            <div class="col-md-6">
                                Jam
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-container-content">
                <div class="row">
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle waiting-payment"></i>
                            Menunggu Uang Mu Mz
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            ID Transaksi
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            Total Harga
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                Tanggal
                            </div>
                            <div class="col-md-6">
                                Jam
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-container-content">
                <div class="row">
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle on-shipment"></i>
                            Barank Di Bawa Couw Rierz
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            ID Transaksi
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            Total Harga
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                Tanggal
                            </div>
                            <div class="col-md-6">
                                Jam
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-container-content">
                <div class="row">
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle item-arrived"></i>
                            Barank Tlah Tibaaa
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            ID Transaksi
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            Total Harga
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                Tanggal
                            </div>
                            <div class="col-md-6">
                                Jam
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-container-content">
                <div class="row">
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle gagal-menn"></i>
                            Gagal Menn
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            ID Transaksi
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            Total Harga
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                Tanggal
                            </div>
                            <div class="col-md-6">
                                Jam
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>