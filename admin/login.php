<?php 
session_start();
require'../helper/functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username

	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}

if( isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}


 	if( isset($_POST["login"])){
 		$username = $_POST["username"];
 		$password = $_POST["password"];

 		$query = "SELECT * FROM user WHERE username = '$username'";
 		$cek_user = mysqli_query($conn, $query);

 		// cek username

 	if( mysqli_num_rows($cek_user) == 1){

 		// cek password

 		$row = mysqli_fetch_assoc($cek_user);

 		if( password_verify($password, $row["password"]) ) {

 		// set session
 				$_SESSION["login"] = true;

 		// cek remember me
 				if( isset($_POST['remember']) ) {
 					setcookie('id', $row['id'], time()+ 60);
 					setcookie('key', hash('sha256', $row['username']));
 				}

 			header("Location: index.php");
 			exit;

 		}

 		 }
 			$error = true;
	}
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<style>
		body {
			background: #eee;
		}

		.login {
			margin-top: 80px;
			margin-bottom: 80px;
		}

		.form-login {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);
		}

		.form-login-heading {
			text-align: center;
		}

		.checkbox {
			margin-bottom: 20px;
			font-weight: normal;
			text-align: center;
		}

		.form-control {
			position: relative;
	 		font-size: 16px;
	  		height: auto;
	  		padding: 10px;
		  	z-index: 2;
		}

		.text {
			margin-top: -2px;
			margin-left: 0;
			margin-right: 0;
			margin-bottom: 10px;

		}

		input[type="text"] {
	  		margin-bottom: 10px;
	  		border-bottom-left-radius: 0;
	  		border-bottom-right-radius: 0;
	}

		input[type="password"] {
	 		margin-bottom: 20px;
	  		border-top-left-radius: 0;
	  		border-top-right-radius: 0;
	}

	</style>
</head>
<body>
	


<div class="login">
	<h1 class="form-login-heading">Login Admin</h1>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic; text-align: center;">Username / Password Salah!</p>
<?php endif; ?>

<form action="" method="post" class="form-login">

		<input type="text" name="username" id="username" placeholder="Username" required="required" class="form-control" autocomplete="off" autofocus="on">
	
		<input type="password" name="password" id="password" placeholder="Password" required="required" class="form-control">

		<label for="remember" class="checkbox">
		<input type="checkbox" name="remember" id="remember"> Remember me
		</label>

		<i style="font-size: 15px; font-style: italic; font-weight: normal; margin-right: 40px;" for="daftar">Registrasi disini!</i>

		<a href="registrasi.php">
		<button type="button" class="btn btn-warning">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			<span class="glyphicon glyphicon-user" aria-hidden="true"> Registrasi</span>
		</button>
		</a>
		
		<div class="text">
		<i>Login : admin/admin</i>
		</div>

		<button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>

	</form>
</div>



</body>
</html>