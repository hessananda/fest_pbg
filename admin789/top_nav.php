<div class="top-navbar">
				<div class="top-navbar-inner">
					
					<!-- Begin Logo brand -->
					<div class="logo-brand" style="padding-right:30px;padding-top: 10px">
                           <img src="images/logo-ffp.png" alt="CLC Purbalingga">
					</div><!-- /.logo-brand -->
					<!-- End Logo brand -->
					
					<div class="top-nav-content">
						
						<!-- Begin button sidebar left toggle -->
						<div class="btn-collapse-sidebar-left">
							<i class="fa fa-long-arrow-right icon-dinamic"></i>
						</div><!-- /.btn-collapse-sidebar-left -->
						<!-- End button sidebar left toggle -->
																		
						<?php
						include('user_session_nav.php');
						?>
						
						<!-- Begin Collapse menu nav -->
						<div class="collapse navbar-collapse" id="main-fixed-nav">
							
							
						</div><!-- /.navbar-collapse -->
						<!-- End Collapse menu nav -->
					</div><!-- /.top-nav-content -->
				</div><!-- /.top-navbar-inner -->
			</div><!-- /.top-navbar -->
                        
<?php 
    if  (basename(__DIR__)=='admin789' && !isset($_SESSION['user_id']) && !isset($_SESSION['user_name']) && !isset($_SESSION['user_password']) && !isset($_SESSION['user_type']) )
    {
          echo "<script>alert('Anda harus login'); window.location = 'login.php'</script>";
    } 
        
?>