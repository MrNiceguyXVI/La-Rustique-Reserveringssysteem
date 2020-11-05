<?php
$server="localhost";
$username="root";
$password="";
$database="la_rustique_db";

$con = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_errno())
{
  echo "Failed to connect to server: ".mysqli_connect_error();
}
?>