<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'kontak' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='edit')
{
	$content = str_replace($cari,$ganti,$_POST['content']);
	$query = "UPDATE ".$master." SET
			 content = '$content'
			 WHERE id = '15' ";

	mysqli_query($con,$query);

echo mysqli_error($con);

	if ($_FILES['image']['name'] <> '')
		{
			upload_file('../images/kontak/','image');
			delete_file('image_banner',$master,'../images/kontak/','id',$id);
			mysqli_query($con,"UPDATE ".$master." SET image_banner = '$nama_final' WHERE id = '$id' ");
		}

echo mysqli_error($con);
	header("location:".$master."_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>