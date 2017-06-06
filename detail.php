<?php 
  include('config/koneksi.php'); 

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
			$master = 'master_program';
			$category = 'kategori_program';
			$folder = 'program';

			$sql = "SELECT a.*,b.title category FROM $master a INNER JOIN $category b ON a.category_id = b.id WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));
			$breadcrumb = $satuan['category'].' / ';
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
			$master = 'master_program';
			$category = 'kategori_program';
			$folder = 'program';

			$sql = "SELECT a.*,b.title category FROM $master a INNER JOIN $category b ON a.category_id = b.id WHERE a.id = $id " ;
			$satuan = mysqli_fetch_assoc(mysqli_query($con,$sql));
			$breadcrumb = $satuan['category'].' / ';
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
	<a href="beranda.html">Beranda</a> / <a href="<?php echo $category_name.".html" ?>"><?= ucfirst($category_name) ?></a> / <?= $satuan['title'] ?>
	</div>
	</div>
	<div class="container-fluid konten isi-konten detail">
	<div class="row">
		<div class="col-xs-12 col-sm-4 detail">
		<h5><strong><?= ucfirst($category_name) ?></strong></h5>
		<h1 class="judul-artikel"><strong><?php echo $satuan['title'] ?></strong></h1>
		</div>
		<div class="col-xs-12 col-sm-8">
		<img src="images/<?php echo $folder ?>/<?php echo $satuan['image_banner'] ?>" alt="<?php echo $satuan['title'] ?>" class="responsive" style="margin-bottom:20px;">
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