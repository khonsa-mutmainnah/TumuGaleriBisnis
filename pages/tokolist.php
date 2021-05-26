<div class="container tokolist">
    <div class="text-center">
        <h1 class="judul"><strong>TOKO</strong></h1>
        <a class="btn" href="index.php?p=toko">ADD</a>
    </div>
    <table class="table" id="tabeltoko">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">id_toko</th>
                <th scope="col">nama_toko</th>
                <th scope="col">logo</th>
                <th scope="col">id_lokasi</th>
                <th scope="col">tagline</th>
                <th scope="col">no_telp</th>
                <th scope="col">status</th>
                <th scope="col">instagram</th>
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
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $dataToko->id_toko . '</td>';
                    echo '<td>' . $dataToko->nama_toko . '</td>';
                    echo '<td>' . $dataToko->logo . '</td>';
                    echo '<td>' . $dataToko->id_lokasi . '</td>';
                    echo '<td>' . $dataToko->tagline . '</td>';
                    echo '<td>' . $dataToko->no_telp . '</td>';
                    echo '<td>' . $dataToko->status . '</td>';
                    echo '<td>' . $dataToko->instagram . '</td>';
                    echo '<td> <a class="btn btn-warning"
                    href="index.php?p=toko&id_toko='.$dataToko->id_toko.'"> Edit </a> |
                    <a class="btn btn-danger" 
                    href="index.php?p=delete-toko&id_toko='.$dataToko->id_toko.'" 
                    onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';
                    echo '</tr>';
                    $no++;
                }
            }
        ?>
    </table>
</div>
</div>