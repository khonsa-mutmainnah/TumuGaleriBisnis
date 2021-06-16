<div class="home">
    <div class=container>
      <div class="card text-center">
        <div class="card-body">
        <section>
          <?php
            require_once('./class/class.Toko.php'); 		
            $objToko = new Toko();
            $objToko->id_toko = $_GET['id_toko'];
            if(isset($_GET['id_toko'])){
              $objToko->SelectOneToko();

              echo '<div class="text-center">';
              echo "<img src='./upload/toko/".$objToko->logo."' class='rounded' style='width:110px;' alt='logo'/>";
              echo '</div>';
              echo '<h4 class="card-title" style="font-weight: 600; margin-top:5px;">'.$objToko->nama_toko.'</h4>';
              echo '<p class="card-text">'.$objToko->tagline.'</p>';
              echo '<p class="card-text">'.$objToko->lokasi->kecamatan.', '.$objToko->lokasi->kota.', '.$objToko->lokasi->provinsi.''.'</p>';
              echo '<br>';  
              echo '<a class="btn" href="?p=barang-penjual&id_toko='.$objToko->id_toko.'">tambah barang</a>';
              echo '<a class="btn" href="?p=toko-edit&id_toko='.$objToko->id_toko.'&id_user='.$objToko->user->id_user.'">edit toko</a>';
              echo '<a class="btn" href="?p=toko-logo">edit logo toko</a>';
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
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="card">
          <div id="carouselExampleControlsNoTouching_4" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./gambar/foto.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./gambar/foto.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./gambar/foto.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching_4" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching_4" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">nama barang</h5>
              <p class="card-text">di sini nantinya jadi deskripsi barang. isinya bisa pengertian barang atau apa apa yang terkait dengan barang tersebut.</p>
              <p class="card-text text-break">harga barang</p>
              <p class="card-text">variasinya ada apa aja. macem macem warna atau apapun</p>
              <p class="card-text">00000000</p>
              <a class="btn card-text d-grid gap-2" href="?p=barang">edit barang</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jajs -->
