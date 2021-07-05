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
<section class="section-1 user-profile">
    <div class="prelative">
        <div class="row">
            <div class="col-md-6">
                <div class="container-box">
                    <h3 class="content-title mb-4">
                        Data Profile Mu
                    </h3>
                    <label for="exampleInputEmail1">Nama</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="Nama" disabled>
                    <label for="exampleInputEmail1">User Name</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="Username" disabled>
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="Email" disabled>
                    <label for="exampleInputEmail1">Alamat</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="Alamat" disabled>
                    <label for="exampleInputEmail1">No Telp.</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="No Telp." disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-box">
                    <h3 class="content-title mb-4">
                        Update Data Mu
                    </h3>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukan Alamat mu">
                            <small id="emailHelp" class="form-text text-muted">Masukan Data Baru</small>
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">No Telp</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukan No Telp. mu">
                            <small id="emailHelp" class="form-text text-muted">Masukan Data Baru</small>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>