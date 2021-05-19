<div class="container kategorilist">
    <div class="text-center">
        <h1 class="judul"><strong>USERLIST</strong></h1>
        <a class="btn" href="index.php?p=user">ADD</a>
    </div>
    <table class="table" id="tabelkategori">
        <thead>
            <tr>
                <th>NO.</th>
                <th>id kategori</th>
                <th>nama kategori</th>
                <th>action</th>
            </tr>
        </thead>

        <?php
            require_once('./class/class.kategori.php');
            $objKategori = new Kategori();
            $arrayResult = $objKategori->SelectAllKategori();

            if(count($arrayResult)==0){
                echo '<tr><td colspan="9">TIDAK ADA DATA!</td></tr>';
            }
            else{
                $no=1;
                foreach ($arrayResult as $dataKategori){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$dataKategori->id_kategori.'</td>';
                    echo '<td>'.$dataKategori->nama_kategori.'</td>';
                    echo '<td> <a class="btn btn-warning"
                    href="index.php?p=kategori&id_kategori='.$dataKategori->id_kategori.'"> Edit </a> |
                    <a class="btn btn-danger" 
                    href="index.php?p=delete-kategori&id_kategori='.$dataKategori->id_kategori.'" 
                    onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';
                    echo '</tr>';
                    $no++;
                }
            }
        ?>
    </table>
</div>
</div>