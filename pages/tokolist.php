<h4 class="title"><span class="text"><strong>LIST TOKO</strong></span></h4>
<a class=btn btn-primary href="index.php?p=employee" style="color:yellow;">ADD</a>
<table class="table table-bordered" id="tabelemployee" style="color:white;">
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
        $arrayResult = $objEmployee->SelectAllEmployee();

        if(count($arrayResult)==0){
            echo '<tr><td colspan="5">TIDAK ADA DATA!</td></tr>';
        }
        else{
            $no=1;
            foreach ($arrayResult as $dataEmployee){
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$dataEmployee->ssn.'</td>';
                echo '<td>'.$dataEmployee->fname.'</td>';
                echo '<td>'.$dataEmployee->alamat.'</td>';
                echo '<td> <a class="btn btn-warning"
                href="index.php?p=employee&ssn='.$dataEmployee->ssn.'"> Edit </a> |
                <a class="btn btn-danger" 
                href="index.php?p=deleteemployee&ssn='.$dataEmployee->ssn.'" 
                onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';
                echo '</tr>';
                $no++;
            }
        }
    ?>
</table>