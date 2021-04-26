<div class="tokolist">
    <h4 class="title"><span class="text"><strong>LIST USER</strong></span></h4>
    <a class="btn position-absolute start-50 translate-middle" href="index.php?p=user" >ADD</a>
    <table class="table" id="tabelUser">
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
            $objUser = new User();
            $arrayResult = $objUser->SelectAllUser();

            if(count($arrayResult)==0){
                echo '<tr><td colspan="8">TIDAK ADA DATA!</td></tr>';
            }
            else{
                $no=1;
                foreach ($arrayResult as $dataUser){
                    echo '<tr>';
                    echo '<td>'.$no.'</td>';
                    echo '<td>'.$dataUser->username.'</td>';
                    echo '<td>'.$dataUser->password.'</td>';
                    echo '<td>'.$dataUser->nama.'</td>';
                    echo '<td>'.$dataUser->email.'</td>';
                    echo '<td>'.$dataUser->no_hp.'</td>';
                    echo '<td>'.$dataUser->kota.'</td>';
                    echo '<td>'.$dataUser->role.'</td>';
                    echo '<td> <a class="btn btn-warning"
                    href="index.php?p=user&username='.$dataUser->username.'"> Edit </a> |
                    <a class="btn btn-danger" 
                    href="index.php?p=delete-user&username='.$dataUser->username.'" 
                    onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a> </td>';
                    echo '</tr>';
                    $no++;
                }
            }
        ?>
    </table>
</div>