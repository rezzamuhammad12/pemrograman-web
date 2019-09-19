<?php 
require '../helper/functions.php';

if( isset($_POST["registrasi"]) ) {
	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = 'login.php';
		</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<style>
		body {
			background: #eee;
		}

		.registrasi {
			margin-top: 80px;
			margin-bottom: 80px;
		}

		.form-registrasi {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);
		}

		.form-registrasi-heading {
			text-align: center;
		}

		/*.checkbox {
			margin-bottom: 20px;
			font-weight: normal;
			text-align: center;
		}*/

		.form-control {
			position: relative;
	 		font-size: 16px;
	  		height: auto;
	  		padding: 10px;
		  	z-index: 2;
		}

		input[type="text"] {
	  		margin-bottom: 20px;
	  		border-bottom-left-radius: 0;
	  		border-bottom-right-radius: 0;
	}

		input[type="password"] {
	 		margin-bottom: 20px;
	  		border-top-left-radius: 0;
	  		border-top-right-radius: 0;
	</style>
</head>
<body>
	<div class="registrasi">
	<h1 class="form-registrasi-heading">Registrasi</h1>
	<form action="" method="post" class="form-registrasi">

			<input type="text" name="username" id="username" placeholder="Username" required="required" class="form-control" autocomplete="off" autofocus="on">
			
			<input type="password" name="password1" id="password1" placeholder="Password" required="required" class="form-control">
			
			<input type="password" name="password2" id="password2" placeholder="Retype Password" required="required" class="form-control">
			
			<button type="submit" name="registrasi" class="btn btn-lg btn-warning btn-block">
				<span class="glyphicon glyphicon-user" aria-hidden="true"> Registrasi</span>
			</button>
	</form>
	</div>
</body>
</html>