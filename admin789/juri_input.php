<?php
	
	$page="juri"; // menentukan tabel apa yang dipilih
	$menu_title = "Juri"; // menentukan judul halaman ini

	$menu_detail_title = "Input $menu_title";

	include('config/koneksi.php');
	include('config/Html_library.php');
	include('config/form_maker.php');
	session_start();
	$html = new Html_library;
	$html->display_main("Input $menu_title");
?>
 <script src="assets/js/hesa.js" type="text/javascript"></script> 
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			<!-- BEGIN TOP NAV -->
			<?php require_once 'top_nav.php'; ?>
			<!-- END TOP NAV -->
			
			<!-- BEGIN SIDEBAR LEFT -->
                        <?php include "sidebar_left.php" ?>
			<!-- END SIDEBAR LEFT -->
										
			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">	
				
				<div class="container-fluid">
					<!-- Begin page heading -->
					<h1 class="page-heading"><?php echo $menu_title ?>&nbsp;&nbsp;<small>Masukan Sebuah <?php echo $menu_title ?></small></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="<?php echo $page ?>_view.php"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="the-box">
						<form id="myForm" method="post" action="<?php echo $page ?>_action.php?action=input" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend id="result"></legend>                     
								<?php textbox("Full Name","full_name","") ?>
								<?php file_input("Image","file","masukan file gambar disini") ?>														
                                <?php textarea_summernote("Description", "description", "") ?>
								                                                       												                                                                                            
							</fieldset>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
                                    <button type="submit" id="sub" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div><!-- /.the-box -->
										
				</div><!-- /.container-fluid -->
				
				
                                <!-- BEGIN FOOTER -->
				<?php require_once 'footer.php'; ?>
				<!-- END FOOTER -->	
				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->			
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
<?php $html->destroy_main(); ?>