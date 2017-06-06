<?php
	$soalapa="profile"; // menentukan tabel apa yang dipilih
	$menu_title = "Profile"; // menentukan judul halaman ini

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
					<h1 class="page-heading"><?php echo $menu_title ?><small><?php echo $menu_detail_title ?></small></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->

					<?php
						$id = 1;
						$satuan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ".$soalapa." WHERE ".$soalapa."_id = '$id' ")); 
					?>
					
					<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $soalapa ?>_action.php?action=edit&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Edit <?php echo $menu_title ?></legend>
			
								<h4>Header Logo</h4>
								<hr>
                                <div class="form-group">
                                        <label class="col-lg-3 control-label">Recent Header Logo</label>
                                        <div class="col-lg-5">
                                            <img width="50%" height="50%" src="../images/logo/<?php echo $satuan['profile_logo'] ?>" alt="IMAGE">
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-lg-3 control-label">New Header Logo ?</label>
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
                                <hr>
				                    <h4>Footer Logo</h4>
								<hr>                                            
                            <?php file_gambar_update('../images/logo/',$satuan['profile_footer_logo'],'profile_footer_logo','english') ?>	
                            <hr>	
							                           
							<?php textbox_update('Facebook','profile_facebook',$satuan['profile_facebook']) ?>
							<?php textbox_update('Twitter','profile_twitter',$satuan['profile_twitter']) ?>
							<?php textbox_update('Instagram','profile_instagram',$satuan['profile_instagram']) ?>							
							<?php textbox_update('Youtube','profile_youtube',$satuan['profile_youtube']) ?>								
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