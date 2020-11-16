<?php
?>

<!doctype HTML>
<html>
  <head>
    <title>La Rustique reserveringsysteem</title>
    <!--Bootstrap links (css and java)-->
    <script src="Javascripts/jquery-3.5.1.js"></script>
    <script src="Javascripts/popper.js"></script>
    <script src="Javascripts/bootstrap.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
  </head>
  <body>
    <div class="container-fluid">
      <!--Top bar-->
      <div class="row bg-white shadow-sm" style="height:6vh">

        <!--Logo-->
        <div class="col-2 p-0" style="display:flex;align-items: center; flex-wrap: wrap;">
          <img src="Img/Placeholder.png" class="img-fluid pointer" alt="Responsive image" onclick="home()">
        </div>

        <!--Page name-->
        <div class="col-10" style="display:flex;align-items: center; flex-wrap: wrap;"> 

          <!--Button to hide menu-->
          <button type="button" class="btn btn-menu p-0 mr-4" id="menubtn" onclick="menuHide()">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-menu-button-wide-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M14 7H2a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM2 6a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2H2z"/>
            <path fill-rule="evenodd" d="M15 11H1v-1h14v1zM2 12.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm9.927.427l.396.396a.25.25 0 0 0 .354 0l.396-.396A.25.25 0 0 0 13.396 2h-.792a.25.25 0 0 0-.177.427z"/>
          </svg>
          </button>

          <!--actual page name-->                  
          <div class="text-black" id="PageTitle">Welkom!</div>

          <!--Button to Add user-->
          <button type="button" class="btn btn-addUser p-0 mr-2 ml-auto" id="list-Registratie-list" data-toggle="list" href="#list-Registratie" role="tab" aria-controls="Registratie" onclick="addUser()">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
          </button>

          <!--Button to log out-->
          <button type="button" class="btn btn-logOut p-0 mx-3" id="menubtn" onclick="logOut()">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
            </svg>
          </button>
        </div>
      </div>

      <!--Menu and Selected page-->
      <div class="row justify-content-center" style="height:94vh">
        <!--Menu-->
        <div class="col-2 bg-dark" id="menu">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action" id="list-Reserveren-list" data-toggle="list" href="#list-Reserveren" role="tab" aria-controls="Reserveren" onclick="titleReservatie()">Reserveren</a>
            <a class="list-group-item list-group-item-action" id="list-Reservatie-Overzicht-list" data-toggle="list" href="#list-Reservatie-Overzicht" role="tab" aria-controls="Reservatie-Overzicht" onclick="titleReservatieOverzicht()">Reservatie Overzicht</a>
            <a class="list-group-item list-group-item-action" id="list-Plekken-list" data-toggle="list" href="#list-Plekken" role="tab" aria-controls="Plekken" onclick="titlePlekken()">Plekken</a>
            <a class="list-group-item list-group-item-action" id="list-Facturen-list" data-toggle="list" href="#list-Facturen" role="tab" aria-controls="Facturen" onclick="titleFacturen()">Facturen</a>
            <a class="list-group-item list-group-item-action" id="list-Omzet-list" data-toggle="list" href="#list-Omzet" role="tab" aria-controls="Omzet" onclick="titleOmzet()">Omzet</a>
          </div>
        </div>

        <!--Selected page-->
        <div class="col-10 pt-1" id="selectedpage">
          <div class="tab-content" id="nav-tabContent">
            <!--Different Pages-->

            <!--Reserveren page-->
            <div class="tab-pane" id="list-Reserveren" role="tabpanel" aria-labelledby="list-Reserveren-list">
              <div class="text-dark">Reservatie Pagina</div>
            </div>

            <!--Reservatie Overzicht page-->
            <div class="tab-pane" id="list-Reservatie-Overzicht" role="tabpanel" aria-labelledby="list-Reservatie-Overzicht-list">
              <div class="text-dark">Reservatie Overzicht Pagina</div>
            </div>

            <!--Plekken-->
            <div class="tab-pane" id="list-Plekken" role="tabpanel" aria-labelledby="list-Plekken-list">
              <div class="text-dark">Plekken Pagina</div>
            </div>

            <!--Facturen-->
            <div class="tab-pane" id="list-Facturen" role="tabpanel" aria-labelledby="list-Facturen-list">
              <div class="text-dark">Facturen Pagina</div>
            </div>

            <!--Omzet-->
            <div class="tab-pane" id="list-Omzet" role="tabpanel" aria-labelledby="list-Omzet-list">
              <div class="text-dark">Omzet Pagina</div>
            </div>

            <!--Nieuwe Gebruiker Registreren-->
            <div class="tab-pane" id="list-Registratie" role="tabpanel" aria-labelledby="list-Registratie-list">
              <div class="text-dark">Registratie Pagina</div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>