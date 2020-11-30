<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 
$id = $_GET['id'];

$PDFQuery = "SELECT A.ReservatieNr, A.PlaatsNr, A.AankomstDatum, A.VertrekDatum, A.AantalNachten, B.CategorieNr, B.Aantal, C.KNaam, C.KTel, C.KEmail FROM reservaties A, reservatie_regels B, klanten C  WHERE A.ReservatieNr = '".$id."' AND A.VertrekDatum <= '".$currentDate."' AND A.ReservatieNr = B.ReservatieNr AND A.KlantNr = C.KlantNr";
$PDFResult = mysqli_query($con, $PDFQuery);
while($PDFRow = mysqli_fetch_array($PDFResult)){
  
}

?>