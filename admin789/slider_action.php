<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'master_slider' ;
$page = 'slider' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image',$master,'../images/slider','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{
    $title = str_replace("'","\'",$_POST['title']);    
    $sub_title = str_replace("'","\'",$_POST['sub_title']);
    $description = str_replace("'","\'",$_POST['description']);

	$query = "UPDATE ".$master." SET 
			 title = '$title',             
			 sub_title = '$sub_title',
			 topic = '$topic',
			 description = '$description',
             link = '$_POST[link]',	             	 			             
             last_edit_time = '$now',
             last_edit_user = '$_SESSION[user_id]',                      
             aktif = '$_POST[aktif]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/slider','file');
			delete_file('image',$master,'../assets/images/slider','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{       
    upload_file('../images/slider','file');
        
    $title = str_replace("'","\'",$_POST['title']);    
    $sub_title = str_replace("'","\'",$_POST['sub_title']);
    $description = str_replace("'","\'",$_POST['description']);

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$nama_final',	
 				 '$title',	                 		 
                 '$sub_title',	
                 '$description',				  				 
                 '$_POST[link]',
                 '',
                 '$now',
                 '$_SESSION[user_id]',                 
                 '',                    
                 '',                                                
                 '$_POST[aktif]'
 				  ) ") 	;
 
 header("location:".$page."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>