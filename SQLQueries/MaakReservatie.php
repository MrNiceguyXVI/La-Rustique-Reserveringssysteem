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
while($PakKlantNrRow = mysqli_fetch_array($PakKlantNrResult)){
  $KlantNr = $PakKlantNrRow['KlantNr'];
}

//Query for inserting a new record into the 'reservaties' table with the accurate information
$InsertReservatieQuery = "
          INSERT INTO reservaties (PlaatsNr, KlantNr, AankomstDatum, VertrekDatum, AantalNachten)
          VALUES (".$Plek.", ".$KlantNr.", ".$AankomstDatum.", ".$VertrekDatum.", ".$AantalNachten.")
";
$InsertReservatieResult = mysqli_query($con, $InsertReservatieQuery);
?>