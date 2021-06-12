<div class="container gambarBarangList">
    <div class="text-center">
        <h1 class="judul"><strong>gambar barang</strong></h1>
        <a class="btn add" #id="addButton" href="?p=gambar_barang">ADD</a>
    </div>
    <table class="table" id="tabelgambarbarang">
        <thead>
            <tr>
                <th>NO.</th>
                <th>nama barang</th>
                <th>gambar barang</th>
                <th>action</th>
            </tr>
        </thead>

        <?php
            require_once('./class/class.gambar_barang.php');
            $objGambarBarang = new GambarBarang();
            $arrayResult = $objGambarBarang->SelectAllGambarBarang();

            if(count($arrayResult)==0){
                echo '<tr><td colspan="9">TIDAK ADA DATA!</td></tr>';
            }
            else{
                $no=1;
                foreach ($arrayResult as $dataGambarBarang){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$dataGambarBarang->barang->nama_barang.'</td>';
                    echo '<td>'.$dataGambarBarang->lokasi_gambar.'</td>';
                    echo '<td> <a class="btn"
                    href="index.php?p=gambar_barang&id_barang='.$dataGambarBarang->id_barang.'"> Edit </a> |
                    <a class="btn" 
                    href="index.php?p=delete-gambarBarang&id_barang='.$dataGambarBarang->id_barang.'" 
                    onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';
                    echo '</tr>';
                    $no++;
                }
            }
        ?>
    </table>
    
</div>