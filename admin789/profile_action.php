<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'profile' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}


if ($action=='edit')
{
	$query = "UPDATE ".$master." SET 			
			 ".$master."_facebook = '$_POST[profile_facebook]',
			 ".$master."_twitter = '$_POST[profile_twitter]',
			 ".$master."_instagram = '$_POST[profile_instagram]',
             ".$master."_youtube = '$_POST[profile_youtube]',
			 ".$master."_time_modified = '$now'
			 WHERE ".$master.'_id'." = '$id'";

	mysqli_query($con,$query);

echo mysqli_error($con);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/logo/','file');
			delete_file($master.'_logo',$master,'../images/logo/',$master.'_id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET ".$master."_logo = '$nama_final' WHERE ".$master."_id = '$id' ");
		}

	if ($_FILES['profile_footer_logo']['name'] <> '')
		{
			upload_file('../images/logo/','profile_footer_logo');
			delete_file($master.'_footer_logo',$master,'../images/logo/',$master.'_id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET ".$master."_logo = '$nama_final' WHERE ".$master."_id = '$id' ");
		}

echo mysqli_error($con);	
	header("location:".$master."_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>