<?php 
    session_start();
    require 'Function.php';
    $idSession = $_SESSION["ID"];
    

    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false)
    {
        if(!isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == false)
        {
            header("location: index.php") ;
        }else header("location: home.php");
    }

    if(isset($_GET["idt"])){
        $idTranksaksi = $_GET["idt"];

        
        $resultTransaksi = querryRead("SELECT * FROM tranksaksi WHERE ID = '$idTranksaksi'")[0];
        $resultIDUserTranksaksi = $resultTransaksi["ID_user"];
        $resultDetailTransaksi = querryRead("SELECT * FROM detail_tranksaksi WHERE ID_tranksaksi = '$idTranksaksi'");
        $resultUserTranksaksi = querryRead("SELECT * FROM user WHERE ID = $resultIDUserTranksaksi")[0];
        $date = explode(" ",$resultTransaksi["Date"])[0];
        $date = date('Y-m-d', strtotime($date."+7 days"));

        if(isset($_POST["updateDetailTransaksi"])){
            $resultUpdate = updateDetailTransaksi($_POST,$resultTransaksi);
            header("location: admin-cek-transfer-detail.php?idt=".$idTranksaksi);
        }
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>



<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>
            <a href="ClearSession.php" class="logout-button">
                Logout
            </a>
            <!-- Right navbar links -->
            <!-- <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul> -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="admin-dashboard-home.php" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">MEGAH JAYA ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="admin-dashboard-home.php" class="nav-link">
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-edit-item.php" class="nav-link">
                                <p>
                                    List Item
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-add-item.php" class="nav-link">
                                <p>
                                    Add Item
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin-cek-transfer.php" class="nav-link">
                                <p>
                                    Transaction List
                                </p>
                            </a>
                        </li>
                    </ul>
            </div>
            <!-- /.sidebar -->
        </aside>

        <?php if(!isset($_GET["idt"]) || count($resultTransaksi) < 1): ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Barang Tidak Ditemukan</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
        </div>
        <?php else: ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
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
                                        <div class="col-sm-4 invoice-col">
                                            From
                                            <address>
                                                <strong>Admin, Megah Jaya.</strong><br>
                                                Jl. Madrasah No.14, RT.7/RW.6,<br>
                                                Cilandak Tim., Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus
                                                Ibukota
                                                Jakarta 12520<br>
                                                Phone: (031) 7315355<br>
                                                Email: megahjaya@trains.com
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            To
                                            <address>
                                                <strong><?= $resultUserTranksaksi["username"] ?></strong><br>
                                                <?= $resultUserTranksaksi["alamat"] ?>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Order ID:</b> <?= $resultTransaksi["ID"] ?><br>
                                            <br>
                                            <b>Payment Due:</b> <?= $date ?><br>
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
                                                    <?php for($i=0;$i < count($resultDetailTransaksi);$i++): 
                                                        $idBarang = $resultDetailTransaksi[$i]["ID_Barang"];
                                                        $resultBarang = querryRead("SELECT * FROM barang WHERE ID = $idBarang")[0];
                                                    ?>
                                                    <tr>
                                                        <td><?= $resultDetailTransaksi[$i]["jumlah_barang"] ?></td>
                                                        <td><?= $resultBarang["Nama"] ?></td>
                                                        <td>Rp.
                                                            <?= number_format($resultDetailTransaksi[$i]["jumlah_barang"]*$resultDetailTransaksi[$i]["harga"],2) ?>
                                                        </td>
                                                    </tr>
                                                    <?php endfor ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="card-body row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Nomor Resi</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Masukan Data" name="noResi"
                                                value="<?= $resultTransaksi["no_resi"] ?>">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="Status">
                                                <?php for($i=0;$i<5;$i++): ?>
                                                <?php if($i == $resultTransaksi["Status"]): ?>
                                                <option value="<?= $i ?>" selected><?= $i ?></option>
                                                <?php else: ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endif ?>
                                                <?php endfor ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gambar Bukti Transfer</label>
                                            <img src="dist/img/img-bukti-transfer/<?= $resultTransaksi["bukti_transfer"] ?>"
                                                alt="" class="w-100">
                                        </div>
                                        <div class="form-check">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"
                                            name="updateDetailTransaksi">Edit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php endif ?>

        <footer class="main-footer">
            Ini Footer
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>