<?php
include '../Connection.php';
$id = urldecode($_GET['AccountNr']); //Decodes variable passed through the URL

echo '
Opties voor Account info hier voor AccountNr: '.$id.' <br>
<form>
  <div class="form-group">
    <label for="Username">Gebruikersnaam</label>
    <input type="text" class="form-control form-control-sm" id="Gebruikersnaam" aria-describedby="Gebruikersnaam" value="Test">
  </div>
  <div class="form-group">
    <label for="Password">Wachtwoord</label>
    <input type="password" class="form-control form-control-sm" id="Wachtwoord" aria-describedby="Wachtwoord" value="Test">
  </div>
</form>
';


?>