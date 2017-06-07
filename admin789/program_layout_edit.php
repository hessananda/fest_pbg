<?php
	include('config/koneksi.php');
	include('config/Html_library.php');
	include('config/form_maker.php');

	session_start();
	$html = new Html_library;
	$soalapa = "program_layout";
	$page = "program_layout";
	$menu_title = "Program 3 Sticky"; // menentukan judul halaman ini
	$tentang = "Item";
	$tabel = 'master_program';
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
						$layout = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM master_program a INNER JOIN program_layout b ON a.id = b.master_id WHERE b.id = '$id' ")); 
					?>

				<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $page ?>_action.php?action=edit&id=<?php echo $layout['id'] ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Pilih <?php echo $tentang ?> untuk <?php echo $menu_title ?> Urutan ke  <?php echo $layout['urutan'] ?> </legend>

								<div class="form-group">									
								
							<?php file_gambar_update('../images/program/',$layout['image_banner'],'file','english') ?>					
                            <?php textbox_update('Title','title',$layout['title']) ?>
							<?php textbox_update("Link","link",$layout['content']) ?>

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