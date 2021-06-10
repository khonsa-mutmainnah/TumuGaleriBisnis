<div class="container baranglist">
    <div class="text-center">
        <h1 class="judul"><strong>Barang</strong></h1>
        <a class="btn add" #id="addButton" href="dashboard.php?p=barang">ADD</a>
    </div>
    <table class="table">
        <thead>
            <tr>
			<th>id barang</th>
			<th>nama barang</th>
			<th>deskripsi</th>
			<th>harga</th>
			<th>variasi</th>
            <th>nama toko</th>
            <th>action</th>
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
				// echo "<td>" . $no . "</td>";
				echo "<td>" . $dataBarang->id_barang . "</td>";
				echo "<td>" . $dataBarang->nama_barang . "</td>";
				echo "<td>" . $dataBarang->deskripsi . "</td>";
				echo "<td>" . $dataBarang->harga . "</td>";
				echo "<td>" . $dataBarang->variasi . "</td>";
                echo "<td>" . $dataBarang->toko->nama_toko . "</td>";
                echo '<td>
                <a class="btn" href="index.php?p=barang&id_barang=' . $dataBarang->id_barang . '"> Edit </a> |
                <a class="btn" href="index.php?p=delete-barang&id_barang=' . $dataBarang->id_barang . '" onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"> Delete </a></td>';
                            echo '</tr>';
                $no++;
            }
        }
        ?>
    </table>
</div>

