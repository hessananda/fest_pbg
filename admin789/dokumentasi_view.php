<?php 
	
	$soalapa="dokumentasi"; // menentukan tabel apa yang dipilih
	$page = 'dokumentasi';
	$menu_title = "Dokumentasi"; // menentukan judul halaman ini

	$menu_detail_title = "Daftar $menu_title";

	session_start();
	include('config/koneksi.php');
	include('config/Html_library.php');
    require_once 'config/potong_kata.php';

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
					<h1 class="page-heading"><?php echo $menu_title ?></h1>
					<!-- End page heading -->
				
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb default square rsaquo sm">
						<li><a href="<?php echo $page.'_view.php' ?>"><i class="fa fa-home"></i></a></li>
                        <li><a href="<?php echo $page.'_view.php' ?>"><?php echo $menu_title ?></a></li>
						<li class="active"><?php echo $menu_detail_title ?></li>
					</ol>
					<!-- End breadcrumb -->

					<div class="row" style="padding-bottom:5px;">
						<div class="col-md-6">
							<button type="button" class="btn btn-info" onclick="location.href='<?php echo $page ?>_input.php'"><i class="fa fa fa-plus"></i> Input <?php echo $menu_title ?></button>
						</div>
						
						<div class="col-md-6">							
						</div>
					</div>	
					
					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>No</th>									
									<th>Caption</th>  									                      
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = mysqli_query($con,"SELECT * FROM ".$soalapa." ORDER BY id DESC");
									$no = 1;
									while ($satuan = mysqli_fetch_assoc($query)) {
										?>
											<!-- Modal -->
										<div class="modal fade" id="DefaultModal<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="DefaultModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="DefaultModalLabel"><center> Apakah Anda Yakin akan menghapus data <?php echo '" '.$satuan['title'].' "' ?> ?</center>
											  </div>

											  <div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" onclick="location.href='<?php echo $page ?>_action.php?action=hapus&id=<?php echo $satuan['id'] ?>' " >Hapus</button>
											  </div><!-- /.modal-footer -->
											</div><!-- /.modal-content -->
										  </div><!-- /.modal-doalog -->
										</div><!-- /#DefaultModal -->

										<?php

										?>
										<tr class="odd gradeX">
											<td width="5%"><?php echo $no ?></td>                                                                                        
											<td><?php echo $satuan['title'] ?></td>										
											<td><a href="<?php echo $page ?>_edit.php?id=<?php echo $satuan['id'] ?>">Edit</a> / <a data-toggle="modal" data-target="#DefaultModal<?php echo $no ?>" href="#" >Hapus</a></td>
										</tr>

									<?php		
									$no++;
									}
								?>								
							</tbody>
						</table>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box .default -->
					<!-- END DATA TABLE -->
						
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