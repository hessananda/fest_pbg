<?php 
  include('config/koneksi.php'); 
  include('config/subtitute.php'); 
?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Kompetisi - Festival Film Purbalingga 2017</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css?ver=1.2" rel="stylesheet">	
    <link href="css/slider.css" rel="stylesheet">		
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
    <?php include('part/header.php'); ?>	

	<div class="bread">
	<div class="container-fluid">
	<a href="beranda.html">Beranda</a> / Juri
	</div>
	</div>
	<div class="container-fluid konten isi-konten detail">
	<div class="row">
	<div class="col-xs-12">
	
	  <div class="wrap" style="margin-top: 0;">
  <h1><strong>Dewan Juri</strong></h1>
  <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h3>
  <div class="frame" id="basic">
    <ul class="clearfix">

<?php
  $sql = "SELECT * FROM master_juri";
  $query = mysqli_query($con,$sql) ;
  while ($satuan = mysqli_fetch_assoc($query)) {
?>
    <li>
    <a href="detail-juri-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['title'])) ?>.html">
    <img src="images/juri/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
    </a>
    <a href="detail-juri-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['title'])) ?>.html">
    <h1><?php echo $satuan['title'] ?></h1></li>
    </a>
<?php   
  }  

?>          
    </ul>
	</div>
  
 


</div>		
    </div>	
	</div>	
	

	</div>

	
	
	
	
	</div>
	
<?php include('part/footer.php'); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src='js/plugins.js'></script>
	<script src='js/sly.min.js'></script>
    <script src="js/index.js?ver=5.1"></script>	
  </body>
</html>