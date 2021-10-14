
<?php

$dbhost = "localhost";
$dbuser = "usr_developer";
$dbpass = "1234";
$dbname = "db_tienda";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn)
{
	die("No hay conexion:" .mysqli_connect_error());
}

?>