<?php 
require '../helper/functions.php';
$keyword =  $_GET["keyword"];
$query = "SELECT * FROM florafauna 
			WHERE 
			nama LIKE '%$keyword%' OR
			latin LIKE '%$keyword%' OR
			daerah LIKE '%$keyword%' OR	
			deskripsi LIKE '%$keyword%' 
		";
			$florafauna = query($query);
 ?>
 <div class="container">
	<table border="1" cellspacing="0" cellpadding="10">
 	<tr>
 		<th>No</th>
 		<th>Opsi</th>
 		<th>Gambar</th>
 		<th>Nama</th>
 		<th>Latin</th>
 		<th>Daerah Asal</th>
 		<th>Deskripsi</th>
 	</tr>
<?php if(empty($florafauna)) :?>
	<tr>
		<td colspan="7">
			<h1 align="center">Data tidak Ditemukan!</h1>
		</td>
	</tr>
<?php else : ?>

<?php $no = 1; foreach($florafauna as $punah) :?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td style="text-align: center;">
				<a href="ubah.php?id=<?php echo $punah ["id"]?>"><button type="button" class="btn btn-info">
				Ubah</button></a>
				<a href="hapus.php?id=<?php echo $punah["id"]?>" onclick="return confirm('Apakah anda yakin?')"?><button type="button" class="btn btn-danger">Hapus</button></a>
			</td>	
 			<td><img class="gambar-admin" src="../assets/img/<?php echo $punah["gambar"]; ?>"></td>
 			<td><?php echo $punah["nama"]; ?></td>			
			<td><?php echo $punah["latin"]; ?></td>
			<td><?php echo $punah["daerah"]; ?></td>	
			<td><?php echo $punah["deskripsi"]; ?></td>
		</tr>
<?php endforeach; ?>
	<?php endif ?>
	</table>
</div>