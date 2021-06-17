<div class="container galeri-bisnis">
	<div class="judul">
        <h1 class="judul-main text-center" ><strong>tumu galeri bisnis</strong></h1>
    </div>
    
    <div class="kategori-dan-toko">
        <div class="d-grid gap-2 d-md-block mx-auto">
            <a class="btn kategori-gb" type="button" href="?p=GaleriBisnis">Semua</a>
            <?php
                require_once('./class/class.kategori.php');         
                        
                $objCategory = new Kategori(); 
                $arrayResult = $objCategory->SelectAllKategori();

                foreach ($arrayResult as $dataCategory) {
                    echo '<a class="btn kategori-gb" type="button" href="?p=toko-kategori&id_kategori='.$dataCategory->id_kategori.'">'.$dataCategory->nama_kategori.'</a>';                
                    echo '</li>';   
                }
            ?> 
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
            require_once('./class/class.Toko.php'); 		
            $objToko = new Toko();
            $objToko->kategori->id_kategori= $_GET['id_kategori'];
            $arrayResult = $objToko->SelectTokoByKategori();
            if(count($arrayResult)==0){
                echo '<tr><td colspan="9">TIDAK ADA DATA!</td></tr>';
            }
            else{
                foreach ($arrayResult as $dataToko){
                    echo '<div class="card">';
                                echo '<img src="./upload/toko/'.$dataToko->logo.'" class="card-img-top rounded mx-auto d-block" height="30px" alt="logo">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title text-center">'.$dataToko->nama_toko.'</h5>';
                                echo '<p class="card-text">'.$dataToko->lokasi->kecamatan.', '.$dataToko->lokasi->kota.', '.$dataToko->lokasi->provinsi.''.'</p>';
                                echo '<p class="card-text">'.$dataToko->instagram_toko.'</p>';
                                echo '<p class="card-text">'.$dataToko->no_telp.'</p>';
                                echo '<p class="card-text"> toko milik '.$dataToko->user->username.'</p>';
                                echo '<a class="btn card-text d-grid gap-2" href="?p=Home&id_toko='.$dataToko->id_toko.'">kunjungi toko</a>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        ?>
    </div>
    