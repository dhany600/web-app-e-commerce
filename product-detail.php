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

    $resultGambar = querryRead("SELECT * FROM gambar_barang");
?>

<?php include 'header.php'; ?>
<!-- header -->
<section class="section-1 product-detail">
    <div class="prelative">
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <img src="#" alt="" class="product-detail-image main-image">
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <img src="#" alt="" class="product-detail-image selection-image">
                    </div>
                    <div class="col-md-3">
                        <img src="#" alt="" class="product-detail-image selection-image">
                    </div>
                    <div class="col-md-3">
                        <img src="#" alt="" class="product-detail-image selection-image">
                    </div>
                    <div class="col-md-3">
                        <img src="#" alt="" class="product-detail-image selection-image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="product-title">
                    Lorem ipsum dolor sit amet
                </h3>
                <p class="product-price mt-3 pb-3">
                    Rp.12345
                </p>
                <p class="content-paragraph">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, porro modi quis fugit ipsum
                    recusandae natus! Sed praesentium reprehenderit suscipit maxime nobis temporibus, porro minus rem
                    doloribus obcaecati ipsum quia.
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo beatae laboriosam aspernatur eligendi
                    sed, sunt error hic fugit reprehenderit et harum facilis enim quaerat alias placeat. Voluptates
                    quibusdam fugit dolores?
                </p>
            </div>
            <div class="col-md-2">
                <h6 class="content-title mb-2">
                    Tambah Keranjang
                </h6>
                <label for="exampleInputEmail1" class="form-label">Quantity :</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1">
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary ">Masukan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-2 product-detail">
    <div class="prelative pt-4">
        <h3 class="content-title">
            Cek Produk Terbaru Lainnya
        </h3>
        <div class="row">
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
        </div>
    </div>
</section>
<!-- include footer -->
<?php include 'footer.php'; ?>