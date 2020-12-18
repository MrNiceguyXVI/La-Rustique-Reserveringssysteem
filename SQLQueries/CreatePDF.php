<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

//Gets the ID from the URL
$id = urldecode($_GET['id']); //Decodes variable passed through the URL

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
while($CategorieRow = mysqli_fetch_array($CategorieResult))
{
  array_push($CategorieArray[0], $CategorieRow['CategorieNr']);
  array_push($CategorieArray[1], $CategorieRow['CategorieNaam']);
  array_push($CategorieArray[2], $CategorieRow['Prijs']);
  array_push($CategorieArray[3], $CategorieRow['Aantal']);
  if($CategorieRow['CategorieNr'] >= 6 && $CategorieRow['CategorieNr'] <= 9)
  {
    array_push($CategorieArray[4], $CategorieRow['Aantal'] * $CategorieRow['Prijs']);                                     //If the current catagory number is between these values, it means the subtotal has to be calculated a different way
  }
  else
  {
    array_push($CategorieArray[4], $CategorieRow['Aantal'] * $CategorieRow['AantalNachten'] * $CategorieRow['Prijs']);    //this is the standardw way to calculate the subtotal
  }
}

//If the catagorieNr array contains these 2 numbers, it means the reserved spot was small. if not It means the reserved spot was large
if(in_array(10, $CategorieArray[0]) || in_array(12, $CategorieArray[0]))
{
  $PlaatsFormaat = "(Klein)";
}
else
{
  $PlaatsFormaat = "(Groot)";
}

//SQL code to fetch the remaining reservation data so it can be printed on the pdf
$PDFInfoQuery = "SELECT A.ReservatieNr, A.PlaatsNr, A.AankomstDatum, A.VertrekDatum, A.AantalNachten, B.KNaam, B.KTel, B.KEmail FROM reservaties A, klanten B  WHERE A.ReservatieNr = '".$id."' AND A.VertrekDatum <= '".$currentDate."' AND A.KlantNr = B.KlantNr";
$PDFInfoResult = mysqli_query($con, $PDFInfoQuery);
$PDFInfoRow = mysqli_fetch_array($PDFInfoResult);

//A function that I'll invoke later to print each table row with the relevenant info for that category. It also ensures that it prints the exact number of needed rows; so NO DUPLICATES!
function MakeString(){
  global $CategorieArray;
  $addup='';                                                //This variable is used to paste the Html string onto each round for all the categories.
  for($row = 0; $row < count($CategorieArray[0]); $row++)
  {
    global $totaal;
    $totaal+=$CategorieArray[4][$row];
    $addup.="<tr><td>".$CategorieArray[1][$row]."</td><td>€".$CategorieArray[2][$row].",-</td><td>".$CategorieArray[3][$row]."</td><td>€".$CategorieArray[4][$row].",-</td></tr>";
  }   
  return $addup;                                            //It returns the Super long string containing the html string for all rows so they all get printed
}

//Loads the TCPDF library so it can be used to generate a PDF
require_once('../TCPDF/tcpdf.php');

//create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//Create the invoice name. Consists of Reservation id and arrival and departure date
$FactuurNaam = "Factuur_".$PDFInfoRow['ReservatieNr']."_".$PDFInfoRow['AankomstDatum']."_".$PDFInfoRow['VertrekDatum']."";

//set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('La Rustique');
$pdf->SetTitle($FactuurNaam);
$pdf->SetSubject('Factuur voor reservatue');
$pdf->SetKeywords('factuur, Betaling, reservatie, kamperen');

//disable headers and footers
$pdf->setPrintHeader(False);
$pdf->setPrintFooter(false);

//Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set font
$pdf->SetFont('dejavusans', '', 11);

//add a page
$pdf->AddPage();

//add an image
$pdf->Image('../Img/La-Rustique-Logo.png', 102, 10, 100, 20, 'PNG');

//html content for the general info of La-Rustique
$BasicInfo = 
"<p>
  <b>Adres: </b>63420 Ardes<br>
  <b>Telefoon: </b>04-7637200<br>
  <b>E-mail: </b>info@larustique.com<br>
  <b>Geopend: </b>Maart tot Oktober<br>
  <b>Datum: </b>".$PDFInfoRow['VertrekDatum']."<br>
</p><br>";

//Reservation Data titles
$ReservationDataTitles = 
"<br><p>
  <i>Reservatie details</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <i>Klantgegevens</i>
</p>";

//Reservation and customer data
$ReservationData = 
"<p>
  <br>
  <table>
    <tr>
      <td><b> Reservatienummer: </b>".$PDFInfoRow['ReservatieNr']."</td>&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;<td><b>Naam: </b>".$PDFInfoRow['KNaam']."</td>
    </tr>
    <tr>
      <td><b> Aankomst datum: </b>".$PDFInfoRow['AankomstDatum']."</td>&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;<td><b>E-mail: </b>".$PDFInfoRow['KEmail']."</td>
    </tr>
    <tr>
      <td><b> Vertrek datum: </b>".$PDFInfoRow['VertrekDatum']."</td>&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;<td><b>Telefoon: </b>".$PDFInfoRow['KTel']."</td>
    </tr>  
    <tr>
      <td><b> Aantal nachten: </b>".$PDFInfoRow['AantalNachten']."</td>&nbsp;&nbsp;&nbsp;&nbsp;
    </tr>
  </table>
</p>";

//Category title
$CategoryTitle =
"<br><p>
  <b>Plaats: </b>".$PDFInfoRow['PlaatsNr']." ".$PlaatsFormaat."
</p>";

//Category table
$CategoryTable = 
'<head>
  <style>    
      table, th, td{
        border: 1px solid black;
      }      
  </Style>
</head><br><br>&nbsp;&nbsp;
<table style="width:650px;">
<tr>
    <th><b>Categorie</b></th>
    <th><b>Prijs</b></th>
    <th><b>Aantal</b></th>
    <th><b>Subtotaal</b></th>
  </tr>'.MakeString().'  
  <tr>
    <th colspan="3"><b>Totaal</b></th>
    <th>€'.$totaal.',-</th>
  </tr>
</table>';

// output the HTML to the pdf in making
$pdf->writeHTML($BasicInfo, true, false, true, false, '');
$pdf->SetFont('dejavusans', '', 15);
$pdf->writeHTML($ReservationDataTitles, true, false, true, false, '');
$pdf->SetFont('dejavusans', '', 11);
$pdf->writeHTML($ReservationData, true, false, true, false, '');
$pdf->SetFont('dejavusans', '', 15);
$pdf->writeHTML($CategoryTitle, true, false, true, false, '');
$pdf->SetFont('dejavusans', '', 10);
$pdf->writeHTML($CategoryTable, true, false, true, false, '');

//Outputs the PDF document that we've been putting together with writeHTML() functions to the 'I'nternetpage. Change the 'I' to an 'D' or folder path to download the PDF automatically
$pdf->Output($FactuurNaam.'.pdf', 'I');
?>