<?php
    session_start();
    require 'change-profile-proccess.php';
    
    if(!isset($_SESSION["LoginAdmin"]) || $_SESSION["LoginAdmin"] == false){
        if(!isset($_SESSION["LoginUser"]) || $_SESSION["LoginUser"] == false){
            header("location: index.php");
        }
    }else header("location: home.php");

    if(isset($_POST["changeProfile"])){
        $resulUpdateUser = updateProfile($_POST);
        if($resulUpdateUser > 0){
            header("location: user-profile.php");
        }
    }

    $resultUser = querryRead("SELECT * FROM user WHERE ID = $idSession")[0];
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
                    <label for="exampleInputEmail1">User Name</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="<?= $resultUser["username"] ?>" disabled>
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="<?= $resultUser["email"] ?>" disabled>
                    <label for="exampleInputEmail1">Alamat</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="<?= $resultUser["alamat"] ?>" disabled>
                    <label for="exampleInputEmail1">No Telp.</label>
                    <input class="form-control mb-3" id="disabledInput" type="text" placeholder="<?= $resultUser["telepon"] ?>" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-box">
                    <h3 class="content-title mb-4">
                        Update Data Mu
                    </h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukan Alamat mu" name="alamat">
                            <small id="emailHelp" class="form-text text-muted">Masukan Data Baru</small>
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">No Telp</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukan No Telp. mu" name="telepon">
                            <small id="emailHelp" class="form-text text-muted">Masukan Data Baru</small>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" name="changeProfile">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>