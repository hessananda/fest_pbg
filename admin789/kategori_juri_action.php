<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'kategori_juri' ;
$page = 'kategori_juri' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{
    $title = str_replace($cari,$ganti,$_POST['title']);     
    $description = str_replace($cari,$ganti,$_POST['description']);

	$query = "UPDATE ".$master." SET 
			 title = '$title',
			 description = '$description',
             last_edit_time = '$now',
             last_edit_user = '$_SESSION[user_id]',                      
             aktif = '$_POST[aktif]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{
            
    $title = str_replace($cari,$ganti,$_POST['title']);     
    $description = str_replace($cari,$ganti,$_POST['description']);

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$title',
 				 '$description', 
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