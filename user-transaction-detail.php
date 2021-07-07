<?php
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require 'upload-bukti-TF.php';
  
    
    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false){
        if(isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == true){
        }else header("location: index.php?idt=".$idTranksaksi);
    }

    if(isset($_POST["addBuktiTransfer"])){
        $resultuploadBuktiTF = InsertBuktiTF("buktiTransfer");
        header("location: user-transaction-detail.php?idt=".$idTranksaksi);
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession")[0];
    $resultTransaksi = querryRead("SELECT * FROM tranksaksi WHERE ID_user = $idSession AND ID = '$idTranksaksi'")[0];
    $resultDetailTransaksi = querryRead("SELECT * FROM detail_tranksaksi WHERE ID_tranksaksi = '$idTranksaksi'");
    $date = explode(" ",$resultTransaksi["Date"])[0];
    $date = date('Y-m-d', strtotime($date."+7 days"));
?>


<?php include 'header.php'; ?>
<section class="section-1 transaction-detail">
    <div class="prelative">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Data Barang</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row invoice-info p-3">
                                    <?php if($resultTransaksi["Status"] == 0): ?>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle bayaren"></i>
                                        Menunggu Bukti Transfer
                                    </a>
                                    <?php elseif($resultTransaksi["Status"] == 1): ?>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle waiting-payment"></i>
                                        Dalam Proses
                                    </a>
                                    <?php elseif($resultTransaksi["Status"] == 2): ?>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle on-shipment"></i>
                                        Barang Sedang Di kirim
                                    </a>
                                    <?php elseif($resultTransaksi["Status"] == 3): ?>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle item-arrived"></i>
                                        Barang Telah Sampai
                                    </a>
                                    <?php elseif($resultTransaksi["Status"] == 4): ?>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle gagal-menn"></i>
                                        Tranksaksi Gagal
                                    </a>
                                    <?php endif ?>
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Admin, Megah Jaya.</strong><br>
                                            Jl. Madrasah No.14, RT.7/RW.6,<br>
                                            Cilandak Tim., Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota
                                            Jakarta 12520<br>
                                            Phone: (031) 7315355<br>
                                            Email: megahjaya@trains.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong><?= $resultUser["username"] ?>.</strong><br>
                                            <?= $resultUser["alamat"] ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Order ID:</b> <?= $resultTransaksi["ID"] ?><br>
                                        <br>
                                        <b>Payment Due:</b> <?= $date ?> <br>
                                        <b>Account:</b> 968-34567
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row p-3">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Product</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    for($i=0;$i<count($resultDetailTransaksi);$i++):
                                                        $idbarang = $resultDetailTransaksi[$i]["ID_Barang"];
                                                        $resultBarang = querryRead("SELECT * FROM barang WHERE ID = $idbarang")[0];
                                                ?>
                                                    <tr>
                                                        <td><?= $resultDetailTransaksi[$i]["jumlah_barang"] ?></td>
                                                        <td><?= $resultBarang["Nama"] ?></td>
                                                        <td>Rp.<?= number_format($resultDetailTransaksi[$i]["jumlah_barang"]*$resultDetailTransaksi[$i]["harga"],2) ?></td>
                                                    </tr>
                                                <?php endfor ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="card-body row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputFile">Gambar Barang</label>
                                        <img src="dist/img/img-src-barang/" alt=""
                                            class="image-box mb-3">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="buktiTransfer">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gambar Bukti Transfer</label>
                                        <img src="dist/img/img-bukti-transfer/<?= $resultTransaksi["bukti_transfer"] ?>" alt="" class="w-100">
                                    </div>
                                    <div class="form-check">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- Buttonnya nanti hanya diperuntukan admin -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="addBuktiTransfer">Edit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
</section>
<?php include 'footer.php'; ?>