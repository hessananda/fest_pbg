<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'description' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='edit')
{

	$description = str_replace($cari,$ganti,$_POST['description']);
	$query = "UPDATE ".$master." SET			 
			 description = '$description'
			 WHERE id = '1' ";

	mysqli_query($con,$query);


echo mysqli_error($con);
	header("location:juri_page_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>