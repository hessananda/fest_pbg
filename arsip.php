<?php 
  include('config/koneksi.php'); 
?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Festival Film Purbalingga 2017</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">	
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
	<a href="beranda.html">Beranda</a> / Arsip
	</div>
	</div>
	<div class="container-fluid konten isi-konten detail">
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 20px;">
		<h5><strong>Arsip</strong></h5>
		<h1 class="judul-artikel"><strong>Unduh Arsip Terkait Festival Film Purbalingga</strong></h1>
		</div>
		<div class="col-xs-12">
		<div class="row">
		   <div class="col-xs-8"><strong>Nama File</strong></div>		
		   <div class="col-xs-4"><strong>Keterangan</strong></div>		   		   
		</div>
<?php
  $sql = "SELECT * FROM dokumen";
  $query = mysqli_query($con,$sql) ;
  while ($satuan = mysqli_fetch_assoc($query)) {
?>
		<div class="row" style="border-bottom:1px solid #ccc;padding: 5px 0;">
		   <div class="col-xs-8"><a target="_blank" href="doc/<?php echo $satuan['dokumen'] ?>"><?php echo $satuan['title'] ?></a></div>
		   <div class="col-xs-4"><em><?php echo $satuan['description'] ?></em></div>
		</div>
<?php  	
  }  

?>		
				
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