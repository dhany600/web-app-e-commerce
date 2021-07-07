<!-- Ganti Databse menjadi tranksaksi -->

<?php 
    session_start();
    require 'Function.php';
    $idsession = $_SESSION["ID"];

    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false)
    {
        if(!isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == false)
        {
            header("location: index.php") ;
        }else header("location: home.php");
    }

    if(isset($_POST["addBarang"])){
        $insert = insertBarang($_POST);
        if($insert > 0){
            header("location: admin-add-item.php");
        }
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idsession")[0];
    $resultTranksaksi = querryRead("SELECT * FROM tranksaksi");
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
            <a href="index3.html" class="brand-link">
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
                            <a href="admin-dashboard-home.php" class="nav-link active">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Barang</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12 col-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-1 col-1">
                                            <h3 class="card-title">No.</h3>
                                        </div>
                                        <div class="col-md-6 col-5">
                                            <h3 class="card-title">ID</h3>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <h3 class="card-title">User</h3>
                                        </div>
                                        <div class="col-md-1 col-2">
                                            <h3 class="card-title">Status</h3>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <h3 class="card-title">Tanggal</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php 
                                        for($i=0;$i<count($resultTranksaksi);$i++):
                                            $resultIDUserTransaksi = $resultTranksaksi[$i]["ID_user"];
                                            $resultUserTransaksi = querryRead("SELECT * FROM user WHERE ID = $resultIDUserTransaksi")[0];
                                    ?>
                                    <div class="card-body row <?php if($i%2 != 0) echo " bg-light color-palette mx-0"?>"
                                        onclick="location.href='admin-cek-transfer-detail.php?idt=<?= $resultTranksaksi[$i]['ID'] ?>'">
                                        <div class="col-md-1 col-1">
                                            <h3 class="card-title"><?= $i+1 ?></h3>
                                        </div>
                                        <div class="col-md-6 col-5">
                                            <h3 class="card-title">
                                                <a href="#">
                                                    <?= $resultTranksaksi[$i]["ID"] ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="col-md-1 col-2">
                                            <h3 class="card-title"><?= $resultUserTransaksi["username"] ?></h3>
                                        </div>
                                        <div class="col-md-1 col-2">
                                        </div>
                                        <div class="col-md-1 col-2">
                                            <?php if($resultTranksaksi[$i]["Status"] == 0): ?>
                                            <h3 class="card-title">
                                                Menunggu Bukti Transfer
                                            </h3>
                                            <?php elseif($resultTranksaksi[$i]["Status"] == 1): ?>
                                            <h3 class="card-title">
                                                Dalam Proses
                                            </h3>
                                            <?php elseif($resultTranksaksi[$i]["Status"] == 2): ?>
                                            <h3 class="card-title">
                                                Barang Sedang Di kirim
                                            </h3>
                                            <?php elseif($resultTranksaksi[$i]["Status"] == 3): ?>
                                            <h3 class="card-title">
                                                Barang Telah Sampai
                                            </h3>
                                            <?php elseif($resultTranksaksi[$i]["Status"] == 4): ?>
                                            <h3 class="card-title">
                                                Tranksaksi Gagal
                                            </h3>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-2 col-2">
                                            <p>
                                                <?= $resultTranksaksi[$i]["Date"] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php endfor ?>
                                    <!-- <div class="card-body row bg-light color-palette mx-0">
                                        <div class="col-md-1 col-1 pl-0">
                                            <h3 class="card-title">2</h3>
                                        </div>
                                        <div class="col-md-6 col-5 pl-0">
                                            <h3 class="card-title">
                                                <a href="#">
                                                    lorem ipsum
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="col-md-1 col-2">
                                            <h3 class="card-title">User Here</h3>
                                        </div>
                                        <div class="col-md-1 col-2 pl-2">
                                            <h3 class="card-title pl-1">42</h3>
                                        </div>
                                        <div class="col-md-2 col-2 pl-2">
                                            <p>
                                                Date Here
                                            </p>
                                        </div>
                                    </div> -->

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="addBarang">Masukan</button>
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