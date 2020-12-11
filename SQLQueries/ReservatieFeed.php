<?php
include '../Connection.php';

function getData(){
  $PakReservatiesQuery = "SELECT ReservatieNr, PlaatsNr, AankomstDatum, VertrekDatum FROM reservaties";
  $PakReservatiesResult = mysqli_query($con, $PakReservatiesQuery);
  while($PakReservatiesRow = mysqli_fetch_array($PakReservatiesResult)){
    $myJSON[] = array(
      'title'=>'ReservatieNr: '.''.$PakReservatiesRow['ReservatieNr'].' PlaatsNr: '.''.$PakReservatiesRow['PlaatsNr'].'',
      'start'=>''.$PakReservatiesRow['AankomstDatum'].'',
      'end'=>''.$PakReservatiesRow['VertrekDatum'].''.'T00:00:00-05:00'
    ); 
  }
  return json_encode($myJSON);
  print_r(getData());
}


?>