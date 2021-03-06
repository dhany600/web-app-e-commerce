<?php
    session_start();
    require 'add-cart-item.php';
    $idSession = $_SESSION["ID"];
    
    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false){
        if(!isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == false){
            header("location: index.php");
        }
    }

    if(isset($_GET["barang"])){
        $barang = $_GET["barang"];
        $resultBarang = querryRead("SELECT * FROM barang WHERE ID = $barang");
        if(count($resultBarang) > 0){
            $resultBarang = $resultBarang[0];
        }
    }

    if(isset($_POST['addItem'])){
        $resultCart = addCart($barang,$_POST["quantity"]);
        if($resultCart === "outStock"){
            echo "<script>alert('Stok Tidak Cukup')</script>";
        }elseif($resultCart){
            header("location: keranjang-belanja.php");
        }
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession");
    $resultUser = $resultUser[0];
?>

<?php include 'header.php'; ?>
<!-- header -->
<?php if(!isset($_GET["barang"]) || count($resultBarang) < 1): ?>
<h3 class="product-title">
    Barang Tidak Ditemukan
</h3>
<?php else: ?>
<section class="section-1 product-detail">
    <div class="prelative">
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="dist/img/img-src-barang/<?= $resultBarang["thumbnail"] ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="dist/img/img-src-barang/<?= $resultBarang["gambar_1"] ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="dist/img/img-src-barang/<?= $resultBarang["gambar_2"] ?>" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="dist/img/img-src-barang/<?= $resultBarang["gambar_3"] ?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <img src="dist/img/img-src-barang/<?= $resultBarang["thumbnail"] ?>" alt=""
                        class="product-detail-image selection-image">
                    </div>
                    <div class="col-md-3">
                        <img src="dist/img/img-src-barang/<?= $resultBarang["gambar_1"] ?>" alt=""
                            class="product-detail-image selection-image">
                    </div>
                    <div class="col-md-3">
                        <img src="dist/img/img-src-barang/<?= $resultBarang["gambar_2"] ?>" alt=""
                            class="product-detail-image selection-image">
                    </div>
                    <div class="col-md-3">
                        <img src="dist/img/img-src-barang/<?= $resultBarang["gambar_3"] ?>" alt=""
                            class="product-detail-image selection-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="product-title">
                    <?= $resultBarang["Nama"] ?>
                </h3>
                <p class="product-price mt-3 pb-3">
                    Rp.<?= number_format($resultBarang["Harga"],2) ?>
                </p>
                <pre class="content-pre-paragraph">
<?= $resultBarang["Deskripsi"] ?>
                </pre>
            </div>
            <div class="col-md-2">
                <form action="#" method="post">
                    <h6 class="content-title mb-2">
                        Tambah Keranjang
                    </h6>
                    <label for="exampleInputEmail1" class="form-label">Quantity :</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control w-100" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="1" name="quantity" require>
                        </div>
                        <div class="col-md-6">
                            <!-- <a href="add-cart-item.php?barang=<?= $barang ?>" onclick="return confirm('Ingin menambahkan item ke keranjang ?')"> -->
                            <button type="submit" class="btn btn-primary " name="addItem">Masukan</button>
                            <!-- </a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="section-2 product-detail">
    <div class="prelative pt-4">
        <h3 class="content-title">
            Cek Produk Terbaru Lainnya
        </h3>
        <div class="row">
            <?php
                $resultNewestBarang = array_slice(querryRead("SELECT * FROM barang") ,-5);
                for($i=count($resultNewestBarang)-1;$i >= 0;$i--):
            ?>
            <div class="col-2 ">
                <div class="content-box p-3">
                    <img src="dist/img/img-src-barang/<?= $resultNewestBarang[$i]["thumbnail"]?>" alt=""
                        class="content-image">
                    <h4 class="content-title mb-3 mt-3">
                        <?= $resultNewestBarang[$i]["Nama"] ?>
                    </h4>
                    <p class="content-price mb-0">Rp <?= number_format($resultNewestBarang[$i]["Harga"],2) ?></p>
                </div>
            </div>
            <?php endfor ?>
        </div>
        <!-- <div class="col">
                <div class="content-box p-3">
                    <img src="" alt="" class="content-image">
                    <h4 class="content-title mt-3">
                        lorem
                    </h4>
                    <p class="content-price mb-0">Rp 12345</p>
                </div>
            </div>
            <div class="col">
                <div class="content-box p-3">
                    <img src="" alt="" class="content-image">
                    <h4 class="content-title mt-3">
                        lorem
                    </h4>
                    <p class="content-price mb-0">Rp 12345</p>
                </div>
            </div>
            <div class="col">
                <div class="content-box p-3">
                    <img src="" alt="" class="content-image">
                    <h4 class="content-title mt-3">
                        lorem
                    </h4>
                    <p class="content-price mb-0">Rp 12345</p>
                </div>
            </div>
            <div class="col">
                <div class="content-box p-3">
                    <img src="" alt="" class="content-image">
                    <h4 class="content-title mt-3">
                        lorem
                    </h4>
                    <p class="content-price mb-0">Rp 12345</p>
                </div>
            </div>
            <div class="col">
                <div class="content-box p-3">
                    <img src="" alt="" class="content-image">
                    <h4 class="content-title mt-3">
                        lorem
                    </h4>
                    <p class="content-price mb-0">Rp 12345</p>
                </div>
            </div> -->
    </div>
    </div>
</section>
<!-- include footer -->
<?php include 'footer.php'; ?>