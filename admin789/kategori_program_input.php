<?php
	
	$page="kategori_program"; // menentukan tabel apa yang dipilih
	$menu_title = "Program"; // menentukan judul halaman ini

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

								<div class="form-group" id="category" >
									<label class="col-lg-3 control-label">Parent Category</label>
									<div class="col-lg-5">
									<?php 
										$query = "SELECT * from kategori_program WHERE aktif = 1  ORDER BY title ";
										$qry = mysqli_query($con,$query) 
									?>
										<select name="category">
											<option value="999">Root</option>

											<?php while ($kece = mysqli_fetch_assoc($qry)) {
											?>
											<option value="<?php echo $kece['id']?>"><?php echo $kece['title'] ?></option>
											<?php
											} ?>										
										</select>
									</div>
								</div>
								<?php textbox("Judul Kategori","title","") ?>
								<?php file_input("Image","file","masukan file gambar disini") ?>
								<?php textarea_summernote("Description", "description", "") ?>
                                <?php 
                                $pilihan = array('1' => 'Ya' , '0' => 'Tidak' );
                                combobox_array('Aktif ?','aktif',$pilihan);
                                ?>								                                                                
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