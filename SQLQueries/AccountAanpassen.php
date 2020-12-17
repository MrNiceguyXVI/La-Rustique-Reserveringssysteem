<?php
include '../Connection.php';
$AccountNr = urldecode($_GET['AccountNr']);
$Gebruikersnaam = urldecode($_GET['Gebruikersnaam']);
$Wachtwoord = urldecode($_GET['Wachtwoord']);

//Checks to see if The admin option should be YES or NO
if(urldecode($_GET['Admin']) == "true"){
  $Admin = "YES";
} else {
  $Admin = "NO";
}

$AccountAanpassenQuery = "UPDATE accounts SET ANaam = '".$Gebruikersnaam."', AWachtwoord = '".$Wachtwoord."', AAdmin = '".$Admin."' WHERE AccountNr = ".$AccountNr."";
$AccountAanpassenResult = mysqli_query($con, $AccountAanpassenQuery);
?>