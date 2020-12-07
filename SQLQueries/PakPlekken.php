<?php
include '../Connection.php';
$aankomst = urldecode($_GET['aankomst']);
$vertrek = urldecode($_GET['vertrek']);
$formaat = urldecode($_GET['formaat']);

$PlekkenCheckQuery = "SELECT PlaatsNr FROM plaatsen WHERE PlaatsFormaat = ".$formaat." AND PlaatsNr NOT IN (
  SELECT PlaatsNr FROM reservaties WHERE NOT (".$aankomst." >= VertrekDatum OR ".$vertrek." < AankomstDatum))";

$PlekkenCheckResult = mysqli_query($con, $PlekkenCheckQuery);

//enters the available spots as options to choose from in the correct selector
while($PlekkenCheckRow = mysqli_fetch_array($PlekkenCheckResult)) 
{
  echo '
    <option value="'.$PlekkenCheckRow["PlaatsNr"].'">'.$PlekkenCheckRow["PlaatsNr"].'</option>
    ';
}

?>