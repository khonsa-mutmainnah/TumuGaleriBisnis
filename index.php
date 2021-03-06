<?php 
require "connection.php";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["role"])) {
    echo '<script>window.location = "dashboard.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tumu Galeri Bisnis</title>

    <!-- CSS -->
    <link rel="stylesheet" href="StyleIndex.css?v=<?php echo time(); ?>">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- BOOTSTRAP JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"
    ></script>

     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    
    <!-- font -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap');</style>
    
</head>
<body class="all">
    <!-- header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./gambar/logo.png" alt="logo" style="width: 50px; margin-left:20px;"></a>
                <div class="judul-navbar">
                    <h4 class="galeribisnis-navbar">galeri bisnis</h4>
                    <div class="tagline-navbar">tunjukkan bisnismu di sini!</div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-auto justify-content-end " id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        <a class="nav-link " style="color: #002f3f;"href="?p=login">Masuk</a>
                        <a class="nav-link " style="color: #002f3f;"href="?p=register">registrasi</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- isi dynamic page -->
    <div class="isi">
        <?php
            $pages_dir = 'pages';
            if (!empty($_GET['p'])) {
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);

                $p = $_GET['p'];

                if (in_array($p . '.php', $pages)) {
                    include($pages_dir . '/' . $p .  '.php');
                } else {
                    echo "Halaman Tidak Ditemukan";
                }
            } 
            else {
                include "./pages/GaleriBisnis.php";
            }
        ?>
    </div>
</body>
</html>
