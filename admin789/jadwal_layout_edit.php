<?php
	include('config/koneksi.php');
	include('config/Html_library.php');
	session_start();
	$html = new Html_library;
	$soalapa = "jadwal_layout";
	$page = "jadwal_layout";
	$menu_title = "Jadwal 5 Sticky"; // menentukan judul halaman ini
	$tentang = "Jadwal";
	$tabel = 'master_jadwal';
	$html->display_main($menu_title);
?>
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			<!-- BEGIN TOP NAV -->
			<div class="top-navbar">
			
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
					<h1 class="page-heading"><?php echo $menu_title ?></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="<?php echo $page.'view.php' ?>"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $menu_title ?></li>
					</ol>
					<!-- End breadcrumb -->
					
					<?php
						$id = $_GET['id'];
						$layout = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ".$soalapa." WHERE id = '$id' ")); 
					?>

				<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $page ?>_action.php?action=edit&id=<?php echo $layout['id'] ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Pilih <?php echo $tentang ?> untuk <?php echo $menu_title ?> Urutan ke  <?php echo $layout['urutan'] ?> </legend>

								<div class="form-group">
									<label class="col-lg-3 control-label">Pilih <?php echo $tentang ?> <p> (hanya yang aktif) </p></label>
									<div class="col-lg-5">
										<select name="<?php echo $soalapa ?>_tamu_id" id="sticky">
										
										<?php 	$event = mysqli_fetch_assoc(mysqli_query($con,"SELECT title, id FROM ".$tabel." WHERE id = '$layout[master_id]' "));  ?>										
																
<?php 												
										$event_query = mysqli_query($con,"SELECT title, id FROM master_jadwal WHERE aktif = '1' ORDER BY title ASC");  
										while ( $event_loop = mysqli_fetch_assoc($event_query) ) { ?>
											<option <?php echo $event_loop['id']==$event['id']?"selected":""  ?> value="<?php echo $event_loop['id'] ?>"><?php echo $event_loop['title'] ?></option>
<?php
										}
?>										
				
								</select>
								
									</div>
								</div>
								
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
<script type="text/javascript">
	$('select').change(function() {
    var selected = $(':selected', this);
    $('#category').val(selected.closest('optgroup').attr('label'));
    
});
</script>