<?php

include("config/koneksi.php");
include("config/form_maker.php");
include("config/subtitusi.php");

session_start();

$master = 'master_juri' ;
$page = 'juri' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image_banner',$master,'../images/juri','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{
    $full_name = str_replace($cari,$ganti,$_POST['full_name']);
    $description = str_replace($cari,$ganti,$_POST['description']);

	$query = "UPDATE ".$master." SET 
			 title = '$full_name',
             content = '$description'        
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/juri','file');
			delete_file('image_banner',$master,'../images/juri','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image_banner = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	header("location:".$page."_edit.php?id=$id");
}

elseif ($action=='input')
{
       
    upload_file('../images/juri','file');
        
    $full_name = str_replace($cari,$ganti,$_POST['full_name']);    
    $description = str_replace($cari,$ganti,$_POST['description']);    
     
 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$full_name',
                 '$nama_final',
                 '$description'
 				  ) ") 	;
 
 header("location:".$page."_view.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>