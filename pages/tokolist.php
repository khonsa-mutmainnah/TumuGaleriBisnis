<?php 
require_once('./akses-admin.php'); 

?>
<div class="container tokolist">
    <div class="text-center">
        <h1 class="judul"><strong>TOKO</strong></h1>
        <a class="btn add" #id="addButton" href="?p=toko">ADD</a>
    </div>
    <table class="table table-responsive" id="tabeltoko">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">nama_toko</th>
                <th scope="col">logo</th>
                <th scope="col">tagline</th>
                <th scope="col">no_telp</th>
                <th scope="col">status</th>
                <th scope="col">instagram</th>
                <th scope="col">url toko</th>
                <th scope="col">user</th>
                <th scope="col">lokasi</th>
                <th scope="col">kategori</th>
                <th scope="col">action</th>
            </tr>
        </thead>

        <?php
            require_once('./class/class.Toko.php');
            $objToko = new Toko();
            $arrayResult = $objToko->SelectAllToko();

            if(count($arrayResult)==0){
                echo '<tr><td colspan="9">TIDAK ADA DATA!</td></tr>';
            }
            else{
                $no=1;
                foreach ($arrayResult as $dataToko){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td class="text-break">'.$dataToko->nama_toko.'</td>';
                    echo "<td ><img src='./upload/toko/".$dataToko->logo."' width='50px'/></td>";
                    echo '<td class="text-break">'.$dataToko->tagline.'</td>';
                    echo '<td>'.$dataToko->no_telp.'</td>';
                    // echo '<td>'.$dataToko->status.'</td>';
                    if($dataToko->status == 0){
                        echo '<td class="text-break">butuh persetujuan</td>';
                    }
                    else if($dataToko->status == 1){
                        echo '<td>disetujui</td>';
                    }
                    else{
                        echo '<td class="text-break">tidak disetujui</td>';
                    }
                    echo '<td>'.$dataToko->instagram.'</td>';
                    echo '<td class="text-break">'.$dataToko->url_toko.'</td>';
                    echo '<td>'.$dataToko->user->username.'</td>';
                    echo '<td class="text-break">'.$dataToko->lokasi->kecamatan.', '.$dataToko->lokasi->kota.', '.$dataToko->lokasi->provinsi.'</td>';
                    echo '<td class="text-break">'.$dataToko->kategori->nama_kategori.'</td>';
                    
                    // echo '<td>'.$dataToko->status.'</td>';
                    
                    echo '<td>
                    <a class="btn"href="?p=toko-status-edit&id_toko='.$dataToko->id_toko.'"> status </a>
                    <a class="btn"href="?p=toko&id_toko='.$dataToko->id_toko.'"> Edit </a>
                    <a class="btn"href="?p=delete-toko&id_toko='.$dataToko->id_toko.'" 
                    onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a>
                    <a class="btn"href="?p=toko-logo&id_toko='.$dataToko->id_toko.'"> edit logo</a> </td>';
                    echo '</tr>';
                }
            }
        ?>
    </table>
</div>
</div>