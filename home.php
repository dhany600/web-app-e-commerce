<?php
    session_start();
    require 'Function.php';
    $idSession = $_SESSION["ID"];
    
    if(!isset($_SESSION["Login"]) || $_SESSION["Login"] == false){
        header ("Location: index.php");
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession");
    $resultUser = $resultUser[0];
    $resultBarang = querryRead("SELECT * FROM barang");
?>


    <?php include 'header.php'; ?>
    <!-- header -->
    <section class="section-1 home">
        <div class="prelative">
            <h3 class="content-title">
                Product
            </h3>
            <div class="row">
                <?php for($i = 0; $i < count($resultBarang);$i++): ?>
                <div class="col-md-6 mt-5">
                    <a href="#">
                        <div class="box-container mr-3">
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
                                    <img src="dist/img/img-src/<?= $resultBarang[$i]["Gambar"] ?>" alt=""
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
</body>

</html>