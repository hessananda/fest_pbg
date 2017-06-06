<?php
$time=strtotime($event['event_start_time']);
$time_finish=strtotime($event['event_finish_time']);

	$event_type = "";

	if ($event['event_type']=='gratis/free') {
		$event_type = 'gratis';
	}
	elseif ($event['event_type']=='berbayar/paid') {
		$event_type = 'berbayar';
	}
	elseif ($event['event_type']=='keduanya/both') {
		$event_type = 'berbayar & gratis';
	}
	else{
		$event_type = '';
	}
?>
<div class="modal fade" id="<?php echo $tanda ; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAvatar" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-times-circle-o" aria-hidden="true"></span>
					</button>
				</div>
				<div class="modal-detail">
					
			<div class="row">
				<div class="col-md-12 col-sm-12">
<?php
					if ($tanda=='draft'.$draft_no) {
?>
					<a href="post_event_draft_edit.php?id=<?php echo $event['event_id'] ?>" class="btn btn-orange">Ubah</a>
					<br><br>

<?php						
					}
?>
					<img class="cover" src="images/events/<?php echo $event['event_image'] ?>">
					<div class="post-title">
						<h4 id="kategori" class="text-uppercase text-orange"><?php echo $event['event_category'] ?></h4>
						<h1 id="title" class="text-uppercase"><?php echo $event['event_title'] ?></h1>
					</div>
					<div class="post-detail">
						<div class="row">
							<div class="col-md-12">
								<p class="border-orange text-uppercase"><?php echo hesa_date($event['event_start_date'],$event['event_finish_date']) ?> | <?php echo date("H:i", $time) ?> - <?php echo $event['event_finish_time']=='24:00:00'?'Selesai':date("H:i",$time_finish) ?></p>
								<p class="border-orange text-uppercase"><?php echo $event_type ?></p>
								<p class="border-orange text-uppercase">								
								<?php echo $event['event_city']<>''?$event['event_city']:'' ; ?><?php echo $event['province_name']<>''?', '.$event['province_name']:'' ; ?>
								</p>
								<p class="border-orange text-uppercase">
								<?php echo $event['event_location'] ?><?php echo $event['event_detail_address']<>''?', '.$event['event_detail_address']:'' ; ?><?php echo $event['event_gmap_link']<>''?'. <a href="'.$event['event_gmap_link'].'" target="_blank"><i>Peta</i></a>':'' ?></p>
								<?php echo $event['eo_name']<>''?'<p class="border-orange">Dikelola Oleh : '.$event['eo_name'].'</p>':'' ?>
								
								
								
								<?php if ($event['eo_contact_name']=='' AND $event['eo_name']=='' AND $event['eo_email']=='' AND $event['eo_contact_number'] =='' ) {
									
								}
								else{
?>
<?php if($event['eo_contact_name']<>'' OR $event['eo_name']<>''){$strip = '&nbsp;&#8209;&nbsp;' ;}else{$strip ='' ;}  ?>

								<p class="border-orange">
								<?php echo $event['eo_contact_name']<>''?"<b>".$event['eo_contact_name']."</b>":"<b>".$event['eo_name']."</b>" ?><?php echo $event['eo_email']<>''?$strip.$event['eo_email']:'' ; ?><?php echo $event['eo_contact_number']<>''?' | '.$event['eo_contact_number']:'' ; ?>
								</p>
<?php									
									} ?>
								
								 
								<p class="border-orange socmed">
								Tautan :&nbsp;&nbsp;&nbsp;
<?php					
								if ($event['eo_facebook']<>'') {
?>
<a title="facebook" href="<?php echo $event['eo_facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>		                        

<?php					
								if ($event['eo_instagram']<>'') {
?>
<a title="instagram" href="<?php echo $event['eo_instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>

<?php					
								if ($event['eo_twitter']<>'') {
?>
<a title="twitter" href="<?php echo $event['eo_twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>

<?php					
								if ($event['eo_website']<>'') {
?>
<a title="website" href="<?php echo $event['eo_website'] ?>" target="_blank"><i class="fa fa-external-link"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>																											
								</p>
							</div>
						</div>
						<p><?php echo $event['event_description'] ?></p>						
						<p><i><?php echo $event['event_more_info'] ?></i></p>						
							
							<span class="text-orange">Acara ini diposting oleh:</span> <?php echo $_SESSION['full_name'] ; ?>
						</p>
					</div>
					
					
					<div class="post-tag">Tags : 
<?php
					 $replace = str_replace(' ', '',$event['event_tag']);
	 				 $tag =  explode('#', $replace);
			 		 foreach ($tag as $word) {
?>
					<a href="search.php?search_bawah_slider=<?php echo $word ?>"><span class="label label-default"><?php echo $word ?></span></a>
<?php
			 		 }

?>					 
					</div>
					<div class="content-ruler-2">&nbsp;</div>
				</div>
				<div class="col-md-1 col-sm-1">&nbsp;</div>
				
			</div>
			<p>&nbsp;</p><p>&nbsp;</p>
		
				</div>
			</div>
		</div>
	</div>