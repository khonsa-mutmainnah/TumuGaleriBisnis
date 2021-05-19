<div class="container userlist">
    <div class="text-center">
        <h1 class="judul"><strong>USERLIST</strong></h1>
        <a class="btn add" href="index.php?p=user">ADD</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th> NO.</th>
            <th> username</th>
            <th> password</th>
            <th> nama</th>
            <th> no hp</th>
            <th> email</th>
            <th> kota</th>
            <!-- <th> role</th> -->
            <th> instagram</th>
            <!-- <th> foto</th> -->
            <!-- <th> action</th> -->
        </tr>
        </thead>
        <?php
        require_once('./class/class.User.php');
        $objUser = new User();
        $arrayResult = $objUser->SelectAllUser();
        if (count($arrayResult) == 0) {
            echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
        } else {
            $no = 1;
            foreach ($arrayResult as $dataUser) {
                echo '<tr>';
                echo '<td>'.$no .'</td>';
                echo '<td>'.$dataUser->username .'</td>';
                echo '<td>'.$dataUser->password .'</td>';
                echo '<td>'.$dataUser->nama .'</td>';
                echo '<td>'.$dataUser->email .'</td>';
                echo '<td>'.$dataUser->no_hp .'</td>';
                echo '<td>'.$dataUser->kota .'</td>';
                echo '<td>'.$dataUser->instagram_user .'</td>';
                echo '<td>'.$dataUser->foto .'</td>';
                echo '<td>'.$dataUser->role .'</td>';
                echo '<td>
                <a class="btn btn-warning"
                href="index.php?p=user&username=' . $dataUser->username . '"> Edit </a> |
                <a class="btn btn-danger"
                href="index.php?p=delete-user&username=' . $dataUser->username . '" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a></td>';
                echo '</tr>';
                $no++;
            }
        }
        ?>
    </table>
</div>