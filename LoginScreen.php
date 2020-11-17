<?php
?>

<!doctype HTML>
<html>
  <head>
    <title>La Rustique Reserveringsysteem</title>
    <!--Bootstrap links (css and java)-->
    <script src="Javascripts/jquery-3.5.1.js"></script>
    <script src="Javascripts/popper.js"></script>
    <script src="Javascripts/bootstrap.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>
    <div class="container-fluid d-flex h-75">
      <div class="d-flex p-3 px-5 m-auto border border-success rounded shadow">
        <form>
          <div class="form-group">
            <label for="Username">Gebruikersnaam</label>
            <input type="text" class="form-control" id="Gebruikersnaam" aria-describedby="Gebruikersnaam">
          </div>
          <div class="form-group">
            <label for="Password">Wachtwoord</label>
            <input type="password" class="form-control" id="Wachtwoord" aria-describedby="Wachtwoord">
          </div>
          <button type="submit" class="btn btn-success">Inloggen</button>
        </form>
      </div>
    </div>
  </body>
</html>