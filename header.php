<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://kit.fontawesome.com/54c91e5a63.js" crossorigin="anonymous"></script>
    <title>MEGAH JAYA</title>
</head>

<body>
    <section class="header">
        <div class="prelative py-3 mt-0">
            <a href="home.php">
                <img src="dist/img/img-src/web-logo.png" alt="" id="kembali-keatas">
            </a>
            <div class="float-right">
                <div class="col-md-12">
                    <p class="username">
                        Welcome Back <b><?= $resultUser["username"] ?></b>
                    </p>
                    <a href="ClearSession.php" class="logout-button">
                        Logout
                    </a>
                </div>
                <div class="col-md-12">
                    <a href="keranjang-belanja.php" class="navigation-button">
                        <i class="fas fa-cart-plus"></i>
                    </a>
                    <a href="#" class="navigation-button">
                        <i class="fas fa-history"></i>
                    </a>
                    <a href="user-profile.php" class="navigation-button">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
            <a class="back-to-top" href="#kembali-keatas">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>
    </section>