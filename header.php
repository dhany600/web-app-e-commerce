
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/style.css">
    <title>MEGAH JAYA</title>
</head>

<body>
    <section class="header">
        <div class="prelative py-3 mt-0">
            <img src="dist/img/img-src/web-logo.png" alt="">
            <div class="float-right">
                <p class="username">
                    Welcome Back <b><?= $resultUser["username"] ?></b>
                </p>
                <a href="ClearSession.php" class="logout-button">
                    Logout
                </a>
            </div>
        </div>
    </section>