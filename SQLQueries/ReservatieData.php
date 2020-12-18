<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

//Function that returns the number of shower coins that are connected to the given reservation
function Muntjescheck($RNr, $con)
{
  $sql = "SELECT Aantal FROM reservatie_regels WHERE CategorieNr = 7 AND ReservatieNr = ".$RNr."";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $DoucheMuntjes = $row['Aantal'];
    return $DoucheMuntjes;
  }
}

//Function that returns the number of visitors that are connected to the given reservation
function Bezoekerscheck($RNr, $con)
{
  $sql = "SELECT Aantal FROM reservatie_regels WHERE CategorieNr = 6 AND ReservatieNr = ".$RNr."";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $Bezoekers = $row['Aantal'];
    return $Bezoekers;
  }
}

//Function that returns the number of washing cycles that are connected to the given reservation
function WassenCheck($RNr, $con)
{
  $sql = "SELECT Aantal FROM reservatie_regels WHERE CategorieNr = 8 AND ReservatieNr = ".$RNr."";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $WasBeurten = $row['Aantal'];
    return $WasBeurten;
  }
}

//Function that returns the number of drying cycles that are connected to the given reservation
function DrogenCheck($RNr, $con)
{
  $sql = "SELECT Aantal FROM reservatie_regels WHERE CategorieNr = 9 AND ReservatieNr = ".$RNr."";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $DroogBeurten = $row['Aantal'];
    return $DroogBeurten;
  }
}

function PakPlekFormaat($PNr, $con)
{
  $sql = "SELECT PlaatsFormaat FROM plaatsen WHERE PlaatsNr = ".$PNr."";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $PlaatsFormaat = $row['PlaatsFormaat'];
    return $PlaatsFormaat;
  }
}

echo "<option>---Selecteer een optie---</option>";

$ReservatiesQuery = "SELECT ReservatieNr, PlaatsNr, AankomstDatum, VertrekDatum FROM reservaties WHERE VertrekDatum > '$currentDate'";
$ReservatiesResult = mysqli_query($con, $ReservatiesQuery);
while($ReservatiesRow = mysqli_fetch_array($ReservatiesResult))
{
    $DoucheMuntjes = Muntjescheck($ReservatiesRow['ReservatieNr'], $con);
    $Bezoekers = Bezoekerscheck($ReservatiesRow['ReservatieNr'], $con);
    $WasBeurten = WassenCheck($ReservatiesRow['ReservatieNr'], $con);
    $DroogBeurten = DrogenCheck($ReservatiesRow['ReservatieNr'], $con);
    $PlaatsFormaat = PakPlekFormaat($ReservatiesRow['PlaatsNr'], $con);

    echo '<option value="'.$ReservatiesRow['VertrekDatum'].'|'.$ReservatiesRow['PlaatsNr'].'|'.$DoucheMuntjes.'|'.$Bezoekers.'|'.$WasBeurten.'|'.$DroogBeurten.'|'.$ReservatiesRow['ReservatieNr'].'|'.$ReservatiesRow['AankomstDatum'].'|'.$PlaatsFormaat.'">ReservatieNr: '.$ReservatiesRow['ReservatieNr'].', PlaatsNr: '.$ReservatiesRow['PlaatsNr'].', Aankomst: '.$ReservatiesRow['AankomstDatum'].', Vertrek: '.$ReservatiesRow['VertrekDatum'].'</option>';
}
?>