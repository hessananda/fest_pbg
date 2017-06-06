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

	<div class="bread">
	<div class="container-fluid">
	<a href="beranda.html">Beranda</a> / Jadwal
	</div>
	</div>
	<div class="container-fluid konten isi-konten detail">
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 20px;">
		
		<h1 class="judul-artikel"><strong>Berikut jadwal Festival Film Purbalingga :</strong></h1>
		</div>
		
		<div class="col-xs-12">
		
	<?php
      $sql =" SELECT date FROM master_jadwal GROUP BY date ORDER BY date DESC ";
      $query = mysqli_query($con,$sql) ;
      while ($satuan = mysqli_fetch_assoc($query)) {
    ?>  
      <h5><strong><?php echo tgl_indo($satuan['date']) ?></strong></h5>
	  <br>
      <div class="row">
		   <div class="col-xs-2"><strong>Jam</strong></div>
		   <div class="col-xs-5"><strong>Acara</strong></div>		
		   <div class="col-xs-5"><strong>Keterangan</strong></div>		   		   
	  </div>
        <?php
        $sql1 = "SELECT * FROM master_jadwal WHERE aktif = '1' AND date = '$satuan[date]' ORDER BY time_start ASC ";
        $query1 = mysqli_query($con,$sql1) ;
        while ($satuan1 = mysqli_fetch_assoc($query1)) {
        ?>
        <div class="row" style="border-bottom:1px solid #ccc;padding: 5px 0;">
		   <div class="col-xs-2"><?php echo date("H:i", strtotime($satuan1['time_start'])) ?> - <?php echo date("H:i", strtotime($satuan1['time_finish'])) ?> WIB</div>
		   <div class="col-xs-5"><?php echo $satuan1['title'] ?></div>		
		   <div class="col-xs-5"><em><?php echo $satuan1['content'] ?></em></div>		   		   
		</div>
        <?php
        }
        ?>     
        <br><br>   
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