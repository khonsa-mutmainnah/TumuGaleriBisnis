<div class="container lokasilist">
    <div class="text-center">
        <h1 class="judul"><strong>Lokasi</strong></h1>
        <a class="btn add" #id="addButton" href="index.php?p=lokasi">ADD</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>NO.</th>
                <th>ID Lokasi</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>action</th>
            </tr>
        </thead>

        <?php
        require_once('./class/class.lokasi.php');
        $objLokasi = new Lokasi();
        $arrayResult = $objLokasi->SelectAllLokasi();
        if (count($arrayResult) == 0) {
            echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
        } else {
            $no = 1;
            foreach ($arrayResult as $dataLokasi) {
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $dataLokasi->id_lokasi . '</td>';
                echo '<td>' . $dataLokasi->kecamatan . '</td>';
                echo '<td>' . $dataLokasi->kota . '</td>';
                echo '<td>' . $dataLokasi->provinsi . '</td>';
                echo '<td>
                <a class="btn"
                href="index.php?p=lokasi&id_lokasi=' . $dataLokasi->id_lokasi . '"> Edit </a> |
                <a class="btn"
                href="index.php?p=delete-lokasi&id_lokasi=' . $dataLokasi->id_lokasi . '" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a></td>';
                            echo '</tr>';
                $no++;
            }
        }
        ?>
    </table>
</div>