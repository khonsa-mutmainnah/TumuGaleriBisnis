<div class="tokolist">
<h4 class="title"><span class="text"><strong>LIST TOKO</strong></span></h4>
<a class="btn position-absolute start-50 translate-middle" href="index.php?p=toko" >ADD</a>
<table class="table" id="tabeltoko">
    <tr>
        <th>NO.</th>
        <th>id_toko</th>
        <th>nama_toko</th>
        <th>logo</th>
        <th>id_lokasi</th>
        <th>tagline</th>
        <th>no_telp</th>
        <th>status</th>
        <th>instagram</th>
    </tr>

    <?php
        require_once('./class/class.Toko.php');
        $objEmployee = new Toko();
        $arrayResult = $objEmployee->SelectAllToko();

        if(count($arrayResult)==0){
            echo '<tr><td colspan="9">TIDAK ADA DATA!</td></tr>';
        }
        else{
            $no=1;
            foreach ($arrayResult as $dataToko){
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$dataToko->id_toko.'</td>';
                echo '<td>'.$dataToko->nama_toko.'</td>';
                echo '<td>'.$dataToko->logo.'</td>';
                echo '<td>'.$dataToko->id_lokasi.'</td>';
                echo '<td>'.$dataToko->tagline.'</td>';
                echo '<td>'.$dataToko->no_telp.'</td>';
                echo '<td>'.$dataToko->status.'</td>';
                echo '<td>'.$dataToko->instagram.'</td>';
                echo '<td> <a class="btn btn-warning"
                href="index.php?p=toko&ssn='.$dataEmployee->ssn.'"> Edit </a> |
                <a class="btn btn-danger" 
                href="index.php?p=delete-toko&ssn='.$dataEmployee->ssn.'" 
                onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';
                echo '</tr>';
                $no++;
            }
        }
    ?>
</table>
</div>