<?php
include 'Connection.php';
?>

<!doctype HTML>
<html id="logInDiv">
  <head>
    <title>La Rustique Reserveringsysteem</title>
    <link rel="icon" href="Img/La-Rustique-Logo-Icon.png">
    <!--Bootstrap links (css and java)-->
    <script src="Javascripts/jquery-3.5.1.js"></script>
    <script src="Javascripts/popper.js"></script>
    <script src="Javascripts/bootstrap.bundle.js"></script>
    <script src="Javascripts/LogIn.js"></script>
    <link rel="stylesheet" type="text/css" href="CssFiles/bootstrap.css"/>
  </head>
  <body>
    <div class="container-fluid d-flex h-75">
      <div class="d-flex p-3 px-5 m-auto border border-success rounded shadow">
        <form>
          <div class="form-group">
            <label for="Username">Gebruikersnaam</label>
            <input type="text" class="form-control form-control-sm" id="GebruikersnaamInlog" aria-describedby="Gebruikersnaam" value="">
          </div>
          <div class="form-group">
            <label for="Password">Wachtwoord</label>
            <input type="password" class="form-control form-control-sm" id="WachtwoordInlog" aria-describedby="Wachtwoord" value="">
          </div>
          <button type="button" class="btn btn-sm btn-success mx-5" onclick="logIn()">Inloggen</button>
        </form>
      </div>
    </div>
  </body>
</html>