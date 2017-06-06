<?php
	/*
This script is use to upload any Excel file into database.
Here, you can browse your Excel file and upload it into 
your database.

Download Link: http://www.discussdesk.com/import-excel-file-data-in-mysql-database-using-PHP.htm

Website URL: http://www.discussdesk.com
*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Motoreko</title>
<meta name="description" content="This tutorial will learn how to import excel sheet data in mysql database using php. Here, first upload an excel sheet into your server and then click to import it into database. All column of excel sheet will store into your corrosponding database table."/>
<meta name="keywords" content="import excel file data in mysql, upload ecxel file in mysql, upload data, code to import excel data in mysql database, php, Mysql, Ajax, Jquery, Javascript, download, upload, upload excel file,mysql"/>
</head>
<body>

<?php


if ( isset($_POST["submit"]) ) {
if ( isset($_FILES["file"])) {
//if there was an error uploading the file
if ($_FILES["file"]["error"] > 0) {
//echo "hesananda";
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else {
if (file_exists($_FILES["file"]["name"])) {
unlink($_FILES["file"]["name"]);
}
$storagename = "discussdesk.xlsx";
move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
$uploadedStatus = 1;
}
} else {
echo "No file selected <br />";
}
}

/************************ YOUR DATABASE CONNECTION START HERE   ****************************/
define ("DB_HOST", "localhost:3307"); // set database host
define ("DB_USER", "root"); // set database user
define ("DB_PASS",""); // set database password
define ("DB_NAME","motoreko_hesa"); // set database name

@$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");

$databasetable = "mobil";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = 'discussdesk.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
//die("hesananda");
        
}

$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

for($i=2;$i<=$arrayCount;$i++){
	$mobil_nomor_plat = trim($allDataInSheet[$i]["A"]);
	$mobil_status = trim($allDataInSheet[$i]["B"]);

	$cek_nomor_query = mysql_query("SELECT mobil_id FROM mobil WHERE mobil_nomor_plat = '".$mobil_nomor_plat."' "); 
	if (mysql_num_rows($cek_nomor_query)>0) 
	{
		$cek_status = mysql_num_rows(mysql_query("SELECT mobil_id FROM mobil WHERE mobil_status != '".$mobil_status."' "));
		if ($cek_status>0) {
			$id_mobil = mysql_fetch_assoc($cek_nomor_query);
			mysql_query("UPDATE mobil SET mobil_status = '$mobil_status' WHERE mobil_id = '$id_mobil[mobil_id]'");		
		} 		
	}
	else{
		mysql_query("insert into mobil (mobil_nomor_plat, mobil_status, mobil_timestamp) values('".$mobil_nomor_plat."', '".$mobil_status."','".date("Y-m-d H:i:s")."')");		
	}
	

}

//	 	$msg = 'Record has been added. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';
//	 } else {
//	 	$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href="">Go Back to tutorial</a></div>';
//	 }

// echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";
 
//header("location:../mobil_view.php");
?>
</body>
</html>