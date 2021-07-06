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
    $resultKeranjang = querryRead("SELECT * FROM keranjang_belanja WHERE ID_user = $idSession");
?>
<?php include 'header.php'; ?>

<section class="section-1 shopping-cart-list">
    <div class="prelative">
        <?php if(count($resultKeranjang) <= 0): ?>
        <h3 class="content-title">
            Belum ada barang di dalam keranjang
        </h3>
        <?php else: ?>
        <h3 class="content-title mb-4">
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
        <?php for($i = 0 ; $i < count($resultKeranjang) ; $i++): 
                        $idbarangkeranjang = $resultKeranjang[$i]["ID_Barang"];
                        $barangKeranjang = querryRead("SELECT * FROM barang WHERE ID = $idbarangkeranjang")[0];
                        $hargabarang = $barangKeranjang["Harga"];
                        $quantity = $resultKeranjang[$i]["jumlah_barang"];
                        $totalBiaya = $hargabarang * $quantity;
            ?>
        <div class="row content-table-row">
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    <img class="w-100" src="dist/img/img-src-barang/<?= $barangKeranjang["thumbnail"] ?>" alt="">
                </div>
            </div>
            <div class="col-md-4 initial-table-border">
                <div class="header-table">
                    <?= $barangKeranjang["Nama"] ?>
                </div>
            </div>
            <div class="col-md-1 initial-table-border">
                <div class="header-table">
                    <?= $quantity ?>
                </div>
            </div>
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Rp. <?= number_format($hargabarang,2) ?>
                </div>
            </div>
            <div class="col-md-2 initial-table-border">
                <div class="header-table">
                    Rp. <?= number_format($totalBiaya,2) ?>
                </div>
            </div>
            <div class="col-md-1 last-table-border">
                <div class="header-table">
                    <a href="delete-cart-item.php?barang=<?= $idbarangkeranjang ?>"
                        onclick="return confirm('Ingin Menghapus Item dari Keranjang Belanja ?')">
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <?php endfor ?>
        <?php endif ?>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary modal-button-keranjang mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Beli Barang
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembelian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin melakukan pembelian?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>