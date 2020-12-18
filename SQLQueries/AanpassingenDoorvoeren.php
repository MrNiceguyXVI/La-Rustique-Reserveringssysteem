<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

//fetching all the needed data that was passed through th URL
$ReservatieNr = urldecode($_GET['ReservatieNr']);
$VertrekDatum = urldecode($_GET['AangepastVertrekDatum']);
$Aankomst = urldecode($_GET['AankomstDatum']);
$PlaatsNr = urldecode($_GET['AangepastPlaatsNr']);
$DoucheMuntjes = urldecode($_GET['AangepastDoucheMuntjes']);
$Bezoekers = urldecode($_GET['AangepastBezoekers']);
$WasBeurten = urldecode($_GET['AangepastWasBeurten']);
$DroogBeurten = urldecode($_GET['AangepastDroogBeurten']);

//for checking if the selected spot is already taken on the relevant dates; To avoid double bookings
$PlekCheckQuery = "SELECT * FROM reservaties WHERE ReservatieNr != ".$ReservatieNr." AND PlaatsNr = ".$PlaatsNr." AND  '".$Aankomst."' >= VertrekDatum AND '".$VertrekDatum."' < AankomstDatum";
$PlekCheckResult = mysqli_query($con, $PlekCheckQuery);
if(mysqli_num_rows($PlekCheckResult)!=0)
{
  echo "<frameset onload='PlekAlBezet();'></frameset>"; //For loading in an alert
} 
else 
{
  //checks that the entered date is not before or on the arrival or current date
  if(date_create($VertrekDatum) <= date_create($Aankomst) || date_create($VertrekDatum) <= date_create($currentDate))
  {
    //calls the 'VerkeerdDatum()' function located in the main document, so it can give an error even though this php gets inserted by the AJAX method
    echo "<style onload='VerkeerdeDatum();'></style>";
  } 
  else 
  {
    $UpdatePlekEnVertrekQuery = "UPDATE reservaties SET PlaatsNr = ".$PlaatsNr.", VertrekDatum = '".$VertrekDatum."' WHERE ReservatieNr = ".$ReservatieNr."";
    $UpdatePlekEnVertrekResult = mysqli_query($con, $UpdatePlekEnVertrekQuery);

    //For deleting/inserting/updating douchemuntjes
    if($DoucheMuntjes == 0)
    {
      $ExistDoucheQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 7";
      $ExistDoucheResult = mysqli_query($con, $ExistDoucheQuery);
    }
    elseif($DoucheMuntjes > 0)
    {
      $ExistDoucheQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 7, ".$DoucheMuntjes.") ON DUPLICATE KEY UPDATE Aantal = ".$DoucheMuntjes."";
      $ExistDoucheResult = mysqli_query($con, $ExistDoucheQuery);
    }

    //For deleting/inserting/updating Visitors
    if($Bezoekers == 0)
    {
      $ExistBezoekersQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 6";
      $ExistBezoekersResult = mysqli_query($con, $ExistBezoekersQuery);
    }
    elseif($Bezoekers > 0)
    {
      $ExistBezoekersQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 6, ".$Bezoekers.") ON DUPLICATE KEY UPDATE Aantal = ".$Bezoekers."";
      $ExistBezoekersResult = mysqli_query($con, $ExistBezoekersQuery);
    }

    //For deleting/inserting/updating Washing cycles
    if($WasBeurten == 0)
    {
      $ExistWasBeurtQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 8";
      $ExistWasBeurtResult = mysqli_query($con, $ExistWasBeurtQuery);
    }
    elseif($WasBeurten > 0)
    {
      $ExistWasBeurtQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 8, ".$WasBeurten.") ON DUPLICATE KEY UPDATE Aantal = ".$WasBeurten."";
      $ExistWasBeurtResult = mysqli_query($con, $ExistWasBeurtQuery);
    }

    //For deleting/inserting/updating Drying cycles
    if($DroogBeurten == 0)
    {
      $ExistDroogBeurtQuery = "DELETE FROM reservatie_regels WHERE ReservatieNr = ".$ReservatieNr." AND CategorieNr = 9";
      $ExistDroogBeurtResult = mysqli_query($con, $ExistDroogBeurtQuery);
    }
    elseif($DroogBeurten > 0)
    {
      $ExistDroogBeurtQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 9, ".$DroogBeurten.") ON DUPLICATE KEY UPDATE Aantal = ".$DroogBeurten."";
      $ExistDroogBeurtResult = mysqli_query($con, $ExistDroogBeurtQuery);
    }     
  }
}      
?>