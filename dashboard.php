<?php 
    require("connection.php");

    if (!isset($_SESSION)) {
        session_start();
    }

    $id_user = $_SESSION['id_user'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];
    $nama = $_SESSION['nama'];
    $role = $_SESSION['role'];
    $no_hp = $_SESSION['no_hp'];
    $instagram_user = $_SESSION['instagram_user'];
    $kota = $_SESSION['kota'];
    $foto = $_SESSION['foto'];

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
                <a class="navbar-brand" href="?p=GaleriBisnis"><img src="./gambar/logo.png" alt="logo" style="width: 50px; margin-left:20px;"></a>
                <div class="judul-navbar">
                    <h4 class="galeribisnis-navbar">galeri bisnis</h4>
                    <div class="tagline-navbar">tunjukkan bisnismu di sini!</div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-auto justify-content-end " id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                <?php
                    if(isset($_SESSION["role"])){
                        if($_SESSION["role"]=="admin"){
                ?>
                            <a class="nav-link " style="color: #002f3f;"href="?p=logout">Keluar</a>
    
                            <div class="btn-group">
                                <button type="button" class="btn" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./gambar/aa.jpg" style="width:20px;">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="?p=userlist">user</a></li>
                                    <li><a class="dropdown-item" href="?p=tokolist">toko</a></li>
                                    <li><a class="dropdown-item" href="?p=baranglist">barang</a></li>
                                    <li><a class="dropdown-item" href="?p=gambarBarangList">gambar barang</a></li>
                                    <li><a class="dropdown-item" href="?p=lokasilist">lokasi</a></li>
                                    <li><a class="dropdown-item" href="?p=kategorilist">kategori</a></li>
                                </ul>
                            </div>
                <?php
                        }
                        else{
                ?>
                            <!-- pilih mau masuk toko yang mana -->
                            <a class="nav-link " style="color: #002f3f;" href="#" data-bs-toggle="modal" data-bs-target="#tokoku">tokoku</a>

                            <!-- Modal -->
                            <!-- ini toko yang dipunya sama si user ini, kalau dia gapunya toko, arahin ke tambah toko -->
                            <div class="modal fade" id="tokoku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="staticBackdropLabel">Tokoku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row row-cols-1 row-cols-md-4 g-4">
                                                <div class="col">
                                                    <div class="card" style="background-color: #e4edea;">
                                                        <?php
                                                            require_once('./class/class.Toko.php'); 		
                                                            $objToko = new Toko();
                                                            $objToko->user->id_user= $id_user;
                                                            $arrayResult = $objToko->SelectTokoById();
                                                            if(count($arrayResult)==0){
                                                                echo '<tr><td colspan="9">TIDAK ADA DATA!</td></tr>';
                                                            }
                                                            else{
                                                                foreach ($arrayResult as $dataToko){
                                                                    echo "<img src='./upload/toko/".$dataToko->logo."' class='card-img-top rounded mx-auto d-block alt='logo'>";
                                                                    echo '<a class="btn nama-toko-dash" style="font-size: 10px; margin-top:0px;" href="?p=toko-penjual&id_toko='.$dataToko->id_toko.'">'.$dataToko->nama_toko.'</a>';
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a class="nav-link " style="color: #002f3f;"href="?p=logout">Logout</a>
                            <div class="btn-group">
                                <button type="button" class="btn" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./gambar/aa.jpg" style="width:20px;">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="?p=toko-edit&id_user=<?php echo $id_user; ?>">tambah toko</a></li>
                                    <li><a class="dropdown-item" href="?p=user-edit&id_user=<?php echo $id_user; ?>">edit profil</a></li>
                                    <li><a class="dropdown-item" href="?p=reset-pw-form">ubah password</a></li>
                                    <li><a class="dropdown-item" href="?p=Home">home</a></li>
                                </ul>
                            </div>
                <?php
                        }
                
                    }
                ?>
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
