<?php
	$soalapa="kategori_program"; // menentukan tabel apa yang dipilih
	$page = 'kategori_program' ;
	$menu_title = "Program"; // menentukan judul halaman ini

	$menu_detail_title = "Edit $menu_title";

	session_start();
	include('config/koneksi.php');
	include('config/form_maker.php');
	include('config/Html_library.php');

	$html = new Html_library;
	$html->display_main($menu_detail_title);
?>
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
					<h1 class="page-heading"><?php echo $menu_title ?>&nbsp;&nbsp;<small><?php echo $menu_detail_title ?></small></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="<?php echo $page ?>_view.php"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->

					<?php
						$id = $_GET['id'];
						$satuan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ".$soalapa." WHERE id = '$id' ")); 
					?>
					
					<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $page ?>_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Edit <?php echo $menu_title ?></legend>
							
							<div class="form-group" id="category" >
									<label class="col-lg-3 control-label">Parent Category</label>
									<div class="col-lg-5">
									<?php 

										$query = "SELECT * from kategori_program WHERE aktif = 1  ORDER BY title ";
										$qry = mysqli_query($con,$query)

									?>
										<select name="category">
											<option <?php echo $satuan['parent_id']=='999'?'selected':'' ?> value="999">Root</option>

											<?php while ($kece = mysqli_fetch_assoc($qry)) {
											?>
											<option <?php echo $satuan['parent_id']==$kece['id']?'selected':'' ?> value="<?php echo $kece['id']?>"><?php echo $kece['title'] ?></option>
											<?php
											} ?>										
										</select>
									</div>
							</div>

                            <?php textbox_update('Judul Kategori','title',$satuan['title']) ?>	
                            <?php file_gambar_update('../images/kategori_program/',$satuan['image_banner'],'file','english') ?>
                            <?php textarea_summernote_update("Description", "description", $satuan['description']) ?>											
                            <?php 
                                  $pilihan = array('1' => 'Ya' , '0' => 'Tidak' );
                                  combobox_array_update('Aktif ?','aktif',$pilihan,$satuan['aktif']);
                            ?>
							</fieldset>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button>
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