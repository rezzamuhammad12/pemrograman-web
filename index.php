<?php 

require 'helper/functions.php';

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
 	<title>Halaman User</title>
 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
 </head>
 <body>

<!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
      <img alt="Brand" src="assets/img/laptop.png">
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
  <form>
  <a href="admin/login.php"><button type="button" class="btn btn-success" style="margin: 6px;"><span class="glyphicon glyphicon-log-in" aria-hidden="true"> Login</span></button></a>
  </form>
</form>
      </div>
     </div>
   </nav>
  
  <!-- akhir navbar -->
<div id="home"></div>

<!-- carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicator pindah slide -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- Carousel pindah slide gambar  -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="assets/img/w.jpg" alt="First Slide">
            <div class="carousel-caption">
                <h3>Welcome To MyWebsite</h3>
                <p>Rezza Mochamad Pernanda</p>
            </div>
        </div>
        <div class="item">
            <img src="assets/img/bg2.jpg" alt="Second Slide">
            <div class="carousel-caption">
                <h3>Flora</h3>
                <p>Flora/Tumbuhan Yang Hampir Punah Di Nusantara Indonesia</p>
            </div>
        </div>
        <div class="item">
            <img src="assets/img/bg3.jpg" alt="Third Slide">
            <div class="carousel-caption">
                <h3>Fauna</h3>
                <p>Fauna/Hewan Yang Hampir Punah Di Nusantara Indonesia</p>
            </div>
        </div>
    </div>
    <!-- Carousel geser -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

 <!-- Akhir Carousel  -->

<div id="profil"></div>


 	<h1>Daftar Flora & Fauna Hampir Punah</h1>
  <hr>
<div class="container1">
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
</div>
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
            <img src="assets/img/facebook.png">
          </a>
        </li>
        <li>
          <a href="https://twitter.com/RezzaMochamadP" target="_blank">
            <img src="assets/img/twitter.png">
          </a>
        </li>
        <li>
          <a href="https://plus.google.com/discover?hl=id" target="_blank">
            <img src="assets/img/gplus.png">
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/rezzamuhammad12/" target="_blank">
            <img src="assets/img/instagram.png">
          </a>
        </li>
        <li>
          <a href="" target="_blank">
            <img src="assets/img/youtube.png">
          </a>
        </li>
       </div>
     </div>
   </div>
   </footer>
   <!-- akhir footer -->


<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script2.js"></script>

 </body>
 </html>