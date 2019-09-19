<?php 

session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require '../helper/functions.php';
	if( isset($_POST["tambah"])){
	
		if(tambah($_POST) > 0){
			echo "<script>
					alert('data berhasil ditambahkan!');
					document.location.href='index.php';
					</script>";
		}else{
			echo "<script>
					alert('data gagal ditambahkan!');
					</script>";
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah Data Flora & Fauna</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<style>
		body {
			background: #eee;
		}

		.tambah {
			margin-top: 90px;
			margin-bottom: 90px;
		}

		.form-tambah {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);
		}

		.form-flora-fauna {
			text-align: center;
		}

		.form-control {
			position: relative;
	 		font-size: 16px;
	  		height: auto;
	  		padding: 10px;
		  	z-index: 2;
		}	

		input {
	  		margin-bottom: 10px;
	  		border-bottom-left-radius: 0;
	  		border-bottom-right-radius: 0;
	}

	</style>
</head>
<body>
	<div class="tambah">
		<h1 class="form-flora-fauna">Tambah Data Flora & Fauna</h1>

		<form action="" method="post" enctype="multipart/form-data" class="form-tambah"> 
	
				<input type="text" name="nama" id="nama" placeholder="Nama Flora & Fauna" required="required" autocomplete="off" autofocus="on" class="form-control">	
			
				<input type="text" name="latin" id="latin" placeholder="Nama Latin" class="form-control">
			
				<input type="text" name="daerah" id="daerah" placeholder="Daerah Asal" class="form-control">
			
				<input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control">
			
				<input type="file" name="gambar" id="gambar">
			
		
				<button type="submit" name="tambah" class="btn btn-lg btn-success btn-block">Tambah Data</button>
			
		
	</form>
</div>
</body>
</html>