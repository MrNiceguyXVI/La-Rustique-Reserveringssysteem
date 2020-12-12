<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 
$ReservatiesQuery = "SELECT ReservatieNr, PlaatsNr, AankomstDatum, VertrekDatum FROM reservaties WHERE VertrekDatum > '$currentDate'";
$ReservatiesResult = mysqli_query($con, $ReservatiesQuery);
while($ReservatiesRow = mysqli_fetch_array($ReservatiesResult)){
  echo '<option value="'.$ReservatiesRow['VertrekDatum'].'|'.$ReservatiesRow['PlaatsNr'].'">ReservatieNr: '.$ReservatiesRow['ReservatieNr'].', PlaatsNr: '.$ReservatiesRow['PlaatsNr'].', Aankomst: '.$ReservatiesRow['AankomstDatum'].', Vertrek: '.$ReservatiesRow['VertrekDatum'].'</option>';
}


?>