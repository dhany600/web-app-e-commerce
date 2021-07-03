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

<section class="section-1 shopping-cart-list">
    <div class="prelative">
        <h3 class="content-title">
            Keranjang Belanja
        </h3>
        <div class="row header-table-row">
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Gambar
                </div>
            </div>
            <div class="col-md-4 initial-table-border">
                <div class="header-table">
                    Nama
                </div>
            </div>
            <div class="col-md-1 initial-table-border">
                <div class="header-table">
                    Quantity
                </div>
            </div>
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Harga Barang
                </div>
            </div>
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Harga Total
                </div>
            </div>
            <div class="col-md-1 last-table-border">
                <div class="header-table">
                    Edit Barang
                </div>
            </div>
        </div>
        <div class="row content-table-row">
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Gambar
                </div>
            </div>
            <div class="col-md-4 initial-table-border">
                <div class="header-table">
                    Nama
                </div>
            </div>
            <div class="col-md-1 initial-table-border">
                <div class="header-table">
                    Quantity
                </div>
            </div>
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Harga Barang
                </div>
            </div>
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Harga Total
                </div>
            </div>
            <div class="col-md-1 last-table-border">
                <div class="header-table">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>