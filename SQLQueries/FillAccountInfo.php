<?php
include '../Connection.php';
$id = urldecode($_GET['AccountNr']); //Decodes variable passed through the URL

//for fetching the relevant account info and inserting that into the text fields
$PakAccountQuery = "SELECT * FROM accounts WHERE AccountNr = ".$id."";
$PakAccountResult = mysqli_query($con, $PakAccountQuery);
while($PakAccountRow = mysqli_fetch_array($PakAccountResult))
{
  $AccountNaam = $PakAccountRow['ANaam'];
  $OudWachtwoord = $PakAccountRow['AWachtwoord'];
  $Admin = $PakAccountRow['AAdmin'];
}

switch($Admin)
{
  case "YES":
    $AdminVal = "CHECKED";
    break;
  case "NO":
    $AdminVal = " ";
    break;
}

echo '
<form>
  <div class="form-group">
    <label for="Username">Gebruikersnaam</label>
    <input type="text" class="form-control form-control-sm" id="GebruikersnaamAanpassen" aria-describedby="Gebruikersnaam" value="'.$AccountNaam.'">
  </div>
  <div class="form-group">
    <label for="Password">Nieuw Wachtwoord</label>
    <input type="password" class="form-control form-control-sm" id="WachtwoordAanpassen" aria-describedby="Wachtwoord" value="'.$OudWachtwoord.'" onmouseover="mouseoverPass('."'WachtwoordAanpassen'".');" onmouseout="mouseoutPass('."'WachtwoordAanpassen'".');">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="AdminCheckBoxAanpassen" '.$AdminVal.' value="'.$AdminVal.'">
    <label class="form-check-label" for="exampleCheck1">Admin</label>
  </div>
  <input type="number" hidden id="AccountIdAanpassen" value="'.$id.'">
</form>
';
?>