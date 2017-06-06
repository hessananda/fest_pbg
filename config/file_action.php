<?php
//ACTION FORM MAKER

//upload semua jenis file tanpa batasan atau filtering
function upload_file($lokasi,$nama_file){
    
    global $nama_final;
    
    $loc=$_FILES["$nama_file"]['tmp_name'];
    $acak = rand(10000,99999);
    $nama = $_FILES["$nama_file"]['name'];
    $nama_final = $acak.$nama;
    $path="$lokasi"."/".$nama_final;
    $hai = move_uploaded_file($loc,$path);
    
}

function delete_file($column,$table,$lokasi,$primary,$id){
global $con;    
    $sqlfetchhapus = mysqli_fetch_assoc(mysqli_query($con,"SELECT $column from $table WHERE ".$primary." = '$id' "));   
    @ unlink("$lokasi/$sqlfetchhapus[$column]");
}