<?php

include "config/koneksi.php";
include ('config/fungsi_thumb.php');
include "config/subtitusi.php";
include "config/form_maker.php";

session_start();

$master = 'master_program' ;
$page = 'program_layout' ;
$soalapa = 'program_layout' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];
$value = $soalapa.'_tamu_id';

if ($action=='edit')
{
	$id=$_GET['id'];
	$title = str_replace($cari,$ganti,$_POST['title']);    
    $link = str_replace($cari,$ganti,$_POST['link']);

	$query = "UPDATE master_program SET
			 title = '$title',
			 content = '$link',             
             last_edit_time = '$now',
             last_edit_user = '$_SESSION[user_id]'             
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	mysqli_error($con);

	  if ($_FILES['file']['name'] <> '')
        {
            upload_file('../images/program','file');
            delete_file('image_banner',$master,'../images/program','id',$id)  ;   
            mysqli_query($con,"UPDATE ".$master." SET image_banner = '$nama_final' WHERE id = '$id' ");
        }

	header("location:".$page."_view.php");

}

else
{
	echo "disitu kadang saya merasa sedih";
}

?>
