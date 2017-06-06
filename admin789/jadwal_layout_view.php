<?php
	include('config/koneksi.php');
	include('config/fungsi_tgl.php');
	include('config/Html_library.php');

	$menu_title = "Jadwal 5 Sticky"; // menentukan judul halaman ini
	$page = "jadwal_layout";
	$soalapa = "jadwal"; //berkaitan dengan tabel, isi huruf depan dengan huruf kecil
	$tentang = "jadwal_layout"; //berikaitan dengan tampilan, isi huruf depan dengan kapital

	session_start();
	$html = new Html_library;
	$html->display_main($menu_title);
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
					<h1 class="page-heading"><?php echo $menu_title ?></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="index.html"><i class="fa fa-home"></i></a></li>
						<li><a href="#fakelink"><?php echo $menu_title ?></a></li>
					</ol>
					<!-- End breadcrumb -->
					
					<div class="row">
						<div class="col-lg-5">
							<div align="center">
								<img width="100%" height="100%" src="images/jadwal_layout.jpg" >
								<!-- <iframe src="http://www.spektakel.id/dev1" height="600" width="100%"></iframe> -->								 
							</div>
						</div>

						<div class="col-lg-7">
							
							<!-- BEGIN DATA TABLE -->
							<div class="the-box">
								<div class="table-responsive">
								<table class="table table-striped table-hover">
									<thead class="the-box dark full">
										<tr>
											
											<th style="width: 30px;">Urutan</th>											
											<th>Sticky</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query = "SELECT l.*, e.title FROM ".$soalapa."_layout AS l, master_".$soalapa." AS e WHERE l.master_id = e.id ORDER BY urutan";
											$users = mysqli_query($con,$query);
											$no = 1;
											
											while ($user = mysqli_fetch_assoc($users)) {
												?>
											
												<tr class="odd gradeX">													
													<td class="center"> <?php echo $user['urutan'] ?></td>											
													<td class="center"> <?php echo $user['title'] ?></td>
													<td><a href="<?php echo $page ?>_edit.php?id=<?php echo $user['id'] ?>">Edit</a></td>
												</tr>

											<?php											
											}
										?>								
									</tbody>
								</table>
								</div><!-- /.table-responsive -->
							</div><!-- /.the-box .default -->
							<!-- END DATA TABLE -->

						</div>
					</div>
				
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