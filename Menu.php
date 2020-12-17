<?php
include 'Connection.php';
$currentDate = date("Y-m-d"); 
?>

<!doctype HTML>
<html lang="nl">
  <head>
    <title>La Rustique Reserveringsysteem</title>
    <link rel="icon" href="Img/La-Rustique-Logo-Icon.png">
    <!--Bootstrap links (css and java)-->
    <script src="Javascripts/jquery-3.5.1.js"></script>
    <script src="Javascripts/moment.js"></script>
    <script src="Javascripts/popper.js"></script>
    <script src="Javascripts/bootstrap.bundle.js"></script>
    <script src="Javascripts/bootstrap-datepicker.js"></script>
    <script src="Javascripts/bootstrap-datepicker.nl.min.js"></script>
    <script src="Javascripts/CustomFunctions.js"></script>
    <script src="fullcalendar/main.js"></script>
    <script src="fullcalendar/locales/nl.js"></script>
    <link rel="stylesheet" type="text/css" href="CssFiles/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="CssFiles/bootstrap-datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="fullcalendar/main.css"/>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          events: 'SQLQueries/ReservatieFeed.php',
          color: 'green',
          initialView: 'dayGridMonth',
          height:570,
          locale: 'nl',
          displayEventTime: false
        });
        calendar.render();
      }); 
      
      //function for dislaying a certain alert within an Ajax called document
      function VerkeerdeDatum(){
        alert("Aanpassen geannuleerd door fouten:\nDe vertrek datum mag niet voor of op vandaag zijn, en ook niet voor of op de aankomst datum\n");
      }
      
      function PlekAlBezet(){
        alert("Aanpassen geannuleerd door fouten:\nDe gekozen Plek is al bezet om deze datums");
      }
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <!--Top bar-->
      <div class="row bg-white shadow-sm" style="height:6vh">

        <!--Logo-->
        <div class="col-2 p-0" style="display:flex;align-items: center; flex-wrap: wrap;">
          <img src="Img/La-Rustique-Logo.png" class="img-fluid pointer" alt="Responsive image" onclick="home()">
        </div>

        <!--Page name-->
        <div class="col-10" style="display:flex;align-items: center; flex-wrap: wrap;"> 

          <!--Button to hide menu-->
          <button type="button" class="btn btn-menu p-0 mr-4" id="menubtn" onclick="menuHide()">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-menu-button-wide-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
            <path fill-rule="evenodd" d="M5 15V4H4v11h1zM.5 4h15V3H.5v1zM13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
          </svg>
          </button>

          <!--actual page name-->                  
          <div class="text-black" id="PageTitle">Welkom!</div>

          <!--Button to open account interface-->
          <button type="button" class="btn btn-addUser p-0 mr-2 ml-auto" id="list-Gebruiker-list" data-toggle="list" href="#list-Gebruiker" role="tab" aria-controls="Gebruiker" onclick="openUserInterface()">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
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
        <div class="col-2 bg-dark shadow" id="menu">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action mt-2" id="list-Reserveren-list" data-toggle="list" href="#list-Reserveren" role="tab" aria-controls="Reserveren" onclick="Reservatie()">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-calendar2-plus-fill mr-2 mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zm6.5 5a.5.5 0 0 0-1 0V10H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V11H10a.5.5 0 0 0 0-1H8.5V8.5z"/>
                </svg>
                Reserveren
            </a>

            <a class="list-group-item list-group-item-action" id="list-Reservaties-list" data-toggle="list" href="#list-Reservaties" role="tab" aria-controls="Reservaties" onclick="Reservaties(); fullCalendar('refetchEvents');">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-calendar2-week-fill mr-2 mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
              </svg>
              Reservaties
            </a>

            <a class="list-group-item list-group-item-action" id="list-Plekken-list" data-toggle="list" href="#list-Plekken" role="tab" aria-controls="Plekken" onclick="Plaatsen()">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-map-fill mr-2 mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
              </svg>
              Plaatsen
            </a>

            <a class="list-group-item list-group-item-action" id="list-Facturen-list" data-toggle="list" href="#list-Facturen" role="tab" aria-controls="Facturen" onclick="Facturen()">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-receipt mr-2 mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
              </svg>
              Facturen
            </a>

            <a class="list-group-item list-group-item-action" id="list-Omzet-list" data-toggle="list" href="#list-Omzet" role="tab" aria-controls="Omzet" onclick="Omzet()">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cash-stack mr-2 mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 3H1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1h-1z"/>
                <path fill-rule="evenodd" d="M15 5H1v8h14V5zM1 4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H1z"/>
                <path d="M13 5a2 2 0 0 0 2 2V5h-2zM3 5a2 2 0 0 1-2 2V5h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 13a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
              </svg>
              Omzet
            </a>

            <a class="list-group-item list-group-item-action  mb-1 pointer" onclick="launchFullScreen(document.documentElement)">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-fullscreen mr-2 mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z"/>
              </svg>
              Fullscreen
            </a>
          </div>
        </div>

        <!--Selected page-->
        <div class="col-10 pt-1" id="selectedpage">
          <div class="tab-content" id="nav-tabContent">
            <!--Different Pages-->

            <!--Reserveren page-->
            <div class="tab-pane" id="list-Reserveren" role="tabpanel" aria-labelledby="list-Reserveren-list">
              <div class="container-fluid">
              <form id="ReserverenForm">
                <div class="row mt-3">                  
                  <div class="col-5">
                    <div class="mb-5">
                      <div class="h5">Terugkomende klant</div>
                      <div class="form-group">
                        <label for="Bestaande klant" class="mr-5 mb-2">Selecteer klant gegevens</label>
                        <!-- <div class="form-inline"> -->
                          <select class="form-control form-control-sm px-auto" id="KlantenData" onchange="VulKlantenInfo()">
                            <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                            de all bestaande klanten weer te geven-->
                            <option>---Selecteer een optie---</option>
                          </select>
                          <!-- <button type="button" class="btn btn-sm btn-danger ml-2" onclick="VerwijderKlant()">Klant Verwijderen</button>
                          <div id="DeleteKlant">d</div> -->
                        <!-- </div> -->
                      </div>
                    </div>
                    <div id="ReservatieInvoeren"></div>
                    <div class="mb-5">
                      <div class="h5">Nieuwe klant</div>
                      <div class="form-group">
                        <label for="KlantNaam">Naam</label>
                        <input type="text" class="form-control form-control-sm" name="Naam" id="Naam" aria-describedby="KlantNaam" value="" placeholder="John Doe">
                      </div>
                      <div class="form-group">
                        <label for="KlantEmail">Email</label>
                        <input type="email" class="form-control form-control-sm" name="Email" id="Email"  aria-describedby="klantEmail" value="" placeholder="Example@provider.com">
                      </div>
                      <div class="form-group">
                        <label for="KlantTel">Telefoonnummer</label>
                        <input type="text" class="form-control form-control-sm" name="Telefoon" id="Telefoon" aria-describedby="KlantTel" value="" placeholder="+3112345678">
                      </div>
                    </div>

                    <div>
                      <div class="h5">Basis Informatie</div>                      
                      <div class="form-group ">
                        <label for="reservatie datum" class="">Aankomst en vertrek datums</label>
                        <input type="text" class="form-control form-control-sm" naam="Datums" id="Dates" value="" onkeydown="return false">
                      </div>

                      <div class="form-group">
                        <label for="VeldFormaat">Formaat</label>
                        <select class="form-control form-control-sm" name="VeldFormaat" id="VeldFormaat">
                          <option value="GROOT">Groot</option>
                          <option value="KLEIN">Klein</option>
                        </select>
                      </div>
                      <a type="button" class="btn btn-sm btn-dark" onclick="PlekkenBeschikbaar()">Beschikbaarheid controleren</a>                   
                    </div>
                  </div>
                  <div class="col-4">
                    <div id="Details">
                      <div class="h5">Details</div>
                      <div class="form-group">
                        <label for="PlekNummer">Plaatsnummer</label>
                        <select class="form-control form-control-sm" id="BeschikbarePlekken" name="BeschikbarePlekken">
                          <!--PHP code here-->
                          <option>---Selecteer een optie---</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="Auto">Met de auto</label>
                        <select class="form-control form-control-sm" name="Auto" id="Auto">
                          <option value="Ja">Ja</option>
                          <option value="Nee">Nee</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="SoortVerblijf">Soort verblijf</label>
                        <select class="form-control form-control-sm" name="SoortVerblijf" id="SoortVerblijf">
                          <option value="Caravan">Caravan/Camper</option>
                          <option value="Tent">Tent</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="Electriciteit" >Electriciteit</label>
                        <select class="form-control form-control-sm" name="Electriciteit" id="Electriciteit">
                          <option value="Ja">Ja</option>
                          <option value="Nee">Nee</option>
                        </select>
                        <small class="form-text text-muted">Bij een klein veld is Electriciteit niet mogelijk</small>
                      </div>
                      <div class="form-group">
                        <label for="GratisDouche">Extra douchemuntjes</label>
                        <input type="number" class="form-control form-control-sm" value="" naam="ExtraDoucheMuntjes" id="ExtraDoucheMuntjes" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="AantalVolwassenen">Aantal volwassenen</label>
                        <input type="number" class="form-control form-control-sm" value="" name="Volwassenen" id="Volwassenen" placeholder="1">
                      </div>
                      <div class="form-group">
                        <label for="AantalKindTot4">Aantal kinderen (tot 4 jaar)</label>
                        <input type="number" class="form-control form-control-sm" value="" name="KinderenTot4" id="KinderenTot4" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="AantalKindTot12">Aantal kinderen (tussen 4 - 12 jaar)</label>
                        <input type="number" class="form-control form-control-sm" value="" name="KinderenTot12" id="KinderenTot12" placeholder="0">
                      </div>
                      <div class="form-group">
                        <label for="Huisdier">Huisdier</label>
                        <select class="form-control form-control-sm" name="Huisdier" id="Huisdier">
                          <option value="Ja">Ja</option>
                          <option value="Nee">Nee</option>
                        </select>
                      </div>
                      <button type="button" class="btn btn-sm btn-success" onclick="MaakReservatie()">Reservatie invoeren</button>
                    </div>
                  </div>
                  
                  
                  <!--Tarievenlijst-->
                  <div class="col-3">
                    <div class="h5 pb-1">Tarievenlijst</div>
                    <div class="d-flex border rounded shadow-sm border-top-0">
                      <table class="table table-sm table-striped table-hover mb-0">
                        <thead>
                          <tr>
                            <th scope="col">Categorie</th>
                            <th scope="col">Prijs</th>
                          </tr>
                        </thead>
                        <tbody id="Tarieven">
                          <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                          de tarieven uit de database weer te geven-->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!--Reservatie Overzicht page-->
            <div class="tab-pane" id="list-Reservaties" role="tabpanel" aria-labelledby="list-Reservaties-list">
              <div class="container-fluid">
                <div class="row my-3" id="calendar"></div>
                <div class="row my-3">
                  <div class="h5 col-12">Reservatie aanpassen</div>
                </div>
                <div class="row my-3">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="Bestaande reservaties" class="mr-5 mb-2">Selecteer Reservatie</label>
                      <select class="form-control form-control-sm px-auto" id="BestaandeReservatieData" onchange="VulReservatieAanpassenData()">
                        <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                        de juiste bestaande reservaties weer te geven-->
                      </select>
                      <div class="form-inline my-2">
                        <button type="button" class="btn btn-sm btn-danger mr-2 px-3" onclick="VerwijderReservatie()">Verwijder Reservatie</button>
                        <button type="button" class="btn btn-sm btn-success mr-2 px-3" onclick="AanpassingDoorvoeren()">Aanpassingen doorvoeren</button>
                      </div> 
                      <div id="DeleteReservatie"></div>  
                      <div id="AanpassingDoorvoeren"></div>                    
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="VertrekDatum aanpassen" class="">Vertrek datum</label>
                      <input type="text" class="form-control form-control-sm" naam="AanpassenVertrekDatum" id="AanpassenVertrekDatum" value="" onkeydown="return false" onchange="CheckAanpassenPlekken()">
                    </div>
                    <div class="form-group">
                      <label for="VertrekDatum aanpassen" class="">Douchemuntjes</label>
                      <input type="number" class="form-control form-control-sm" value="" id="AanpassenDoucheMuntjes">
                    </div>
                    <div class="form-group">
                      <label for="VertrekDatum aanpassen" class="">Was beurten</label>
                      <input type="number" class="form-control form-control-sm" value="" id="AanpassenWassen">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="VertrekDatum aanpassen" class="">Plaats nummer</label>
                      <select class="form-control form-control-sm" id="AanpassenPlekNummer">
                        <option id="OrigineelPlaatsNummer">---Selecteer een optie---</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="VertrekDatum aanpassen" class="">Bezoekers</label>
                      <input type="number" class="form-control form-control-sm" value="" id="AanpassenBezoekers">
                    </div>
                    <div class="form-group">
                      <label for="VertrekDatum aanpassen" class="">Droog beurten</label>
                      <input type="number" class="form-control form-control-sm" value="" id="AanpassenDrogen">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Plekken-->
            <div class="tab-pane" id="list-Plekken" role="tabpanel" aria-labelledby="list-Plekken-list">
              <div class="container-fluid">
                <div class="row my-3">
                  <div class="col-6">
                    <div class="h5">Grote Plaatsen</div>
                    <div class="d-flex border rounded shadow-sm border-top-0">
                      <table class="table table-sm table-hover mb-0">
                        <thead>
                          <tr>
                            <th scope="col">Plaats Nummer</th>
                            <th scope="col">Plaats Status</th>
                          </tr>
                        </thead>
                        <tbody id="GrotePlaatsen">
                          <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                          de beschikbaarheid van de grote plaatsen weer te geven-->
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="h5">kleine Plaatsen</div>
                    <div class="d-flex border rounded shadow-sm border-top-0">
                      <table class="table table-sm table-hover mb-0">
                        <thead>
                          <tr>
                            <th scope="col">Plaats Nummer</th>
                            <th scope="col">Plaats Status</th>
                          </tr>
                        </thead>
                        <tbody id="KleinePlaatsen">
                          <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                          de beschikbaarheid van de kleine plaatsen weer te geven-->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Facturen-->
            <div class="tab-pane" id="list-Facturen" role="tabpanel" aria-labelledby="list-Facturen-list">
              <div class="container-fluid">
                <div class="row my-3">
                  <div class="col-3"></div>
                  <div class="col-6">
                    <div class="d-flex border rounded shadow-sm border-top-0 mx-auto">
                      <table class="table table-sm table-striped table-hover mb-0">
                        <thead>
                          <tr>
                            <th scope="col">Reservatie Nummer</th>
                            <th scope="col">Aankomst Datum</th>
                            <th scope="col">Vertrek Datum</th>
                            <th scope="col">Aantal Nachten</th>
                            <th scope="col">Factuur</th>
                          </tr>
                        </thead>
                        <tbody id="Facturen">
                          <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                          de nodige Facturen weer te geven-->
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-3"></div>
                </div>
              </div>
            </div>

            <!--Omzet-->
            <div class="tab-pane" id="list-Omzet" role="tabpanel" aria-labelledby="list-Omzet-list">
              <div class="container-fluid">
                <div class="row my-4">
                  <div id="OmzetPrint" class="ml-3 bg-success border border-success rounded p-3 text-white shadow"></div>
                </div>
              </div>
            </div>

            <!--Nieuwe Gebruiker Registreren-->
            <div class="tab-pane" id="list-Gebruiker" role="tabpanel" aria-labelledby="list-Gebruiker-list">
              <div class="container-fluid">
                <div class="row my-3">
                  <div class="col-5"></div>
                  <div class="col-2">
                    <button class="btn btn-success" data-toggle='modal' data-target='#ToevoegenModal'>Nieuwe Account Registreren</button>
                  </div>
                  <div class="col-5"></div>
                </div>
                <div class="row my-3" >
                  <div class="col-2"></div>
                  <div class="col-8">
                    <table class="table table-sm table-striped table-hover border rounded shadow-sm">
                      <thead>
                        <tr>
                          <th scope="col">Gebruikersnaam</th>
                          <th scope="col">Wachtwoord</th>
                          <th scope="col">Eigenaar rechten</th>
                          <th scope="col">Aanpassen</th>
                        </tr>
                      </thead>
                      <tbody id="GebruikerAccounts">
                        <!--Er word een AJAX request gemaakt in CustomFunctions.js om 
                        de bestaande accounts uit de database weer te geven-->
                      </tbody>
                    </table>
                  </div>
                  <div class="col-2"></div>

                  <div class="modal fade" id="AanpassenModal" tabindex="-1" role="dialog" aria-labelledby="Aanpassen/verwijderenModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Acccount aanpassen/verwijderen</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" id="FillAccountForm">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
                          <button type="button" class="btn btn-danger">Account verwijderen</button>     
                          <button type="button" class="btn btn-primary">Aanpassingen doorvoeren</button>                                            
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="ToevoegenModal" tabindex="-1" role="dialog" aria-labelledby="ToevoegenModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Acccount aanpassen/verwijderen</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" id="FillAccountForm">
                          <form>
                            <div class="form-group">
                              <label for="Username">Gebruikersnaam</label>
                              <input type="text" class="form-control form-control-sm" id="Gebruikersnaam" aria-describedby="Gebruikersnaam" value="">
                            </div>
                            <div class="form-group">
                              <label for="Password">Wachtwoord</label>
                              <input type="password" class="form-control form-control-sm" id="Wachtwoord" aria-describedby="Wachtwoord" value="">
                            </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="AdminCheckBox">
                              <label class="form-check-label" for="exampleCheck1">Admin</label>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>  
                          <button type="button" class="btn btn-success">Account toevoegen</button>                                            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>