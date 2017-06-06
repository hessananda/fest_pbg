<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'description' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];


if ($action=='edit')
{

	$title = str_replace($cari,$ganti,$_POST['title']);
	$link = str_replace($cari,$ganti,$_POST['link']);

	$query = "UPDATE ".$master." SET			 
			 title = '$title',
			 description = '$link'
			 WHERE id = '2' ";

	mysqli_query($con,$query);


echo mysqli_error($con);
	header("location:promosi_edit.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>