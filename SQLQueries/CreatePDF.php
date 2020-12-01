<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

//Gets the ID from the URL
$id = $_GET['id'];

//totals variable used to calculate the grand total
$totaal = 0;

//Two dimensional Array to save all the related information to each category line, Inluding a calculated sub-total. 
//the first dimension of this array saves all the catagories applicable to the current reservation. The second dimension saves the 
//relevant data for each category.
$CategorieArray = array(
  array(),  //category number
  array(),  //category name
  array(),  //category price
  array(),  //Category item number 
  array()   //the subtotal for this category. 
);

//SQL query to fetch all the needed category data that's related to the current reservation
$CategorieQuery = "SELECT A.CategorieNr, B.CategorieNaam, B.Prijs, A.Aantal, C.AantalNachten FROM reservatie_regels A, categorieen B, reservaties C WHERE A.ReservatieNr = '".$id."' AND A.CategorieNr = B.CategorieNr AND C.ReservatieNr = '".$id."'";
$CategorieResult = mysqli_query($con, $CategorieQuery);

//Inside this while statement is code that pushes (and calculates) the related category data into the two dimensional array
while($CategorieRow = mysqli_fetch_array($CategorieResult)){
  array_push($CategorieArray[0], $CategorieRow['CategorieNr']);
  array_push($CategorieArray[1], $CategorieRow['CategorieNaam']);
  array_push($CategorieArray[2], $CategorieRow['Prijs']);
  array_push($CategorieArray[3], $CategorieRow['Aantal']);
  if($CategorieRow['CategorieNr'] >= 6 && $CategorieRow['CategorieNr'] <= 9)
  {
    array_push($CategorieArray[4], $CategorieRow['Aantal'] * $CategorieRow['Prijs']);
  }
  else
  {
    array_push($CategorieArray[4], $CategorieRow['Aantal'] * $CategorieRow['AantalNachten'] * $CategorieRow['Prijs']);
  }
}

//SQL code to fetch the remaining reservation data so it can be printed on the pdf
$PDFInfoQuery = "SELECT A.ReservatieNr, A.PlaatsNr, A.AankomstDatum, A.VertrekDatum, A.AantalNachten, B.KNaam, B.KTel, B.KEmail FROM reservaties A, klanten B  WHERE A.ReservatieNr = '".$id."' AND A.VertrekDatum <= '".$currentDate."' AND A.KlantNr = B.KlantNr";
$PDFInfoResult = mysqli_query($con, $PDFInfoQuery);
$PDFInfoRow = mysqli_fetch_array($PDFInfoResult);

require('../FPDF/fpdf.php');

$pdf = new Fpdf();
$pdf->AddFont('Calibri','' ,'calibri.php');
$pdf->AddFont('Calibri','B' ,'calibrib.php');
$pdf->AddPage();
$pdf->Image('../Img/La-Rustique-Logo.png', 102, 10, 100);

//Basic info section
//adres
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(13,10,'Adres: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(0,10,'63420 Ardes', 0, 1);
//telefoonnummer
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(19,0,'Telefoon: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(0,0,'04-7937200', 0, 1);
//E-mail
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(15,10,'E-mail: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(0,10,'info@larustique.com', 0, 1);
//openingstijd
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(19,0,'Geopend: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(0,0,'Maart tot Oktober', 0, 1);
//Datum
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(15,10,'Datum: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(0,10,''.$currentDate.'', 0, 1);

//Reservatie data
//Titles
$pdf->SetFont('Calibri', 'B',16);
$pdf->Cell(90,60,'Reservatie details', 0, 0);
$pdf->Cell(0,60,'Klantgegevens', 0, 1);

//First row: Reservation number and customer name
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(36,-40,'Reservatienummer: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(54.3,-40,''.$PDFInfoRow['ReservatieNr'].'', 0, 0);
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(13,-40,'Naam: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(00,-40,''.$PDFInfoRow['KNaam'].'', 0, 1);

//Second row: Arrival date and Phone number
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(33,50,'Aankomst datum: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(57.3,50,''.$PDFInfoRow['AankomstDatum'].'', 0, 0);
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(19,50,'Telefoon: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(00,50,''.$PDFInfoRow['KTel'].'', 0, 1);

//Third row: Departure date and Email Adress
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(29,-40,'Vertrek datum: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(58.3,-40,''.$PDFInfoRow['VertrekDatum'].'', 0, 0);
$pdf->SetFont('Calibri', 'B',12);
$pdf->Cell(19,-40,'E-mail: ', 0, 0);
$pdf->SetFont('Calibri', '',12);
$pdf->Cell(00,-40,''.$PDFInfoRow['KEmail'].'', 0, 0);
//$pdf->Cell(0,60,'Klantgegevens', 0, 1);



$pdf->Output();











  // echo "
  // ".$PDFInfoRow['ReservatieNr']."
  // </br>".$PDFInfoRow['PlaatsNr']."
  // </br>".$PDFInfoRow['AankomstDatum']."
  // </br>".$PDFInfoRow['VertrekDatum']."
  // </br>".$PDFInfoRow['AantalNachten']."
  // </br>".$PDFInfoRow['KNaam']."
  // </br>".$PDFInfoRow['KTel']."
  // </br>".$PDFInfoRow['KEmail']."</br>
  // ";

  // for($row = 0; $row < count($CategorieArray[0]); $row++)
  // {
  //   echo "".$CategorieArray[0][$row]." | ".$CategorieArray[1][$row]." | ".$CategorieArray[2][$row]." | ".$CategorieArray[3][$row]." | ".$CategorieArray[4][$row]."</br>";
  //   $totaal+=$CategorieArray[4][$row];
  // }
  // echo "</br>".$totaal."</br>";
?>