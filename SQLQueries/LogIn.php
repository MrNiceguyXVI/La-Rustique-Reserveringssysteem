<?php
include '../Connection.php';
$Gebruikersnaam = urldecode($_GET['Gebruikersnaam']);
$Wachtwoord = urldecode($_GET['Wachtwoord']);

//Fetches the admin status from the server
$CheckInlogGegevensQuery = "SELECT AAdmin FROM accounts WHERE ANAAM = '".$Gebruikersnaam."' AND AWachtwoord = '".$Wachtwoord."'";
$CheckInlogGegevensResult = mysqli_query($con, $CheckInlogGegevensQuery);

//checks if there's any user with that account
if(mysqli_num_rows($CheckInlogGegevensResult)!=0)
{
  session_start();
  while($CheckInlogGegevensRow = mysqli_fetch_array($CheckInlogGegevensResult))
  {
    $_SESSION["Admin"] = $CheckInlogGegevensRow["AAdmin"];
  }
  echo "<style onload='RedirectMenu();'></style>";
} 
else 
{
  echo "<style onload='UserNonExistent();'></style>";
}
?>