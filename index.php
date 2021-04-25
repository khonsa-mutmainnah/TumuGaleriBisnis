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
    <div class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="?p=Home"><img src="./gambar/logo.png" alt="logo" style="width: 65px; margin-left:20px;"></a>
                    <div class="judul-navbar">
                        <h3 class="galeribisnis-navbar">galeri bisnis</h3>
                        <div class="tagline-navbar">tunjukkan bisnismu di sini!</div>
                    </div>
                    
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto justify-content-end">
                            <li class="nav-item dropdown">
                            <a class="navbar-brand" href="index.php?p=toko-penjual"><img src="./gambar/toko.png" alt="logo" style="width: 30px; margin-left:20px;"></a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="navbar-brand" href="index.php?p=toko"><img src="./gambar/toko.png" alt="logo" style="width: 30px; margin-left:20px;"></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="./gambar/aa.jpg" style="height:30px; border-radius:50%;" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?p=Pengunjung">ganti toko</a>
                                <a class="dropdown-item" href="#">edit profil</a>
                                <a class="dropdown-item" href="index.php?p=tambahproduk">tambah barang</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Keluar</a>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-body">
                                            Anda yakin ingin keluar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <a class="btn btn-primary" role="button" href="index.php?p=Home"  >Ya</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
            </nav>
        </div>
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
                include "./pages/Home.php";
            }
        ?>
    </div>
</body>
</html>
