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
 
   <?php if(empty($florafauna)) :?>
      <h1>Data tidak Ditemukan!</h1>
    <?php else : ?>

 	<?php foreach ($florafauna as $punah) :?>

<div class="container">
  <div class="gambar text-center">
	<img class="img-circle" src="assets/img/<?php echo $punah['gambar'] ?>">
   </div>
	<a href="php/profil.php?id=<?php echo $punah['id'] ?>"><h3><?php echo $punah['nama'] ?></h3></a>

<p style="color: #ddd">Nama Latin  : <?php echo $punah["latin"] ?></p>
<p style="color: #ddd">Daerah Asal : <?php echo $punah["daerah"] ?></p>

</div>
<?php endforeach ?>
<?php endif ?>