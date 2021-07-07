<?php
    session_start();
    date_default_timezone_set('Asia/Jakarta');
    require 'Function.php';
    $idSession = $_SESSION["ID"];
    
    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false){
        if(!isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == false){
            header("location: index.php");
        }//else header("location: index.php"); 
    }else header("location: home.php");

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession")[0];
    $resultTranksaksi = querryRead("SELECT * FROM tranksaksi WHERE ID_user = $idSession");
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
                <?php for($i=0;$i<count($resultTranksaksi);$i++): ?>
                <div class="row" onclick="location.href='user-transaction-detail.php?idt=<?= $resultTranksaksi[$i]['ID'] ?>'">
                    <?php if($resultTranksaksi[$i]["Status"] == 0): ?>
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle bayaren"></i>
                            Menunggu Bukti Transfer
                        </a>
                    </div>
                    <?php elseif($resultTranksaksi[$i]["Status"] == 1): ?>
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle waiting-payment"></i>
                            Dalam Proses
                        </a>
                    </div>
                    <?php elseif($resultTranksaksi[$i]["Status"] == 2): ?>
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle on-shipment"></i>
                            Barang Sedang Di kirim
                        </a>
                    </div>
                    <?php elseif($resultTranksaksi[$i]["Status"] == 3): ?>
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle item-arrived"></i>
                            Barang Telah Sampai
                        </a>
                    </div>
                    <?php elseif($resultTranksaksi[$i]["Status"] == 4): ?>
                    <div class="col-md-3 no-border-left">
                        <a href="#" class="content-table">
                            <i class="fas fa-circle gagal-menn"></i>
                            Tranksaksi Gagal
                        </a>
                    </div>
                    <?php endif ?>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            <?= $resultTranksaksi[$i]["ID"] ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="content-table">
                            Rp. <?= number_format($resultTranksaksi[$i]["Total_Harga"], 2) ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <?= explode(" ", $resultTranksaksi[$i]["Date"])[0] ?>
                            </div>
                            <div class="col-md-6">
                                <?= explode(" ", $resultTranksaksi[$i]["Date"])[1] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>