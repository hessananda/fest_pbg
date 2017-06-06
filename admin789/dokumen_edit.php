<?php
	$soalapa="dokumen"; // menentukan tabel apa yang dipilih
	$page = 'dokumen' ;
	$menu_title = "Dokumen"; // menentukan judul halaman ini

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
								<legend><?php echo $menu_detail_title ?></legend>							
							<?php textbox_update('Caption','title',$satuan['title']) ?>												
							
							<div class="form-group">
							<label class="col-lg-3 control-label">Dokumen Sekarang</label>
							<div class="col-lg-5">				
								<a style="padding-top: 10px" target="_blank" href="../doc/<?php echo $satuan['dokumen'] ?>">Download &nbsp;&nbsp;<i class="fa fa-download"></i></a>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label"> Ganti Dokumen</label>
							<div class="col-lg-5">
								<div class="input-group">
								<input type="text" class="form-control" readonly>
								<span class="input-group-btn">
									<span class="btn btn-default btn-file">
										Browse&hellip; <input type="file" name="file">
									</span>
								</span>
							</div><!-- /.input-group -->
							</div>
						</div>

                            <?php textarea_summernote_update("Keterangan", "description", $satuan['description']) ?>									                            
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