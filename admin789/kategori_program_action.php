<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'kategori_program' ;
$page = 'kategori_program' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image_banner',$master,'../images/kategori_program','id',$id);
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
             aktif = '$_POST[aktif]',
             parent_id = '$_POST[category]'
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/kategori_program','file');
			delete_file('image_banner',$master,'../images/kategori_program','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image_banner = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{
    
    upload_file('../images/kategori_program','file');

    $title = str_replace($cari,$ganti,$_POST['title']);     
    $description = str_replace($cari,$ganti,$_POST['description']);

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$title',
 				 '$nama_final',
 				 '$description',
                 '$now',
                 '$_SESSION[user_id]',
                 '',
                 '',
                 '$_POST[aktif]',
                 '$_POST[category]'
 				  ) ") 	;
 
 header("location:".$page."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>