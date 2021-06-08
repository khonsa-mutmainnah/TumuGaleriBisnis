<div class="container userlist">
    <div class="text-center">
        <h1 class="judul"><strong>USERLIST</strong></h1>
        <a class="btn" href="?p=user">ADD</a>
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th> NO.</th>
            <th> username</th>
            <th> password</th>
            <th> nama</th>
            <th> no hp</th>
            <th> email</th>
            <th> kota</th>
            <th> instagram</th>
            <th> foto</th>
            <th> role</th>
            <th> action</th>
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
                echo '<td class="text-break">'.$no .'</td>';
                echo '<td class="text-break">'.$dataUser->username .'</td>';
                echo '<td class="text-break">'.$dataUser->password .'</td>';
                echo '<td class="text-break">'.$dataUser->nama .'</td>';
                echo '<td class="text-break">'.$dataUser->no_hp .'</td>';
                echo '<td class="text-break">'.$dataUser->email .'</td>';
                echo '<td class="text-break">'.$dataUser->kota .'</td>';
                echo '<td class="text-break">'.$dataUser->instagram_user .'</td>';
                echo "<td ><img src='".$dataUser->foto."' width='50px'/></td>";
                echo '<td class="text-break">'.$dataUser->role .'</td>';
                echo '<td>
                <a class="btn"
                href="?p=user&username=' . $dataUser->username . '"> Edit </a> 
                <a class="btn"
                href="?p=delete-user&username=' . $dataUser->username . '" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Del </a></td>';
                echo '</tr>';
                $no++;
            }
        }
        ?>
    </table>
</div>