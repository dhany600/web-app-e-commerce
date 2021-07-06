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
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle bayaren"></i>
                                        Bayaren
                                    </a>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle waiting-payment"></i>
                                        Menunggu Uang Mu Mz
                                    </a>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle on-shipment"></i>
                                        Barank Di Bawa Couw Rierz
                                    </a>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle item-arrived"></i>
                                        Barank Tlah Tibaaa
                                    </a>
                                    <a href="#" class="content-table mb-3">
                                        <i class="fas fa-circle gagal-menn"></i>
                                        Gagal Menn
                                    </a>
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Admin, Inc.</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            Phone: (804) 123-5432<br>
                                            Email: info@almasaeedstudio.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>John Doe</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            Phone: (555) 539-1037<br>
                                            Email: john.doe@example.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #007612</b><br>
                                        <br>
                                        <b>Order ID:</b> 4F3S8J<br>
                                        <b>Payment Due:</b> 2/22/2014<br>
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
                                                    <th>Serial #</th>
                                                    <th>Description</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Call of Duty</td>
                                                    <td>455-981-221</td>
                                                    <td>El snort testosterone trophy driving gloves handsome</td>
                                                    <td>$64.50</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Need for Speed IV</td>
                                                    <td>247-925-726</td>
                                                    <td>Wes Anderson umami biodiesel</td>
                                                    <td>$50.00</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Monsters DVD</td>
                                                    <td>735-845-642</td>
                                                    <td>Terry Richardson helvetica tousled street art master</td>
                                                    <td>$10.70</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Grown Ups Blue Ray</td>
                                                    <td>422-568-642</td>
                                                    <td>Tousled lomo letterpress</td>
                                                    <td>$25.99</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="card-body row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputFile">Gambar Barang</label>
                                        <img src="dist/img/img-src-barang/<?= $resultBarang["thumbnail"] ?>" alt=""
                                            class="image-box mb-3">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="thumb-gambar">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gambar Bukti Transfer</label>
                                        <img src="#" alt="" class="w-100">
                                    </div>
                                    <div class="form-check">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="addBarang">Edit</button>
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