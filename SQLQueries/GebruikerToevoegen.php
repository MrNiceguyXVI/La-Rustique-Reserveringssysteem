<?php
include '../Connection.php';
$Gebruikersnaam = urldecode($_GET['gebruikersnaam']); 
$Wachtwoord = urldecode($_GET['wachtwoord']); 

//Checks to see if The admin option should be YES or NO
if(urldecode($_GET['admin']) == "true")
{
  $Admin = "YES";
} 
else 
{
  $Admin = "NO";
}
 
//Inserts the account into the database
$InsertAccountQuery = "INSERT INTO accounts (ANaam, AWachtwoord, AAdmin) VALUES ('".$Gebruikersnaam."', '".$Wachtwoord."', '".$Admin."')";
$InsertAccountResult = mysqli_query($con, $InsertAccountQuery);
?>