<?php 
  include('config/koneksi.php');
  include('config/subtitute.php');

	$category = isset($_GET['category'])?$_GET['category']:'juri' ;
	$category_name = isset($_GET['category'])?$_GET['category']:'juri' ;
	$id = isset($_GET['id'])?$_GET['id']:'15';

	switch ($category) {
		case 'juri':
			$master = 'master_juri';			
			$folder = 'juri';

			$sql = "SELECT * FROM $master a WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));
			$breadcrumb = '';
			break;

		case 'program':
			$master = 'kategori_program';			
			$folder = 'kategori_program';

			$sql = "SELECT a.* FROM $master a WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));

			$sql1 = "SELECT title FROM $master a WHERE a.id = '$satuan[parent_id]' " ;
			$satuan1 = mysqli_fetch_assoc(mysqli_query($con,$sql1));

			$breadcrumb = $satuan1['title'].' / ';
			break;

		case 'film':
			$master = 'master_film';			
			$folder = 'film';

			$sql = "SELECT a.* FROM $master a WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));

			$sql1 = "SELECT title FROM kategori_program a WHERE a.id = '$satuan[category_id]' " ;
			$satuan1 = mysqli_fetch_assoc(mysqli_query($con,$sql1));

			$breadcrumb = $satuan1['title'].' / ';
			break;

		case 'kompetisi':
			$master = 'master_kompetisi';
			$category = 'kategori_kompetisi';
			$folder = 'kompetisi';

			$sql = "SELECT a.*,b.title category FROM $master a INNER JOIN $category b ON a.category_id = b.id WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));
			$breadcrumb = $satuan['category'].' / ';
			break;
		
		default:
			$master = 'kategori_program';			
			$folder = 'kategori_program';

			$sql = "SELECT a.* FROM $master a WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));
			
			$sql1 = "SELECT title FROM $master a WHERE a.id = '$satuan[parent_id]' " ;
			$satuan1 = mysqli_fetch_assoc(mysqli_query($con,$sql1));

			$breadcrumb = $satuan1['title'].' / ';

			break;
	}	

?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $satuan['title'] ?></title>

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
	<a href="beranda.html">Beranda</a> / <a href="<?php echo $category_name.".html" ?>"><?= ucfirst($category_name) ?></a> / <?php echo $category_name=='film'?$satuan['judul']:$satuan['title'] ?>
	</div>
	</div>
	<div class="container-fluid konten isi-konten detail">
	<div class="row">
		<div class="col-xs-12 col-sm-4 detail">
		<h5><strong><?= ucfirst($category_name) ?></strong></h5>
		<h1 class="judul-artikel"><strong><?php echo $category_name=='film'?$satuan['judul']:$satuan['title'] ?></strong></h1>

<?php
if($category_name=='film'){
?>		
		<br>
		<p><?php echo $satuan['produksi'] ; ?>, <?php echo $satuan['tahun'] ; ?></p>
		<p>Durasi : <?php echo $satuan['durasi'] ; ?></p>
		<p>Genre  : <?php echo $satuan['genre'] ; ?></p>
<?php
}
?>
		</div>
		<div class="col-xs-12 col-sm-8">
		<img src="images/<?php echo $folder ?>/<?php echo $satuan['image_banner'] ?>" alt="<?php echo $category_name=='film'?$satuan['judul']:$satuan['title'] ?>" class="responsive" style="margin-bottom:20px;">
		<?php 
		if ($category_name=='program') {

			echo $satuan['description'] ;

		} elseif($category_name=='film'){

			echo $satuan['sinopsis'] ;

		}
		else{
			echo $satuan['content'] ;
		}		
		
		?>
		</div>
		
		<?php
if ($category_name=='program'){
?>
	<div class="col-xs-12 hidden-xs" style="padding-top:40px;">
			<?php
			  $sql = "SELECT * FROM kategori_program WHERE parent_id = '$satuan[id]'  ";
			  $query = mysqli_query($con,$sql) ;
			  $count = mysqli_num_rows($query);
if ($count>0) {

			    $sql = "SELECT * FROM kategori_program WHERE parent_id = '$satuan[id]'  ";
			  	$query = mysqli_query($con,$sql) ;
			    while ($satuan = mysqli_fetch_assoc($query)) {
			?>
			    <div class="col-sm-3 program-lg">
			    <a href="detail-program-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['title'])) ?>.html">
			    <img src="images/kategori_program/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
			    </a>
			    <a href="detail-program-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['title'])) ?>.html">
			    <h3><?php echo $satuan['title'] ?></h3>
			    </a>
				</div>
				
			<?php
			  }
			?>
<?php	
}
else{

  				$sql = "SELECT * FROM master_film WHERE category_id = '$satuan[id]'  ";
			  	$query = mysqli_query($con,$sql) ;
			    while ($satuan = mysqli_fetch_assoc($query)) {
			?>
			    <div class="col-sm-3 program-lg">
			    <a href="detail-film-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['judul'])) ?>.html">
			    <img src="images/film/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
			    </a>
			    <a href="detail-film-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['judul'])) ?>.html">
			    <h3><?php echo $satuan['judul'] ?></h3>
			    </a>
				</div>
			<?php
			  }
			?>
<?php
}
?>     
		</div>
<?php
}
?>	
		
	</div>

<?php
if ($category_name=='program'){
?>
	<div class="row visible-xs">
	<div class="col-xs-12">
		<div class="wrap" style="margin-top: 0;">			  
			  <div class="frame" id="basic">
			    <ul class="clearfix">
			<?php
			  $sql = "SELECT * FROM kategori_program WHERE parent_id = '$satuan[id]'  ";
			  $query = mysqli_query($con,$sql) ;
			  $count = mysqli_num_rows($query);
if ($count>0) {

			    $sql = "SELECT * FROM kategori_program WHERE parent_id = '$satuan[id]'  ";
			  	$query = mysqli_query($con,$sql) ;
			    while ($satuan = mysqli_fetch_assoc($query)) {
			?>
			    <li>
			    <a href="detail-program-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['title'])) ?>.html">
			    <img src="images/kategori_program/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
			    </a>
			    <a href="detail-program-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['title'])) ?>.html">
			    <h1><?php echo $satuan['title'] ?></h1></li>
			    </a>
				
			<?php
			  }
			?>
<?php	
}
else{

  				$sql = "SELECT * FROM master_film WHERE category_id = '$satuan[id]'  ";
			  	$query = mysqli_query($con,$sql) ;
			    while ($satuan = mysqli_fetch_assoc($query)) {
			?>
			    <li>
			    <a href="detail-film-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['judul'])) ?>.html">
			    <img src="images/film/<?php echo $satuan['image_banner'] ?>" class="object-fit_contain responsive">
			    </a>
			    <a href="detail-film-<?=$satuan['id']?>-<?= str_replace($cari,$ganti, strtolower($satuan['judul'])) ?>.html">
			    <h1><?php echo $satuan['judul'] ?></h1></li>
			    </a>
			<?php
			  }
			?>
<?php
}
?>     
			    </ul>
			</div>			  			 
		</div>		
		</div>
	</div>
<?php
}
?>	

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