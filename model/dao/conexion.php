
<?php

$dbhost = "us-cdbr-east-04.cleardb.com";
$dbuser = "bdf1e082331729";
$dbpass = "02a19422";
$dbname = "heroku_71c27193fdf82fa";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn)
{
	die("No hay conexion:" .mysqli_connect_error());
}

?>