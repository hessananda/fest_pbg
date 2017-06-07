<?php 
  include('config/koneksi.php'); 
  include('config/fungsi_tgl.php'); 
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
	<?php
		$sql = "SELECT * FROM highlight WHERE id = '1' ";
		$query = mysqli_query($con,$sql);
		$satuan = mysqli_fetch_assoc($query);
	?>
		<div class="featured">
				<div class="container-fluid">
				<div class="row">
				<div class="col-xs-12 text-center">
				<a href="<?php echo $satuan['link'] ?>">
				<img src="images/highlight/<?php echo $satuan['image'] ?>" alt="<?php echo $satuan['caption'] ?>" class="responsive">
				</a>
				</div>				
				</div>				
				</div>		
		</div>
		<div class="container-fluid">		
		<div class="hilite">
				<div class="row">
				<div class="col-xs-12 col-sm-8 kiri">
<?php
	$sql = "SELECT a.* FROM master_program a	
	INNER JOIN program_layout c ON a.id = c.master_id
	WHERE c.urutan = '1' ";
	$query = mysqli_query($con,$sql);
	$satuan = mysqli_fetch_assoc($query);
?>
										<div class="row">
										<div class="col-xs-12 utama">
										<img src="images/program/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
										<div class="caption">
										<a href="<?php echo $satuan['content'] ?>" target="_blank" >
										<h1><?php echo $satuan['title'] ?></h1>
										</a>
										</div>
										</div>
										</div>
<?php
	$sql = "SELECT a.* FROM master_program a	
	INNER JOIN program_layout c ON a.id = c.master_id
	WHERE c.urutan = '2' ";
	$query = mysqli_query($con,$sql);
	$satuan = mysqli_fetch_assoc($query);
?>										
										<div class="row">
										<div class="col-xs-12 col-sm-6 utama-2">
										<img src="images/program/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
										<div class="caption">
										<a href="<?php echo $satuan['content'] ?>" target="_blank" >									
										<h1><?php echo $satuan['title'] ?></h1>
										</a>
										</div>
										</div>
<?php
	$sql = "SELECT a.* FROM master_program a 	
	INNER JOIN program_layout c ON a.id = c.master_id
	WHERE c.urutan = '3' ";
	$query = mysqli_query($con,$sql);
	$satuan = mysqli_fetch_assoc($query);
?>
										<div class="col-xs-12 col-sm-6 utama-2">
										<img src="images/program/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
										<div class="caption">
										<a href="<?php echo $satuan['content'] ?>" target="_blank" >
										<h1><?php echo $satuan['title'] ?></h1>
										</a>
										</div>
										</div>
										</div>
				</div>		
<?php
	$sql = "SELECT a.* FROM description a WHERE a.id = '2' ";
	$query = mysqli_query($con,$sql);
	$satuan = mysqli_fetch_assoc($query);
?>				
				<div class="col-xs-12 col-sm-4">
										<div class="row">
										<div class="col-xs-12 submisi">
										<strong><?php echo $satuan['title'] ?></strong>
										&nbsp;
										<a target="_blank" href="<?php echo $satuan['description'] ?>" class="btn btn-default">Selengkapnya</a>
										</div>
<?php
	$sql = "SELECT a.* FROM master_jadwal a
	INNER JOIN jadwal_layout c ON a.id = c.master_id
	ORDER BY c.urutan ";
	$query = mysqli_query($con,$sql);	
?>
										<div class="col-xs-12 jadwal">
										<h1><strong>Jadwal Penayangan</strong></h1>										
										</div>		
<?php
	while ($satuan = mysqli_fetch_assoc($query)) {
?>
										<div class="col-xs-12 jadwal">
										<span class="tanggal"><?php echo tgl_indo($satuan['date']) ?></span>
										<br>
										<span class="judul"><strong><?php echo $satuan['title'] ?></strong></span>
										</div>
<?php		
	}
	
?>																						
										<div class="col-xs-12 jadwal text-center">
										<a href="jadwal.html" class="btn btn-default-2">Lihat Jadwal Selengkapnya</a>
										</div>											
																					
										</div>
				</div>					
				</div>				
		</div>		
		</div>
		
	<div class="container-fluid konten isi-konten detail">

	<div class="row">
	<div class="col-xs-12">
	
	  <div class="wrap">
  <h3><strong>Dokumentasi</strong></h3>
  <a href="https://www.youtube.com/watch?v=9JyUssZKiO4&list=PLlBHzaZi94Cm9t_Ofb5b9Vuwv5RihPncn" target="_blank" class="btn btn-default btn-default-3">Lihat semua dokumentasi</a>

  <div class="frame" id="basic">
    <ul class="clearfix">
<?php
	$sql = "SELECT a.* FROM dokumentasi a";
	$query = mysqli_query($con,$sql);		
	while ($satuan = mysqli_fetch_assoc($query)) {
?>    

      <li>
	      <a href="<?php echo $satuan['link'] ?>" target="_blank" >
	      	<img src="images/dokumentasi/<?php echo $satuan['image'] ?>" class="object-fit_contain responsive">
		  	<h1><?php echo $satuan['title'] ?></h1>
		  </a>
	  </li>      
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