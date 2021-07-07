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
<!-- header -->
<section class="section-1 home">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/1391465/pexels-photo-1391465.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/2730576/pexels-photo-2730576.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://image.freepik.com/free-photo/bad-habits-cigar-vs-e-cigarette-man-has-choice-traditional-modern-way-smoking-healthy-alternative-tobacco_201836-1538.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="prelative pt-0">
        <h3 class="content-title mt-5">
            Product
        </h3>
        <div class="row">
            <?php
                    for($i = 0; $i < count($resultBarang);$i++): 
                        $idbarang = $resultBarang[$i]["ID"];
                ?>
            <div class="col-md-6 mt-5">
                <a href="product-detail.php?barang=<?= $idbarang ?>">
                    <div class="box-container mr-0">
                        <div class="row">
                            <div class="col-md-8 px-5 py-4">
                                <p class="product-title-catalog">
                                    <?= $resultBarang[$i]["Nama"] ?>
                                </p>
                                <p class="product-price-catalog">
                                    Rp. <?= number_format($resultBarang[$i]["Harga"],2) ?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <img src="dist/img/img-src-barang/<?= $resultBarang[$i]["thumbnail"] ?>" alt=""
                                    class="product-image-catalog">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endfor; ?>
            <!-- <div class="col-md-6">
                <a href="#">
                    <div class="box-container">
                        <div class="row">
                            <div class="col-md-8 px-5 py-4">
                                <p class="product-title-catalog">
                                    Hing Fhu Shan
                                </p>
                                <p class="product-price-catalog">
                                    Rp 185,000.00
                                </p>
                            </div>
                            <div class="col-md-4">
                                <img src="dist/img/img-src/product-image-1.jpg" alt="" class="product-image-catalog">
                            </div>
                        </div>
                    </div>
                </a>
                </div> -->
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="dist/js/carouselzz.js">
</script>

</script>
<?php include 'footer.php'; ?>