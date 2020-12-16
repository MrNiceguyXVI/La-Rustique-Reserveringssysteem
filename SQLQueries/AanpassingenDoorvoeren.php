<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

//fetching all the needed data that was passed through th URL
$ReservatieNr = urldecode($_GET['ReservatieNr']);
$VertrekDatum = urldecode($_GET['AangepastVertrekDatum']);
$PlaatsNr = urldecode($_GET['AangepastPlaatsNr']);
$DoucheMuntjes = urldecode($_GET['AangepastDoucheMuntjes']);
$Bezoekers = urldecode($_GET['AangepastBezoekers']);
$WasBeurten = urldecode($_GET['AangepastWasBeurten']);
$DroogBeurten = urldecode($_GET['AangepastDroogBeurten']);

//for testing if all the data passes through
// echo $VertrekDatum."|".$PlaatsNr."|".$DoucheMuntjes."|".$Bezoekers."|".$WasBeurten."|".$DroogBeurten."|".$ReservatieNr;

/* TO DO LIST
*
* add another check: if the entered leave date is the same as it was, just change the spot number if it is any different from what it was.
* if the leave date is different check the following:
* check it's not before the arrival date, and that it's not after the current date either; this is not allowed
* check if there exists any record containing the entered spot number that is between the arrivald date and given leave date, and it must ignore records with the reservation id that is passed along;
* if there exists a record it means theres already a reservation in between those dates on the entered spot, and it must alert the user and discontinue any data altering/entering/deleting
*
*/


if($DoucheMuntjes == 0){
  $ExistDoucheQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 7";
  $ExistDoucheResult = mysqli_query($con, $ExistDoucheQuery);
}elseif($DoucheMuntjes > 0){
  $ExistDoucheQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 7, ".$DoucheMuntjes.") ON DUPLICATE KEY UPDATE Aantal = ".$DoucheMuntjes."";
  $ExistDoucheResult = mysqli_query($con, $ExistDoucheQuery);
}

if($Bezoekers == 0){
  $ExistBezoekersQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 6";
  $ExistBezoekersResult = mysqli_query($con, $ExistBezoekersQuery);
}elseif($Bezoekers > 0){
  $ExistBezoekersQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 6, ".$Bezoekers.") ON DUPLICATE KEY UPDATE Aantal = ".$Bezoekers."";
  $ExistBezoekersResult = mysqli_query($con, $ExistBezoekersQuery);
}

if($WasBeurten == 0){
  $ExistWasBeurtQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 8";
  $ExistWasBeurtResult = mysqli_query($con, $ExistWasBeurtQuery);
}elseif($WasBeurten > 0){
  $ExistWasBeurtQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 8, ".$WasBeurten.") ON DUPLICATE KEY UPDATE Aantal = ".$WasBeurten."";
  $ExistWasBeurtResult = mysqli_query($con, $ExistWasBeurtQuery);
}

if($DroogBeurten == 0){
  $ExistDroogBeurtQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 9";
  $ExistDroogBeurtResult = mysqli_query($con, $ExistDroogBeurtQuery);
}elseif($DroogBeurten > 0){
  $ExistDroogBeurtQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 9, ".$DroogBeurten.") ON DUPLICATE KEY UPDATE Aantal = ".$DroogBeurten."";
  $ExistDroogBeurtResult = mysqli_query($con, $ExistDroogBeurtQuery);
}           
?>