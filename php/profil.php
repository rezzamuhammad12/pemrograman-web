<?php
	if(!isset($_GET["id"])){
		header("location: index.php");
		exit;
	}

	require '../helper/functions.php';
	$id = $_GET["id"];
	$florafauna = query("SELECT * FROM florafauna WHERE id = $id")[0];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profil Flora & Fauna</title>
 	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
 	<style>
 		body{
 			background-image: url(../assets/img/keren.jpg);
 			background-repeat: no-repeat;
 			background-attachment: fixed;
 			width: 100%;	
 		}
 		p {
 			font-family: sans-serif;
 			color: #ddd;
 		}

 	</style>
 </head>
 <body>
<div class="container">
 <div class="image text-center">
	<img src="../assets/img/<?php echo $florafauna['gambar'] ?>">
</div>
	<h3 style="color: #fff"><?php echo $florafauna['nama'] ?></h3>
	
			<p>Nama latin : <?php echo $florafauna['latin'] ?></p>
			<p>Daerah Asal :<?php echo $florafauna['daerah'] ?></p>
			<p>Deskripsi : <?php echo $florafauna['deskripsi'] ?></p>
			<br>
			<p><a href="../index.php">Kembali</a></p>
	
</div>
 </body>
 </html>