<?php 

session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
	}

require '../helper/functions.php';

if(isset($_GET["cari"]) ){
	$keyword =  $_GET["keyword"];
	$query = "SELECT * FROM florafauna 
				WHERE 
				nama LIKE '%$keyword%' OR
				latin LIKE '%$keyword%' OR
				daerah LIKE '%$keyword%' OR
				deskripsi LIKE '%$keyword%' 

		";
	$florafauna = query($query);

} else{
	$florafauna = query("SELECT * FROM florafauna");
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman Admin</title>
 	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

 	<style>
 		*{
 			margin: 0;
 			padding: 0;
 		}

 		html {
 			position: relative;
 		}

 		body {
 			background-image: url(../assets/img/bg.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
 		}

 		h1 {
			color: #000;
			text-align: center;
			font-family: arial;
			padding-top: 7%;
			padding-bottom: 0;
		}

		hr {
			width: 400px;
			border: 2px solid #000;
			margin: auto;
			margin-bottom: 15px;
		}

		th {
			text-align: center;
		}

		td {
 			padding: 15px;
 		}

		table{
			margin: auto;
			background-color: rgba(233,233,233,0.7);
		}

		.container {
			width: 100%;
		}

		.page-scroll {
			margin-top: 5px;
			font-family: Times new Romans;
			font-size: 17px;
			color: green;
		}

		.navbar {
			filter: drop-shadow(0px 0px 10px lightblue);

		}

		.navbar-brand img {
			width: 50px;
			height: 40px;
			display: block;
			margin-top: -5px;
		}

 		.clear {
			clear:both; 
 		}

 		.gambar-admin {
 			width: 200px;
 		}
 		.social li{
			display: inline;
			margin-right: 10px;
		}

		.social li a {
			text-decoration: none;
		}

 		footer {
			position: absolute;
			width: 100%;
			height: 100px;
			margin-top: 50px;
			margin-bottom:0;
			left: 0;
			background-color: #000;
			padding-top: 20px;
			z-index: 999;
		}

		footer p {
			color: #ddd;
			font-size: 1em;
		}

 	</style>
 </head>
 <body>
 	<!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
      <img alt="Brand" src="../assets/img/laptop.png">
    </a>
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 

         <ul class="nav navbar-nav navbar-left">

          <li><a href="#home" class="page-scroll">Home</a></li>
          <li><a href="#profil" class="page-scroll">Daftar Flora & Fauna</a></li>
        </ul>
<form action="" method="get" class="navbar-form navbar-right" role="search">
  <div class="form-group">
    <input type="text" name="keyword" placeholder="Masukan Keyword pencarian..." size="40" autofocus="on" autocomplete="off" class="form-control keyword">
  <button type="submit" name="cari" class="btn btn-default tombol-cari">Cari</button>
    </div>
  <form class="nav navbar-nav navbar-right">
  	<a href="../admin/tambah.php"><button type="button" class="btn btn-success" style="margin: 7px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah data</button></a>
  	<a href="../admin/logout.php"><button type="button" class="btn btn-danger" style="margin: 5px;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</button></a>
  </form>
</form>
      </div>
     </div>
   </nav>

   <div id="home"></div>
   <div id="profil"></div>
 	
	<h1>Laman Administrator</h1>
	<hr>

	<table border="1" cellspacing="0" cellpadding="10" class="container">
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
	

	<div class="clear"></div>

	<!-- footer -->
   <footer>
   <div class="container-fluid text-center">
     <div class="row">  
       <div class="col-sm-12">
       <p>&copy; Copyright 2018. by. <i class="glyphicon glyphicon-user">|</i><a href="https://about.me/rezza" target="_blank">Rezza Mochamad Pernanda</a>.</p>
     </div>
     </div>
     <div class="row">
       <div class="col-sm-12">

         <ul class="social">
        <li>
          <a href="https://web.facebook.com/reza.mohammad.925" target="_blank">
            <img src="../assets/img/facebook.png">
          </a>
        </li>
        <li>
          <a href="https://twitter.com/RezzaMochamadP" target="_blank">
            <img src="../assets/img/twitter.png">
          </a>
        </li>
        <li>
          <a href="https://plus.google.com/discover?hl=id" target="_blank">
            <img src="../assets/img/gplus.png">
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/rezzamuhammad12/" target="_blank">
            <img src="../assets/img/instagram.png">
          </a>
        </li>
        <li>
          <a href="" target="_blank">
            <img src="../assets/img/youtube.png">
          </a>
        </li>
       </div>
     </div>
   </div>
   </footer>
   <!-- akhir footer -->

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/script.js"></script>
 </body>
 </html>