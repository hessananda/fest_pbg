<?php

include "config/koneksi.php";
include ('config/fungsi_thumb.php');
session_start();

$master = 'jadwal' ;
$page = 'jadwal_layout' ;
$soalapa = 'jadwal_layout' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];
$value = $soalapa.'_tamu_id';

if ($action=='edit')
{
	$id=$_GET['id'];
	$memberUpSelect = "UPDATE ".$soalapa." SET master_id = '".$_POST[$value]."',
					  user_yang_edit = '$_SESSION[user_id]'					  
					  WHERE id = '$id' ";

	mysqli_query($con,$memberUpSelect);

	mysqli_error($con);

	header("location:".$page."_view.php");

}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>

