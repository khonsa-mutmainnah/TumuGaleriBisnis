<div class="tokolist">
    <h4 class="title"><span class="text"><strong>LIST TOKO</strong></span></h4>
    <a class="btn position-absolute start-50 translate-middle" href="index.php?p=user" >ADD</a>
    <table class="table" id="tabelemployee">
        <tr>
            <th>NO.</th>
            <th>username</th>
            <th>password</th>
            <th>nama</th>
            <th>email</th>
            <th>no_hp</th>
            <th>kota</th>
            <th>role</th>
        </tr>

        <?php
            require_once('./class/class.User.php');
            $objEmployee = new User();
            $arrayResult = $objUser->SelectAllUser();

            if(count($arrayResult)==0){
                echo '<tr><td colspan="8">TIDAK ADA DATA!</td></tr>';
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