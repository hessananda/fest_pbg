<?php

include "config/koneksi.php";
include "config/form_maker.php";
include "config/subtitusi.php";
session_start();

$master = 'master_kompetisi' ;
$page = 'kompetisi' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}

if ($action=='hapus')
{
	delete_file('image_banner',$master,'../images/kompetisi','id',$id);
	$query = mysqli_query($con,"DELETE FROM ".$master." WHERE id = '$id'");	
	echo mysqli_error($con);
	header("location:".$page."_view.php");				
}

elseif ($action=='edit')
{
    $title = str_replace($cari,$ganti,$_POST['title']);    
    $content = str_replace($cari,$ganti,$_POST['content']);

	$query = "UPDATE ".$master." SET
			 title = '$title',
			 content = '$content',
             category_id = '$_POST[category]',
             last_edit_time = '$now',
             last_edit_user = '$_SESSION[user_id]',                      
             aktif = '$_POST[aktif]'             
			 WHERE id = '$id'";

	mysqli_query($con,$query);

	if ($_FILES['file']['name'] <> '')
		{
			upload_file('../images/kompetisi','file');
			delete_file('image_banner',$master,'../images/kompetisi','id',$id)	;	
			mysqli_query($con,"UPDATE ".$master." SET image_banner = '$nama_final' WHERE id = '$id' ");
		}

	echo mysqli_error($con);
	?>
<meta http-equiv="refresh" content="0; url=<?php echo $page.'_edit.php?id='.$id ?>" />
<?php
}

elseif ($action=='input')
{
    if($_POST['category_title']<>''){            
        mysqli_query($con,"INSERT INTO kategori_kompetisi VALUES (
				 '',
				 '$_POST[category_title]',				 
                 '$now',				  				 
                 '$_SESSION[user_id]',
                 '',
                 '',
                 '1'                                                                 
				  ) ");
        $category = mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(id) as id FROM kategori_kompetisi"));
        $category_id = $category['id'];
    }
    else{
        $category_id = $_POST['kategori'];
    }        
    
    upload_file('../images/kompetisi','file');
        
    $content = str_replace($cari,$ganti,$_POST['content']);
    $title = str_replace($cari,$ganti,$_POST['title']);    

 	mysqli_query($con,"INSERT INTO ".$master." VALUES (
 				 '',
 				 '$title',
                 '$nama_final',
                 '$content',
                 '$category_id',
                 '$now',
                 '$_SESSION[user_id]',
                 '',
                 '',                 
                 '$_POST[aktif]'                 
 				  ) ") 	;
 
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