<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

$FacturenQuery = "SELECT ReservatieNr, AankomstDatum, VertrekDatum, AantalNachten FROM reservaties WHERE VertrekDatum <= '".$currentDate."'";
$FacturenResult = mysqli_query($con, $FacturenQuery);
while($FacturenRow = mysqli_fetch_array($FacturenResult))
{
  echo "
    <tr>
      <td>".$FacturenRow['ReservatieNr']."</td>
      <td>".$FacturenRow['AankomstDatum']."</td>
      <td>".$FacturenRow['VertrekDatum']."</td>
      <td>".$FacturenRow['AantalNachten']."</td>
      <td><button type='button' class='btn btn-sm btn-menu m-0' onclick='CreatePDF(".$FacturenRow['ReservatieNr'].")'>Open</button></td> 
    </tr>
  ";
}
?>