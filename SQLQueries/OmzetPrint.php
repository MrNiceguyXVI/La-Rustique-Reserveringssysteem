<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 
$currentMonth = date("m");
$ReservatieNrs = array(
  array(),                //ReservatieNr
  array()                 //AantalNachten
);

//initialising variables
$Volwassenen = 0;
$KinderenTot4 = 0; 
$KinderenTot12 = 0;
$Huisdier = 0;
$Elektriciteit = 0;
$Bezoekers = 0;
$Douche = 0; 
$Wasmachine = 0;
$Wasdroger = 0;
$CaravanG = 0;
$CaravanK = 0;
$TentG = 0;
$TentK = 0;
$Auto = 0;

function BerekenSubTotaal($CNr, $AantalItems, $AantalNachten, $Prijs)
{
  //Making all the needed variables global so I can use them
  global $Volwassenen;
  global $KinderenTot4; 
  global $KinderenTot12;
  global $Huisdier;
  global $Elektriciteit;
  global $Bezoekers;
  global $Douche; 
  global $Wasmachine;
  global $Wasdroger;
  global $CaravanG;
  global $CaravanK;
  global $TentG;
  global $TentK;
  global $Auto;

  switch($CNr)
  {
    case 1:
      $Volwassenen +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 2:
      $KinderenTot4 +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 3:
      $KinderenTot12 +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 4:
      $Huisdier +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 5:
      $Elektriciteit +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 6:
      $Bezoekers+= ($AantalItems * $Prijs);
      break;
    case 7:
      $Douche+= ($AantalItems * $Prijs);
      break;
    case 8:
      $Wasmachine+= ($AantalItems * $Prijs);
      break;
    case 9:
      $Wasdroger+= ($AantalItems * $Prijs);
      break;
    case 10:
      $CaravanK +=($AantalItems * $AantalNachten * $Prijs);
      break; 
    case 11:
      $CaravanG +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 12:
      $TentK +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 13:
      $TentG +=($AantalItems * $AantalNachten * $Prijs);
      break;
    case 14:
      $Auto +=($AantalItems * $AantalNachten * $Prijs);
      break;
  }
}

$PakReservatieNrQuery = "SELECT ReservatieNr, AantalNachten FROM reservaties WHERE MONTH(VertrekDatum) = ".$currentMonth." AND VertrekDatum <= '".$currentDate."'";
$PakReservatieNrResult = mysqli_query($con, $PakReservatieNrQuery);
while($PakReservatieNrRow = mysqli_fetch_array($PakReservatieNrResult))
{
  array_push($ReservatieNrs[0], $PakReservatieNrRow['ReservatieNr']);
  array_push($ReservatieNrs[1], $PakReservatieNrRow['AantalNachten']);
}

for($Nr = 0;$Nr < (count($ReservatieNrs[0])); $Nr++)
{
  //SQL query to fetch all the needed category data that's related to the current reservation number
  $CategorieQuery = "SELECT A.CategorieNr, A.Aantal, B.Prijs FROM reservatie_regels A, categorieen B WHERE A.ReservatieNr = ".$ReservatieNrs[0][$Nr]." AND B.CategorieNr = A.CategorieNr";
  $CategorieResult = mysqli_query($con, $CategorieQuery);

  //A function gets called that calculates the subtotal for the categories
  while($CategorieRow = mysqli_fetch_array($CategorieResult))
  {
    BerekenSubTotaal($CategorieRow['CategorieNr'], $CategorieRow['Aantal'], $ReservatieNrs[1][$Nr], $CategorieRow['Prijs']); 
  } 

}

//Adding all the subtotals up for the total revenue for the current month
$Totaal = $Volwassenen+$KinderenTot4+$KinderenTot12+$Huisdier+$Elektriciteit+$Bezoekers+$Douche+$Wasmachine+$Wasdroger+$CaravanG+$CaravanK+$TentG+$TentK+$Auto;

echo "
<table>
  <tr><td style='padding-right:5em;'><h5>Volwassenen: </h5></td><td> <h5 style='font-weight:normal;'>€".$Volwassenen.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Kinderen tot 4 jaar: </h5></td><td> <h5 style='font-weight:normal;'>€".$KinderenTot4.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Kinderen tussen 4 en 12 jaar: </h5></td><td> <h5 style='font-weight:normal;'>€".$KinderenTot12.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Huisdier: </h5></td><td> <h5 style='font-weight:normal;'>€".$Huisdier.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Elektriciteit: </h5></td><td> <h5 style='font-weight:normal;'>€".$Elektriciteit.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Bezoekers: </h5></td><td> <h5 style='font-weight:normal;'>€".$Bezoekers.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Douche muntjes: </h5></td><td> <h5 style='font-weight:normal;'>€".$Douche.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Wasmachine: </h5></td><td> <h5 style='font-weight:normal;'>€".$Wasmachine.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Wasdroger: </h5></td><td> <h5 style='font-weight:normal;'>€".$Wasdroger.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Caravan/Camper (Groot): </h5></td><td> <h5 style='font-weight:normal;'>€".$CaravanG.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Caravan/Camper (Klein): </h5></td><td> <h5 style='font-weight:normal;'>€".$CaravanK.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Tent (Groot): </h5></td><td> <h5 style='font-weight:normal;'>€".$TentG.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Tent (Klein): </h5></td><td> <h5 style='font-weight:normal;'>€".$TentK.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><h5>Auto: </h5></td><td> <h5 style='font-weight:normal;'>€".$Auto.",-</h5></td></td>
  <tr><td style='padding-right:5em;'><br/></td></tr>
  <tr><td style='padding-right:5em;'><h5>Totaal: </h5></td><td> <h5 style='font-weight:normal;'>€".$Totaal.",-</h5></td></td>
</table>";
?>