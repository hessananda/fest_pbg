<?php
date_default_timezone_set("Asia/Jakarta");

$host = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'ffp';

// $host = 'localhost';
// $username = 'spektake_test';
// $password = 'jayadiudara';
// $database = 'spektake_hfn';

//mysqli_connect(host,username,password,dbname,port,socket);
$con = mysqli_connect($host,$username,$password,$database);

?>