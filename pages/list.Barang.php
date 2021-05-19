<h4>
	<span>
		<strong>List Barang</strong>
	</span>
</h4>
<a href="index.php?p=barang">tambahkan</a>
<table class="table table-bordered">
	<tr>
		<th>id_barang</th>
		<th>nama_barang</th>
		<th>deskripsi</th>
		<th>harga</th>
		<th>variasi</th>
	</tr>
</table>

<?php 
	require_once('./class/class.Barang.php');
	$objBarang = new Barang();
	$arrayResult = $objBarang->SelectAllBarang();

	if (count($arrayResult)==0) {
		echo "<tr><td>no data</td></tr>";
	}else{
		$no = 1;
		foreach ($$arrayResult as $data) {
			echo "<tr>";
			echo "<td>" .$no. "</td>";
			echo "<td>" .$data->id_barang. "</td>";
			echo "<td>" .$data->nama_barang. "</td>";
			echo "<td>" .$data->deskripsi. "</td>";
			echo "<td>" .$data->harga. "</td>";
			echo "<td>" .$data->variasi. "</td>";
			echo "</tr>";
		}
	}
 ?>