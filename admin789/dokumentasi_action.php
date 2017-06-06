<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'dokumentasi' ;
$page = 'dokumentasi' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../images/dokumentasi','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{    
    $title = str_replace("'","\'",$_POST['title']);
    $link = str_replace("'","\'",$_POST['link']);

	$query = "UPDATE ".$master." SET 			 
			 title = '$title',			 
			 link = '$link'          
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/dokumentasi','file');
			delete_file('image',$master,'../images/dokumentasi','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{       
    upload_file('../images/dokumentasi','file');
            
    $title = str_replace("'","\'",$_POST['title']);
    $link = str_replace("'","\'",$_POST['link']);

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$title',
 				 '$link',
 				 '$nama_final' 				           
 				  ) ") 	;
 
 header("location:".$page."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>