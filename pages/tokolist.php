<h4 class="title"><span class="text"><strong>EMPLOYEE LIST</strong></span></h4>
<a class=btn btn-primary href="index.php?p=employee">ADD</a>
<table class="table table-bordered" id="tabelemployee" style="color:white;">
    <tr>
        <th>NO.</th>
        <th>SSN</th>
        <th>NAME</th>
        <th>ADDRESS</th>
        <th>ACTION</th>
    </tr>

    <?php
        require_once('./class/class.Toko.php');
        $objEmployee = new Employee();
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