<?php

// db Local Xampp
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "mydata";

// db Hosting
$dbhost = "sql202.epizy.com";
$dbuser = "epiz_27905230";
$dbpass = "UQy0sos4tv";
$dbname = "epiz_27905230_mydatabase";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Gagal Menyambung Ke Database!");
}
