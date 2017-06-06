<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'dokumen' ;
$page = 'dokumen' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('dokumen',$master,'../doc','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{    
    $title = str_replace("'","\'",$_POST['title']);
    $description = str_replace("'","\'",$_POST['description']);

	$query = "UPDATE ".$master." SET 			 
			 title = '$title',			 
			 description = '$description'          
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../doc','file');
			delete_file('dokumen',$master,'../doc','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET dokumen = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{       
    upload_file('../doc','file');
            
    $title = str_replace("'","\'",$_POST['title']);
    $description = str_replace("'","\'",$_POST['description']);

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$title',
 				 '$description',
 				 '$nama_final' 				           
 				  ) ") 	;
 
 header("location:".$page."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>