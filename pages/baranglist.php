<div class="container lokasilist">
    <div class="text-center">
        <h1 class="judul"><strong>Barang</strong></h1>
        <a class="btn add" #id="addButton" href="index.php?p=barang">ADD</a>
    </div>
    <table class="table">
        <thead>
            <tr>
			<th>id_barang</th>
			<th>nama_barang</th>
			<th>deskripsi</th>
			<th>harga</th>
			<th>variasi</th>
            </tr>
        </thead>

        <?php
        require_once('./class/class.Barang.php');
        $objBarang = new Barang();
        $arrayResult = $objBarang->SelectAllBarang();
        if (count($arrayResult) == 0) {
            echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
        } else {
            $no = 1;
            foreach ($arrayResult as $dataBarang) {
                echo '<tr>';
				echo "<td>" . $no . "</td>";
				echo "<td>" . $data->id_barang . "</td>";
				echo "<td>" . $data->nama_barang . "</td>";
				echo "<td>" . $data->deskripsi . "</td>";
				echo "<td>" . $data->harga . "</td>";
				echo "<td>" . $data->variasi . "</td>";
                echo '<td>
                <a class="btn"
                href="index.php?p=barang&id_barang=' . $dataBarang->id_barang . '"> Edit </a> |
                <a class="btn"
                href="index.php?p=delete-barang&id_barang=' . $dataBarang->id_barang . '" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a></td>';
                            echo '</tr>';
                $no++;
            }
        }
        ?>
    </table>
</div>

