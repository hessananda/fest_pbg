
<?php
echo "<h1>INI FUNGSI UPLOADGAMBAR </h1>";
//=========  Upload gambar untuk Cover Ebook =======
function Uploadgambar($fupload_name){
  //direktori gambar
  $vdir_upload = "images/produk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];
 print_r($_FILES["fupload"]);
  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
    case "image/gif":
      $im_src=imagecreatefromgif($vfile_upload); 
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $im_src=imagecreatefromjpeg($vfile_upload); 
      break;
      case "image/png":
    case "image/x-png":
      $im_src=imagecreatefrompng($vfile_upload); 
      break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi besar 450 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=450){
  $dst_width = 450;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im,$vdir_upload.$fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im,$vdir_upload.$fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im,$vdir_upload.$fupload_name);
      break;
  }

  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);


}
// ============= End Gambar Baju ================
?>