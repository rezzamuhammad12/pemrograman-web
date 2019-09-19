<?php 

session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require '../helper/functions.php';

$id = $_GET["id"];
$punah = query("SELECT * FROM florafauna WHERE id = $id")[0];
	if( isset($_POST["ubah"])){

		if(ubah($_POST) > 0){
			echo "<script>
					alert('data berhasil diubah!');
					document.location.href='index.php';
					</script>";
		}else{
			echo "<script>
					alert('data gagal diubah!');
					</script>";
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Ubah Data Flora & Fauna</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<style>
		body {
			background: #eee;
		}

		.ubah {
			margin-top: 90px;
			margin-bottom: 90px;
		}

		.form-ubah {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);
		}

		.form-ubah-punah {
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
	<div class="ubah">
		<h1 class="form-ubah-punah">Ubah Data Flora & Fauna</h1>

		<form action="" method="post" enctype="multipart/form-data" class="form-ubah">
		<input type="hidden" name="id" value="<?php echo $punah['id']; ?>">
		<input type="hidden" name="gambarLama" value="<?php echo $punah['gambar']; ?> "> 
	
				<input type="name" name="nama" id="nama" required="required" autocomplete="off" autofocus="on" class="form-control" placeholder="Nama Flora & Fauna" value="<?php echo $punah["nama"] ?>">	
			
	
				<input type="text" name="latin" id="latin" placeholder="Nama Latin" class="form-control" value="<?php echo $punah["latin"] ?>">
			
		
				<input type="text" name="daerah" id="daerah" placeholder="Daerah Asal" class="form-control" value="<?php echo $punah["daerah"] ?>">
			
		
				<input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" value="<?php echo $punah["deskripsi"] ?>">
			
				<img src="../assets/img/<?php echo $punah['gambar']; ?>" width="40"><br>
				<input type="file" name="gambar" id="gambar">
			
		
				<button type="submit" name="ubah" class="btn btn-lg btn-info btn-block">Ubah Data</button>
			
	</form>
</div>
</body>
</html>