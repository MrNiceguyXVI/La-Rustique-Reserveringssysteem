<?php 
include '../Connection.php';
  $AankomstDatum = urldecode($_GET['aankomst']);
  $VertrekDatum = urldecode($_GET['vertrek']);
  $PlekFormaat = urldecode($_GET['formaat']);
  $Naam = urldecode($_GET['naam']);
  $Email = urldecode($_GET['email']);
  $Telefoon = urldecode($_GET['telefoon']);
  $Plek = urldecode($_GET['plek']);
  $Auto = urldecode($_GET['auto']);
  $SoortVerblijf = urldecode($_GET['soortverblijf']);
  $Electriciteit = urldecode($_GET['electriciteit']);
  $ExtraDoucheMuntjes = urldecode($_GET['extradouchemuntjes']);
  $Volwassenen = urldecode($_GET['volwassenen']);
  $KinderenTot4 = urldecode($_GET['kinderentot4']);
  $KinderenTot12 = urldecode($_GET['kinderentot12']);  
  $Huisdier = urldecode($_GET['huisdier']); 
echo "$AankomstDatum | $VertrekDatum | $PlekFormaat | $Naam | $Email | $Telefoon | $Plek | $Auto | $SoortVerblijf | $Electriciteit | $ExtraDoucheMuntjes | $Volwassenen | $KinderenTot4 | $KinderenTot12 | $Huisdier";
?>