<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'highlight' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='edit')
{
	$query = "UPDATE ".$master." SET			 
			 caption = '$_POST[caption]',
			 link = '$_POST[link]',			 
             aktif = '1',
			 entrytime = '$now'
			 WHERE id = '1' ";

	mysqli_query($con,$query);

echo mysqli_error($con);

	if ($_FILES['image']['name'] <> '')
		{
			upload_file('../images/highlight/','image');
			delete_file('image',$master,'../images/highlight/','id',$id);
			mysqli_query($con,"UPDATE ".$master." SET image = '$nama_final' WHERE id = '$id' ");
		}

echo mysqli_error($con);
	header("location:".$master."_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>