<?php
	$soalapa="master_jadwal"; // menentukan tabel apa yang dipilih
	$page = 'jadwal' ;
	$menu_title = "Jadwal"; // menentukan judul halaman ini

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
										
                            <?php textbox_update('Judul','title',$satuan['title']) ?>	
                            <?php datebox_update("Tanggal","tanggal",'',$satuan['date']) ?>                            
							<?php 
								$query_1 = "SELECT HOUR(time_start) as start_hour, MINUTE(time_start) as start_minute 
											FROM master_jadwal WHERE id = $id ";
								timebox_update("Jam Mulai","hour_start","minute_start",$query_1,"start_hour","start_minute") 
							?>
							<?php 
								$query_2 = "SELECT HOUR(time_finish) as finish_hour, MINUTE(time_finish) as finish_minute 
											FROM master_jadwal WHERE id = $id ";
								timebox_update("Jam Selesai","hour_finish","minute_finish",$query_2,"finish_hour","finish_minute") 
							?>							
							<?php textarea_summernote_update('Keterangan','content',$satuan['content']) ?>                            
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