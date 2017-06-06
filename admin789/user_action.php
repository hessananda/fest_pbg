<?php

include "config/koneksi.php";
include "config/form_maker.php";
session_start();

$master = 'user' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='edit_account')
{
	$query = "UPDATE ".$master." SET 
			 ".$master."_fullname = '$_POST[fullname]'
			 WHERE ".$master.'_id'." = '$id'";

	mysqli_query($con,$query);

	echo mysqli_error($con);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('images/user','file');
			delete_file($master.'_image',$master,'images/user',$master.'_id',$id)	;	
			mysql_query("UPDATE ".$master." SET ".$master."_image = '$nama_final' WHERE ".$master."_id = '$id' ");
		}

	header("location:".$master."_account_edit.php");				
}

elseif ($action=='edit_password')
{
	$query = "UPDATE ".$master." SET 
			 ".$master."_name = '".$_POST['username']."',
			 ".$master."_password = '".md5($_POST['pass2'])."'
			 WHERE ".$master.'_id'." = '$id'";

	mysqli_query($con,$query);

	echo mysqli_error($con);
	header("location:".$master."_change_password.php");
}
else
{
	echo "disitu kadang saya merasa sedih";
}

?>