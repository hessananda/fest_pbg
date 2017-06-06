<?php
	$soalapa="user"; // menentukan tabel apa yang dipilih
	$menu_title = "User"; // menentukan judul halaman ini

	$menu_detail_title = "Ganti Password $menu_title";

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
						$id = $_SESSION['user_id'];
						$satuan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM ".$soalapa." WHERE ".$soalapa."_id = '$id' ")); 
					?>
					
					<div class="the-box">
						<form id="eventform" method="post" action="<?php echo $soalapa ?>_action.php?action=edit_password&id=<?php echo $id ?>" class="form-horizontal" enctype="multipart/form-data" >
						
							<fieldset>
								<legend>Ganti Password <?php echo $menu_title ?></legend>

									<div class="form-group">
										<label class="col-lg-3 control-label">Username</label>
										<div class="col-lg-5">
											<input type="text" placeholder="" value="<?php echo $satuan['user_name'] ?>" class="form-control" name="username" id="username" />
										</div>
									</div>

								 	<div class="form-group">
										<label class="col-lg-3 control-label">Password Baru</label>
										<div class="col-lg-5">
											<input type="password" placeholder="" class="form-control" name="pass1" id="pass1" />
										</div>
									</div>
									
									 <div class="form-group">
										<label class="col-lg-3 control-label">Konfirmasi Password</label>
										<div class="col-lg-5">
											<input type="password" placeholder="" class="form-control" name="pass2" id="pass2" onkeyup="checkPass(); return false;" />
											<span id="confirmMessage" class="confirmMessage"></span>
										</div>
									</div>

							</fieldset>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<button id="sbmt" type="submit" class="btn btn-primary">Submit</button>
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
		function checkPass()
	{
	    //Store the password field objects into variables ...
	    var pass1 = document.getElementById('pass1');
	    var pass2 = document.getElementById('pass2');
	    var mybtn = document.getElementById('sbmt'); 
	    //Store the Confimation Message Object ...
	    var message = document.getElementById('confirmMessage');
	    //Set the colors we will be using ...
	    var goodColor = "#66cc66";
	    var badColor = "#ff6666";
	    //Compare the values in the password field 
	    //and the confirmation field
	    if(pass1.value == pass2.value){
	        //The passwords match. 
	        //Set the color to the good color and inform
	        //the user that they have entered the correct password 
	        pass2.style.backgroundColor = goodColor;
	        message.style.color = goodColor;
	       	mybtn.disabled = false ;
	        message.innerHTML = "Password Cocok!"
	    }else{
	        //The passwords do not match.
	        //Set the color to the bad color and
	        //notify the user.
	        pass2.style.backgroundColor = badColor;
	        message.style.color = badColor;
	        mybtn.disabled = true ;
	        message.innerHTML = "Passwords Tidak Cocok!"
	    }
	}  
</script>