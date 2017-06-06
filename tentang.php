<?php 
  include('config/koneksi.php'); 

  $sql = "SELECT * FROM tentang_kami" ;
  $satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));
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
	<a href="beranda.html">Beranda</a> / Tentang Festival Film Purbalingga
	</div>
	</div>
	<div class="container-fluid konten isi-konten detail">
	<div class="row">
		<div class="col-xs-12 col-sm-4 detail">
		<h5><strong>Tentang Kami</strong></h5>
		<h1 class="judul-artikel"><strong>Festival Film Purbalingga</strong></h1>
		</div>	
		<div class="col-xs-12 col-sm-8">
		<img src="images/tentang_kami/<?php echo $satuan['image_banner'] ?>" class="responsive" style="margin-bottom:20px;">
		<?php echo $satuan['content'] ?>
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