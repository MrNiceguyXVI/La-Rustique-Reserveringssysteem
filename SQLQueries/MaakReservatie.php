<?php 
include '../Connection.php';
$AankomstDatum = urldecode($_GET['aankomst']);
$VertrekDatum = urldecode($_GET['vertrek']);
$PlekFormaat = urldecode($_GET['formaat']);
$Naam = urldecode($_GET['naam']);
$Email = urldecode($_GET['email']);
$Tel = urldecode($_GET['telefoon']);
$Plek = urldecode($_GET['plek']);
$Auto = urldecode($_GET['auto']);
$SoortVerblijf = urldecode($_GET['soortverblijf']);
$Electriciteit = urldecode($_GET['electriciteit']);
$ExtraDoucheMuntjes = urldecode($_GET['extradouchemuntjes']);
$Volwassenen = urldecode($_GET['volwassenen']);
$KinderenTot4 = urldecode($_GET['kinderentot4']);
$KinderenTot12 = urldecode($_GET['kinderentot12']);  
$Huisdier = urldecode($_GET['huisdier']); 
$Telefoon = str_replace(' ', '', "+".$Tel);

//Query that only inserts the entered customer details into the 'klanten' table if there's no record containing the same name, email and phone number; this avoids precise duplicates
$InsertKlantQuery = "
  INSERT INTO klanten (KNaam, KEmail, KTel)
  SELECT * FROM (SELECT '".$Naam."', '".$Email."', '".$Telefoon."') AS tmp
  WHERE NOT EXISTS (
      SELECT KNaam, KEmail, KTel FROM klanten WHERE KNaam = '".$Naam."' AND KEmail = '".$Email."' AND KTel = '".$Telefoon."'
  ) LIMIT 1
";

//executes the query
$InsertKlantResult = mysqli_query($con, $InsertKlantQuery);

/*Convert $AankomstDatum and $VertrekDatum to date variables 
*and immediatly calculte the difference between them. 
*lastly it formats it so you see the difference in days, 
*This is so you can see how many nights the customer has stayed
*/
$AantalNachten = date_diff(date_create($AankomstDatum), date_create($VertrekDatum))->format('%a');

//Fetches the accurate KlantNr id value from the 'klanten' table 
$PakKlantNrQuery = "SELECT KlantNr FROM klanten WHERE KNaam = '".$Naam."' AND KEmail = '".$Email."' AND KTel = '".$Telefoon."'";
$PakKlantNrResult = mysqli_query($con, $PakKlantNrQuery);

//Puts the above mentioned id into a variable for later insertion
while($PakKlantNrRow = mysqli_fetch_array($PakKlantNrResult))
{
  $KlantNr = $PakKlantNrRow['KlantNr'];
}

//Query for inserting a new record into the 'reservaties' table with the accurate information
$InsertReservatieQuery = "
          INSERT INTO reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
          VALUES (".$Plek.", ".$KlantNr.", '".$AankomstDatum."', '".$VertrekDatum."', ".$AantalNachten.")
";
$InsertReservatieResult = mysqli_query($con, $InsertReservatieQuery);

//fetch the reservation id of the reservation we just made, so we can add catagories to it
$PakReservationNrQuery = "SELECT ReservatieNr FROM reservaties WHERE PlaatsNr = ".$Plek." AND KlantNr = ".$KlantNr." AND AankomstDatum = '".$AankomstDatum."' AND VertrekDatum = '".$VertrekDatum."'";
$PakReservationNrResult = mysqli_query($con, $PakReservationNrQuery);
//Executes the query
while($PakReservationNrRow = mysqli_fetch_array($PakReservationNrResult))
{
  $ReservatieNr = $PakReservationNrRow['ReservatieNr'];
}

//Here we insert the appropriate categories with their values into 'reservatie_regels'

//Insert Volwassenen
$InsertVolwassenenQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 1, ".$Volwassenen.")";
$InsertVolwassenenResult = mysqli_query($con, $InsertVolwassenenQuery);

//Insert Kinderen tot 4
if($KinderenTot4 > 0)
{
  $InsertKinderenTot4Query = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 2, ".$KinderenTot4.")";
  $InsertKinderenTot4Result = mysqli_query($con, $InsertKinderenTot4Query);
}

//Insert Kinderen tot 12
if($KinderenTot12 > 0)
{
  $InsertKinderenTot12Query = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 3, ".$KinderenTot12.")";
  $InsertKinderenTot12Result = mysqli_query($con, $InsertKinderenTot12Query);
}

//Insert hond
if($Huisdier == "Ja")
{
  $InsertHondQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 4, 1)";
  $InsertHondResult = mysqli_query($con, $InsertHondQuery);
}

//Insert electriciteit
if($Electriciteit == "Ja")
{
  $InsertElectraQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 5, 1)";
  $InsertElectraResult = mysqli_query($con, $InsertElectraQuery);
}

//Insert extra douchemuntjes
if($ExtraDoucheMuntjes > 0)
{
  $InsertDoucheMuntjesQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 7, ".$ExtraDoucheMuntjes.")";
  $InsertDoucheMuntjesResult = mysqli_query($con, $InsertDoucheMuntjesQuery);
}

//For fetching the most accurate spot size
$PakPlekFormaatQuery = "SELECT PlaatsFormaat FROM plaatsen WHERE PlaatsNr = ".$Plek."";
$PakPlekFormaatResult = mysqli_query($con, $PakPlekFormaatQuery);

//Executing the query and saving the value
while($PakPlekFormaatRow = mysqli_fetch_array($PakPlekFormaatResult))
{
  $PlaatsFormaat = $PakPlekFormaatRow['PlaatsFormaat'];
}

//For inserting the spot size
if($PlaatsFormaat == "GROOT")
{
  //For inserting the spot type
  if($SoortVerblijf == "Caravan")
  {
    $InsertCaravanGrootQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 11, 1)";
    $InsertCaravanGrootResult = mysqli_query($con, $InsertCaravanGrootQuery);
  } 
  else if ($SoortVerblijf == "Tent")
  {
    $InsertTentGrootQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 13, 1)";
    $InsertTentGrootResult = mysqli_query($con, $InsertTentGrootQuery);
  }
} 
else if ($PlaatsFormaat == "KLEIN")
{
  //For inserting the spot type
  if($SoortVerblijf == "Caravan")
  {
    $InsertCaravanKleinQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 10, 1)";
    $InsertCaravanKleinResult = mysqli_query($con, $InsertCaravanKleinQuery);
  } 
  else if ($SoortVerblijf == "Tent")
  {
    $InsertTentKleinQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 12, 1)";
    $InsertTentKleinResult = mysqli_query($con, $InsertTentKleinQuery);
  }
}

//For inserting the car category
if($Auto == "Ja")
{
  $InsertAutoQuery = "INSERT INTO reservatie_regels (ReservatieNr, CategorieNr, Aantal) VALUES (".$ReservatieNr.", 14, 1)";
  $InsertAutoResult = mysqli_query($con, $InsertAutoQuery);
}
?>