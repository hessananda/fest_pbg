<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'master_jadwal' ;
$page = 'jadwal' ;
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
    $content = str_replace($cari,$ganti,$_POST['content']);
    $waktu_mulai = $_POST['hour_start'].':'.$_POST['minute_start'].':'.'00' ;
    $waktu_selesai = $_POST['hour_finish'].':'.$_POST['minute_finish'].':'.'00' ;

    $query = "UPDATE ".$master." SET
             title = '$title',
             content = '$content',
             date = '$_POST[tanggal]',
             time_start = '$waktu_mulai',
             time_finish = '$waktu_selesai',
             last_edit_time = '$now',
             last_edit_user = '$_SESSION[user_id]',
             aktif = '$_POST[aktif]'
             WHERE id = '$id'";

    mysqli_query($con,$query);

    echo mysqli_error($con);
    ?>
<meta http-equiv="refresh" content="0; url=<?php echo $page.'_edit.php?id='.$id ?>" />
<?php
}

elseif ($action=='input')
{    
    
    $content = str_replace($cari,$ganti,$_POST['content']);
    $title = str_replace($cari,$ganti,$_POST['title']);
    $waktu_mulai = $_POST['hour_start'].':'.$_POST['minute_start'].':'.'00' ;
    $waktu_selesai = $_POST['hour_finish'].':'.$_POST['minute_finish'].':'.'00' ;

    mysqli_query($con,"INSERT INTO ".$master." VALUES (
                 '',
                 '$title',                 
                 '$content',
                 '$_POST[tanggal]',
                 '$waktu_mulai',
                 '$waktu_selesai',
                 '$now',
                 '$_SESSION[user_id]',
                 '',
                 '',                 
                 '$_POST[aktif]'                 
                  ) ")  ;
 
    echo mysqli_error($con);

 ?>
<meta http-equiv="refresh" content="0; url=<?php echo $page.'_view.php' ?>" />
<?php 
}
else
{
    echo "disitu kadang saya merasa sedih";
}

?>