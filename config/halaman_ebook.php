<?php
// class paging untuk halaman RECOMMENDED EBOOK
class Pagingrecebook{
function cariPosisi($batas){
if(empty($_GET['pagerecebook'])){
	$posisi=0;
	$_GET['pagerecebook']=1;
}
else{
	$posisi = ($_GET['pagerecebook']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=pagerecebook-1.html>« First</a></li> 
                      <li><a href=pagerecebook-$prev.html>< Prev</a></li>";
}
else{ 
	$link_halaman .= "<li><a>« First </a></li> 
	                  <li><a>< Prev </a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=pagerecebook-$i.html>$i</a></li>";
  }
	  $angka .= "<li class='active'><a>$halaman_aktif</a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=pagerecebook-$i.html>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='disabled'><a>...</a></li> 
												  <li><a href=pagerecebook-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href=pagerecebook-$next.html>Next ></a></li> 
                       <li><a href=pagerecebook-$jmlhalaman.html>Last »</a></li>";
}
else{
	$link_halaman .= " <li><a> Next ></a> </li> 
	                   <li><a> Last » </a></li>";
}
return $link_halaman;
}
}




// class paging untuk halaman MOST READ EBOOK
class Pagingmostebook{
function cariPosisi($batas){
if(empty($_GET['pagemostebook'])){
	$posisi=0;
	$_GET['pagemostebook']=1;
}
else{
	$posisi = ($_GET['pagemostebook']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=pagemostebook-1.html>« First</a></li> 
                      <li><a href=pagemostebook-$prev.html>< Prev</a></li>";
}
else{ 
	$link_halaman .= "<li><a>« First </a></li> 
					  <li><a>< Prev </a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=pagemostebook-$i.html>$i</a></li>";
  }
	  $angka .= "<li class='active'><a>$halaman_aktif</a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=pagemostebook-$i.html>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='disabled'><a>...</a></li> <li><a href=pagemostebook-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href=pagemostebook-$next.html>Next ></a></li> 
                       <li><a href=pagemostebook-$jmlhalaman.html>Last >></a></li>";
}
else{
	$link_halaman .= "<li><a> Next ></a> </li> 
	                  <li><a> Last » </a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman KATEGORI
class PagingCategory{
function cariPosisi($batas){
if(empty($_GET['halkategori'])){
	$posisi=0;
	$_GET['halkategori']=1;
}
else{
	$posisi = ($_GET['halkategori']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=halkategori-$_GET[id]-1.html>« First</a></li> 
                      <li><a href=halkategori-$_GET[id]-$prev.html>< Prev</a></li>";
}
else{ 
	$link_halaman .= "<li><a>« First </a></li> 
	                  <li><a>< Prev </a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=halkategori-$_GET[id]-$i.html>$i</a></li>";
  }
	  $angka .= "<li><a><b>$halaman_aktif</b></a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=halkategori-$_GET[id]-$i.html>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='disabled'><a>...</a></li> 
												  <li><a href=halkategori-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <li><a href=halkategori-$_GET[id]-$next.html>Next ></a></li> 
                      <li><a href=halkategori-$_GET[id]-$jmlhalaman.html>Last »</a></li> ";
}
else{
	$link_halaman .= " <li><a> Next ></a> </li> 
	                   <li><a> Last » </a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman administrator
// class paging untuk halaman ORDER EBOOK
class Pagingorderebook{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanadmin])){
	$posisi=0;
	$_GET[halamanadmin]=1;
}
else{
	$posisi = ($_GET[halamanadmin]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanadmin=$i>$i</a></li>";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}

//--------------- PERCOBAAN ---------------------//

// class paging untuk halaman administrator
class PagingSMSterkirim{
// Fungsi untuk mencek halamanadmin dan posisi data
 function cariPosisi($batas){
 if(empty($_GET[halamantkrm]) ){
 	$posisi=0;
 	$_GET[halamantkrm]=1;
 }
 else{
 $posisi = ($_GET[halamantkrm]-1) * $batas;
 }
 return $posisi;
 }

// Fungsi untuk menghitung total halaman sms terkirim
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamantkrm=$i&act=SMS_Terkirim>$i</a></li>";
}
$link_halaman .= " ";
}
return $link_halaman;
}
 }

class Pagingdeposit{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanadmin])){
	$posisi=0;
	$_GET[halamanadmin]=1;
}
else{
	$posisi = ($_GET[halamanadmin]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanadmin=$i&act=depositmember>$i</a></li>";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class Pagingorderbaru{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanorderbaru])){
	$posisi=0;
	$_GET[halamanorderbaru]=1;
}
else{
	$posisi = ($_GET[halamanorderbaru]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanorderbaru=$i>$i</a></li>";

}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class Pagingorderdikonfirmasi{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanorderdikonfirmasi])){
	$posisi=0;
	$_GET[halamanorderdikonfirmasi]=1;
}
else{
	$posisi = ($_GET[halamanorderdikonfirmasi]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanorderdikonfirmasi=$i>$i</a></li>";

}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class Pagingorderlunas{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanorderlunas])){
	$posisi=0;
	$_GET[halamanorderlunas]=1;
}
else{
	$posisi = ($_GET[halamanorderlunas]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanorderlunas=$i>$i</a></li>";

}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class Pagingorderdikirim{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanorderdikirim])){
	$posisi=0;
	$_GET[halamanorderdikirim]=1;
}
else{
	$posisi = ($_GET[halamanorderdikirim]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanorderdikirim=$i>$i</a></li>";

}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class Pagingorderbatal{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanorderbatal])){
	$posisi=0;
	$_GET[halamanorderbatal]=1;
}
else{
	$posisi = ($_GET[halamanorderbatal]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanorderbatal=$i>$i</a></li>";

}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class PagingdashboardAL{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamandashboard])){
	$posisi=0;
	$_GET[halamandashboard]=1;
}
else{
	$posisi = ($_GET[halamandashboard]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamandashboard=$i&dashboard=AS>$i</a></li>";
//beranda.php?yosefmurya=dashboardmember&dashboard=AS
}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class PagingdashboardOH{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamandashboard])){
	$posisi=0;
	$_GET[halamandashboard]=1;
}
else{
	$posisi = ($_GET[halamandashboard]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?page=$_GET[page]&halamandashboard=$i>$i</a></li>";
//beranda.php?yosefmurya=dashboardmember&dashboard=AS
}
$link_halaman .= " ";
}
return $link_halaman;
}
}

class Pagingkomplain{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamankomplain])){
	$posisi=0;
	$_GET[halamankomplain]=1;
}
else{
	$posisi = ($_GET[halamankomplain]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamankomplain=$i>$i</a></li>";
//beranda.php?yosefmurya=dashboardmember&dashboard=AS
}
$link_halaman .= " ";
}
return $link_halaman;
}
}
//-------------------------------------------//

//class paging untuk halaman PESAN
class PagingPesan{
// Fungsi untuk mencek halamanadmin dan posisi data
function cariPosisi($batas){
if(empty($_GET[halamanadmin])){
	$posisi=0;
	$_GET[halamanadmin]=1;
}
else{
	$posisi = ($_GET[halamanadmin]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halamanadmin
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halamanadmin 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<li><a href=''><strong>$i</strong></a></li>";
  }
else{
  $link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?yosefmurya=$_GET[yosefmurya]&halamanadmin=$i>$i</a></li>";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}




?>