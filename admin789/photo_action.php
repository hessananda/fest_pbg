<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'photo' ;
$page = 'photo' ;
$link_website = 'http://www.clcpurbalingga.id/festival/2017/images/library/' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../images/library','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{
    $title = str_replace("'","\'",$_POST['title']);        

	$query = "UPDATE ".$master." SET 
			 title = '$title'             
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/library','file');
			delete_file('image',$master,'../images/library','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final', link = '".$link_website.$nama_final."' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{
    upload_file('../images/library','file');
            
    $title = str_replace("'","\'",$_POST['title']);    

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '', 				 
 				 '$title',                 
                 '$nama_final',				 
                 '$link_website'             
 				  ) ") 	;
 
 header("location:".$page."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>