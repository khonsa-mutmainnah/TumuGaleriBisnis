<?php
  require_once('./class/class.Toko.php');
  require_once('./class/class.gambar_barang.php');
  require_once('./class/class.Barang.php');

  $id_toko = $_GET['id_toko'];
  $objToko = new Toko();
  $objToko->id_toko = $id_toko;

//fetch data kosan by id
$objBarang = new Barang();
$objBarang->toko->id_toko = $id_toko;
$objBarang->SelectBarangByToko();


?>
<div class="home">
    <div class=container>
      <div class="card text-center">
        <div class="card-body">
        <section>
          <?php
            if(isset($_GET['id_toko'])){
              $objToko->SelectOneToko();

              echo '<div class="text-center">';
              echo "<img src='./upload/toko/".$objToko->logo."' class='rounded' style='width:110px;' alt='logo'/>";
              echo '</div>';
              echo '<h4 class="card-title" style="font-weight: 600; margin-top:5px;">'.$objToko->nama_toko.'</h4>';
              echo '<p class="card-text">'.$objToko->tagline.'</p>';
              echo '<p class="card-text">'.$objToko->lokasi->kecamatan.', '.$objToko->lokasi->kota.', '.$objToko->lokasi->provinsi.''.'</p>';
              echo '<br>';  
          ?>
          <!-- Button trigger modal -->
          <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">lihat profil penjual</a>
          
          <!-- Modal profil penjual -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Profil Penjual</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="text-center">
                    <?php
                    echo '<img src="./upload/user/'.$objToko->user->foto.'" class="rounded" alt="foto-user" style="width: 110px;">';
                    echo '<h3>'.$objToko->user->username.'</h3>';
                    echo '<p>'.$objToko->user->nama.'</p>';
                    echo '<p>'.$objToko->user->instagram_user.'</p>';
                    echo '<p>'.$objToko->user->no_hp.'</p>';
                    echo '<p>'.$objToko->user->email.'</p>';
                    echo '<p>'.$objToko->user->kota.'</p>';
                  ?>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row align-items-start">
                <div class="col">
                  <img src="./gambar/telfon.png" style="padding-top:0px; width:20px;">
                  <?php
                    echo '<p>'.$objToko->no_telp.'</p>';
                  ?>
                </div>
                <div class="col">
                  <img src="./gambar/ig.png" style="padding-top:0px; width:20px;">
                  <?php
                    echo '<p>'.$objToko->instagram.'</p>';
                  ?>
                </div>
                <div class="col">
                  <img src="./gambar/web.png" style="padding-top:0px; width:20px;">
                  <?php
                    echo '<br>';
                    echo '<a href='.$objToko->url_toko.'>kunjungi toko</a>';
                  ?>
                </div>
            </div>
            <?php
            }
          ?>
          </div>
        </section>
      </div>
    </div>



    <div class="container">
    <div class="row row-cols-1 row-cols-md-4  ">
      <div class="col">
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <!-- foto -->
          <div class="carousel-inner">
        </div>
      </div>


          <?php 
          // $objBarang->toko->id_toko= $id_toko;
          $arrayResult = $objBarang->SelectBarangByToko();
          if(count($arrayResult)==0){
              echo '<tr><td colspan="9"></td></tr>';
          }
          else{
              foreach ($arrayResult as $dataBarang){

                //fetch foto kosan by id
                $allGambar = $objBarang->getAllGambarBarang();

                        //kosong
                if ($allGambar == "kosong") {
                  // echo '<div class="carousel-item active">';
                  // echo '<img class="d-block w-100" src="./gambar/aa.jpg">';
                  // echo '</div>';
                }

                        //selain itu
                else {
                $string = "";
                $jumlah = count($allGambar);

                            //lebih dari 1
                if ($jumlah > 1) {
                  $i = 0;
                  foreach ($allGambar as $dataGambar) {
                  $i++;
                  if ($i == 1) {
                    $string = $string . '<div class="carousel-item active">
                    <img class="d-block w-100" src="'.$dataGambar->lokasi_gambar.'">
                    </div>';
                  } 
                  else {
                    $string = $string . '<div class="carousel-item">
                    <img class="d-block w-100" src="'.$dataGambar->lokasi_gambar.'">
                    </div>';
                  }
                }

                echo $string;

                                // prev button
                echo '<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">';
                echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                echo '</a>';

                                //next button
                echo '<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">';
                echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                echo '</a>';
              }

                            //selain 1
              else if ($jumlah == 1) {
                foreach ($allGambar as $dataGambar) {
                  $string = $string . '<div class="carousel-item active">
                  <img class="d-block w-100" src="' . substr($dataGambar->lokasi_gambar, 0) . "?t=" . time() . '">
                  </div>';
              }

              echo $string;
            }
          }
          echo '<div class="card">';
            echo '<div class="card-body">';
            echo  '<h5 class="card-title text-center">'.$dataBarang->nama_barang.'</h5>';
            echo  '<p class="card-text">'.$dataBarang->deskripsi.'</p>';
            echo  '<p class="card-text text-break">'.$dataBarang->harga.'</p>';
            echo  '<p class="card-text">'.$dataBarang->variasi.'</p>';
            echo  '<p class="card-text">'.$dataBarang->harga.'</p>';
            echo '</div>';
          }
          echo '</div>';
      }
      ?>
  
    </div>
  </div>
</div>

<!-- jajs -->
