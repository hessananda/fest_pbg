<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'master_film' ;
$page = 'film' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
    $id=$_GET['id'];
}

if ($action=='hapus')
{
    delete_file('image_banner',$master,'../images/film','id',$id);
    $query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'"); 
    echo mysqli_error($con);
    header("location:".$page."_view.php");              
}

elseif ($action=='edit')
{
      
    $judul = str_replace($cari,$ganti,$_POST['judul']);
    $produksi = str_replace($cari,$ganti,$_POST['produksi']);
    $tahun = str_replace($cari,$ganti,$_POST['tahun']);
    $durasi = str_replace($cari,$ganti,$_POST['durasi']);
    $genre = str_replace($cari,$ganti,$_POST['genre']);    
    $sinopsis = str_replace($cari,$ganti,$_POST['sinopsis']);

    $query = "UPDATE ".$master." SET
             judul = '$judul',
             produksi = '$produksi',
             tahun = '$tahun',
             durasi = '$durasi',
             genre = '$genre',
             sinopsis = '$sinopsis',
             category_id = '$_POST[category]',
             last_edit_time = '$now',
             last_edit_user = '$_SESSION[user_id]',                      
             aktif = '$_POST[aktif]'             
             WHERE id = '$id'";

    mysqli_query($con,$query);

    if ($_FILES['file']['name'] <> '')
        {
            upload_file('../images/film','file');
            delete_file('image_banner',$master,'../images/film','id',$id)  ;   
            mysqli_query($con,"UPDATE ".$master." SET image_banner = '$nama_final' WHERE id = '$id' ");
        }

    echo mysqli_error($con);
    ?>
<meta http-equiv="refresh" content="0; url=<?php echo $page.'_edit.php?id='.$id ?>" />
<?php
}

elseif ($action=='input')
{

    $category_id = $_POST['kategori'];
    upload_file('../images/film','file');
            
    $judul = str_replace($cari,$ganti,$_POST['judul']);
    $produksi = str_replace($cari,$ganti,$_POST['produksi']);
    $tahun = str_replace($cari,$ganti,$_POST['tahun']);
    $durasi = str_replace($cari,$ganti,$_POST['durasi']);
    $genre = str_replace($cari,$ganti,$_POST['genre']);    
    $sinopsis = str_replace($cari,$ganti,$_POST['sinopsis']);

    mysqli_query($con,"INSERT INTO ".$master." VALUES (
                 '',
                 '$judul',
                 '$nama_final',
                 '$produksi',
                 '$tahun',
                 '$durasi',
                 '$genre',                 
                 '$sinopsis',
                 '$category_id',
                 '$_POST[aktif]',
                 '$now',
                 '$_SESSION[user_id]',
                 '',
                 ''                 
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