<div class="kategorilist">
<h4 class="title"><span class="text"><strong>LIST KATEGORI</strong></span></h4>
<a class="btn position-absolute start-50 translate-middle" href="index.php?p=kategori" >ADD</a>
<table class="table" id="tabelkategori">
    <tr>
        <th>NO.</th>
        <th>id_kategori</th>
        <th>nama_kategori</th>

    </tr>

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