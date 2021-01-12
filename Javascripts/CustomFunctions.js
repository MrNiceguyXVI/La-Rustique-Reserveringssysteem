function home(){
  window.location.href = "http://localhost/La-Rustique-Reserveringssysteem/Menu.php";
}

//For redirecting the user while within php to the log in screen
function RedirectlogIn(){
  location.href = "http://localhost/La-Rustique-Reserveringssysteem/loginScreen.php";
}

//opens LogOut.php inside of the div with the id 'LogOut'
function logOut(){
  var LogOutRequest = new XMLHttpRequest();                               
  LogOutRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('LogOut').innerHTML = this.responseText;
    }
  };
  LogOutRequest.open("GET", "SQLQueries/LogOut.php", true);
  LogOutRequest.send();
}

//Function used to hide the menu
function menuHide(){
  document.getElementById('menu').classList.toggle("collapse");         //toggles the collapse class to make the menu disappear and re-appear  
  document.getElementById('selectedpage').classList.toggle("col-12");   //toggles the col-12 class to make sure all the space is being used
}

//function to display all users from the database
function openUserInterface(){  
  document.getElementById("PageTitle").innerHTML = "Overzicht accounts";
  var GebruikerAccounts = new XMLHttpRequest();                               //Http Request to open GebruikerAccounts.php
  GebruikerAccounts.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('GebruikerAccounts').innerHTML = this.responseText;
    }
  };
  GebruikerAccounts.open("GET", "SQLQueries/GebruikerAccounts.php", true);
  GebruikerAccounts.send();
}

//function to display the accurate form info for the chosen user
function GetAccountInfo(AccountNr){
  var FillAccountInfo = new XMLHttpRequest();                               //Http Request to open FillAccountInfo.php
  FillAccountInfo.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('FillAccountForm').innerHTML = this.responseText;
    }
  };
  FillAccountInfo.open("GET", "SQLQueries/FillAccountInfo.php?AccountNr="+encodeURIComponent(AccountNr), true);
  FillAccountInfo.send();
}

//function to call GebruikerToevoegen.php
function GebruikerAccountToevoegen(){
  var Gebruikersnaam = document.getElementById('GebruikersnaamToevoegen').value;
  var Wachtwoord = document.getElementById('WachtwoordToevoegen').value;
  var WachtwoordOpnieuw = document.getElementById('WachtwoordOpnieuwToevoegen').value;
  var Admin = document.getElementById('AdminCheckBox').checked;

  if(Gebruikersnaam == '' || Wachtwoord == '' || WachtwoordOpnieuw == ''){
    alert("Niet alle velden zijn ingevoerd");
  } else if(Wachtwoord != WachtwoordOpnieuw){
    alert("Wachtwoorden komen niet overeen");
  } else {
    var AccountToevoegenRequest = new XMLHttpRequest();                               //Http Request to open GebruikerToevoegen.php
    AccountToevoegenRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('AccountToevoegen').innerHTML = this.responseText;
      }
    };
    AccountToevoegenRequest.open("GET", "SQLQueries/GebruikerToevoegen.php?gebruikersnaam="+encodeURIComponent(Gebruikersnaam)+"&wachtwoord="+encodeURIComponent(Wachtwoord)+"&admin="+encodeURIComponent(Admin), true);
    AccountToevoegenRequest.send();
  }
}

//opens AccountAanpassen.php inside of the div with the id 'DeleteAccount'
function AccountAanpassen() {
  var Gebruikersnaam = document.getElementById('GebruikersnaamAanpassen').value;
  var Wachtwoord = document.getElementById('WachtwoordAanpassen').value;
  var Admin = document.getElementById('AdminCheckBoxAanpassen').checked;
  var AccountNr = document.getElementById('AccountIdAanpassen').value;

  if(Gebruikersnaam == '' || Wachtwoord == '' || AccountNr == ''){
    alert("Aanpassen geannuleerd door fouten:\nNiet alle velden zijn ingevuld\n");
  }else{
    var AccountAanpassenRequest = new XMLHttpRequest();                            
    AccountAanpassenRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('DeleteAccount').innerHTML = this.responseText;
      }
    };
    AccountAanpassenRequest.open("GET", "SQLQueries/AccountAanpassen.php?AccountNr="+encodeURIComponent(AccountNr)+
    "&Gebruikersnaam="+encodeURIComponent(Gebruikersnaam)+
    "&Wachtwoord="+encodeURIComponent(Wachtwoord)+
    "&Admin="+encodeURIComponent(Admin), true);
    AccountAanpassenRequest.send();
  }  
}

//opens DeleteAccount.php inside of the div with the id 'DeleteAccount'
function AccountVerwijderen(){
  var Averwijderen = confirm("Weet je zeker dat je dit account wilt verwijderen?\nDruk op OK om de reservatie te verwijderen");
  if(Averwijderen == true){
    var Message = "Reservatie wordt verwijderd";
    var AccountId = document.getElementById('AccountIdAanpassen').value;

    var AccountVerwijderRequest = new XMLHttpRequest();                            //Http Request to delete the customer via php
    AccountVerwijderRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('DeleteAccount').innerHTML = this.responseText;
      }
    };
    AccountVerwijderRequest.open("GET", "SQLQueries/DeleteAccount.php?AccountNr="+encodeURIComponent(AccountId)+ true);
    AccountVerwijderRequest.send();
    openUserInterface();
  }else{
    var Message = "Verwijderen geannuleerd";
  }
  alert(Message);
}

//Function that happens when the Reservation button is clicked, it fetches the existing customers and the rates via php
function Reservatie(){
  document.getElementById("PageTitle").innerHTML = "Reserveren";            //Changes the page title

  BestaandeKlanten();

  var TarievenRequest = new XMLHttpRequest();                               //Http Request to get all the Price values into the specified element
  TarievenRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('Tarieven').innerHTML = this.responseText;
    }
  };
  TarievenRequest.open("GET", "SQLQueries/Tarieven.php", true);
  TarievenRequest.send();
}

//Function that happens when the Reservation overview section is loaded
function Reservaties(){
  document.getElementById("PageTitle").innerHTML = "Reservaties overzicht ";//Changes the page title
  BestaandeReservaties();
}

//function to get all the existing reservation into the specified element
function BestaandeReservaties(){
  var ReservatieDataRequest = new XMLHttpRequest(); 
  ReservatieDataRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('BestaandeReservatieData').innerHTML = this.responseText;
    }
  };
  ReservatieDataRequest.open("GET", "SQLQueries/ReservatieData.php", true);
  ReservatieDataRequest.send();
}

//function to fill the 'already existing' customer selection with the existing customers
function BestaandeKlanten(){
  var KlantenDataRequest = new XMLHttpRequest();                           
    KlantenDataRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('KlantenData').innerHTML = this.responseText;
      }
    };
    KlantenDataRequest.open("GET", "SQLQueries/KlantenData.php", true);
    KlantenDataRequest.send();
}

//Function that happens when the Spots menu button is clicked, to load the spots page
function Plaatsen(){
  document.getElementById("PageTitle").innerHTML = "Plaatsen overzicht ";  

  var GrotePlaatsenRequest = new XMLHttpRequest();                          //Http Request to get all Large spot info into the specified element
  GrotePlaatsenRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('GrotePlaatsen').innerHTML = this.responseText;
    }
  };
  GrotePlaatsenRequest.open("GET", "SQLQueries/GrotePlaatsen.php", true);
  GrotePlaatsenRequest.send();
  
  var KleinePlaatsenRequest = new XMLHttpRequest();                         //Http Request to get all small spot info into the specified element
  KleinePlaatsenRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('KleinePlaatsen').innerHTML = this.responseText;
    }
  };
  KleinePlaatsenRequest.open("GET", "SQLQueries/KleinePlaatsen.php", true);
  KleinePlaatsenRequest.send();
}

//Function that happens when the invoice menu button is clicked, loads the Invoice page
function Facturen(){
  document.getElementById("PageTitle").innerHTML = "Facturen";              

  var FacturenRequest = new XMLHttpRequest();                               //Http Request to get all invoices into the specified element
  FacturenRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('Facturen').innerHTML = this.responseText;
    }
  };
  FacturenRequest.open("POST", "SQLQueries/Facturen.php", true);
  FacturenRequest.send();
}

//var to collect all error codes for making a reservation
var ErrorMessage = "Reservatie geannuleerd door fouten:\n";

//function to fetch al free spots for the entered arrival and departure date, and chosen spot size
function ReservatiePlekkenCheck(aankomstdatum, vertrekdatum, plekformaat, ElementId, Aanpassen){
  //checking if dates are entered, and if they're not it cancels the operation and gives an alert
  if(aankomstdatum == "" && vertrekdatum == undefined){
    ErrorMessage+="Aankomst en Vertrek datums niet ingevoerd\n";
    alert(ErrorMessage);
    ErrorMessage = "Reservatie geannuleerd door fouten:\n";
  } else if(vertrekdatum == undefined) {
    ErrorMessage+="Vertrek datum niet ingevoerd\n";
    alert(ErrorMessage);
    ErrorMessage = "Reservatie geannuleerd door fouten:\n";
  } else {
    var PlekkenRequest = new XMLHttpRequest();                               
    PlekkenRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById(ElementId).innerHTML = this.responseText;
      }
    };
    //Use the ampersand & to glue variables together, and encoding the data
    PlekkenRequest.open("GET", "SQLQueries/PakPlekken.php?aankomst="+encodeURI(aankomstdatum)+"&vertrek="+encodeURI(vertrekdatum)+"&formaat="+encodeURI(plekformaat)+"&pleknr="+encodeURI(Aanpassen), true);
    PlekkenRequest.send();
  }
}

//this function calls the Spot checker function for use on the reservation creation page
function PlekkenBeschikbaar(aankomstdatum, vertrekdatum, plekformaat){
  var combidatum = document.getElementById('Dates').value.split("/");
  var aankomstdatum = combidatum[0];
  var vertrekdatum = combidatum[1];
  var plekformaat = document.getElementById('VeldFormaat').value;

  ReservatiePlekkenCheck(aankomstdatum, vertrekdatum, plekformaat, "BeschikbarePlekken", 0); 
}

//Function to fetch and process all the entered relevant data needed for inserting a reservation
function MaakReservatie(){
  //fetching all the entered data from the form
  var CombiDatum = document.getElementById('Dates').value.split("/");
  var AankomstDatum = CombiDatum[0];
  var VertrekDatum = CombiDatum[1];
  var PlekFormaat = document.getElementById('VeldFormaat').value;
  var Naam = document.getElementById('Naam').value;
  var Email = document.getElementById('Email').value;
  var Telefoon = document.getElementById('Telefoon').value;
  var Plek = document.getElementById('BeschikbarePlekken').value;
  var Auto = document.getElementById('Auto').value;
  var SoortVerblijf = document.getElementById('SoortVerblijf').value;
  var Electriciteit = document.getElementById('Electriciteit').value;
  var ExtraDoucheMuntjes = document.getElementById('ExtraDoucheMuntjes').value;
  var Volwassenen = document.getElementById('Volwassenen').value;
  var KinderenTot4 = document.getElementById('KinderenTot4').value;
  var KinderenTot12 = document.getElementById('KinderenTot12').value;  
  var Huisdier = document.getElementById('Huisdier').value; 

  //small spots don't offer electricity, so it's programmed to set it to no if the spot size is small
  if(PlekFormaat == "'KLEIN'")
  {
    Electriciteit = "Nee";
  } else
  {
    var Electriciteit = document.getElementById('Electriciteit').value;
  }

  //input check for customer data
  if(Naam == "")
  {
    ErrorMessage+="Naam niet ingevoerd\n";
  }
  if(Email == "")
  {
    ErrorMessage+="Email niet ingevoerd\n";
  }

  //checks if the email has the right format for email adresses
  if(/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/.test(Email) == false)    
  {
    ErrorMessage+="Email is niet het juiste formaat\n";
  }
  if(Telefoon == "")
  {
    ErrorMessage+="Telefoonnummer niet ingevoerd\n";
  }
  //checks if the phone number is the right format for typical dutch phone numbers
  if(/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/.test(Telefoon) == false)
  {
    ErrorMessage+="Telefoonnummer is niet het juiste formaat\n";
  }

  //Inputs error message for given dates
  if(AankomstDatum == "" && VertrekDatum == undefined)
  {
    ErrorMessage+="Aankomst en Vertrek datums niet ingevoerd\n";
  } else if(VertrekDatum == undefined) 
  {
    ErrorMessage+="Vertrek datum niet ingevoerd\n";
  }

  //check for remaining details
  if(Plek == "")
  {
    ErrorMessage+="Pleknummer niet ingevoerd\n";
  }
  if(Volwassenen == "")
  {
    ErrorMessage+="Aantal volwassenen niet ingevoerd\n";
  }
  
  //this code makes sure the variables are set to zero if the standard 0 value has been deleted from the input field
  if(ExtraDoucheMuntjes == "")
  {
    ExtraDoucheMuntjes = 0;
  }
  if(KinderenTot4 == "")
  {
    KinderenTot4 = 0;
  }
  if(KinderenTot12 == "")
  {
    KinderenTot12 = 0;
  }

  //call bestaande klanten Function to refresh the already existing customer selector
  BestaandeKlanten();
  BestaandeKlanten();

  /*checks if there are any error messages. 
  *If there are, it'll send an alert with the messages and it'll cancel the AJAX request 
  */
  if (ErrorMessage == "Reservatie geannuleerd door fouten:\n") 
  {
    //creating the url in advance
    var url = "SQLQueries/MaakReservatie.php?aankomst="+
    AankomstDatum+
    "&vertrek="+encodeURIComponent(VertrekDatum)+
    "&formaat="+encodeURIComponent(PlekFormaat)+
    "&naam="+encodeURIComponent(Naam)+
    "&email="+encodeURIComponent(Email)+
    "&telefoon="+encodeURIComponent(Telefoon)+
    "&plek="+encodeURIComponent(Plek)+
    "&auto="+encodeURIComponent(Auto)+
    "&soortverblijf="+encodeURIComponent(SoortVerblijf)+
    "&electriciteit="+encodeURIComponent(Electriciteit)+
    "&extradouchemuntjes="+encodeURIComponent(ExtraDoucheMuntjes)+
    "&volwassenen="+encodeURIComponent(Volwassenen)+
    "&kinderentot4="+encodeURIComponent(KinderenTot4)+
    "&kinderentot12="+encodeURIComponent(KinderenTot12)+
    "&huisdier="+encodeURIComponent(Huisdier);

    var ReservatieRequest = new XMLHttpRequest();                               
    ReservatieRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('ReservatieInvoeren').innerHTML = this.responseText;
      }
    };
    
    //Use the ampersand & to glue variables together, and encoding the data
    ReservatieRequest.open("GET", url, true);
    ReservatieRequest.send();

    //For notifying the user that the reservation has been inserted
    alert("Reservatie ingevoerd!");

    //For emptying/resetting the form fields
    document.getElementById('BeschikbarePlekken').value = null;
    document.getElementById('Dates').value = null;
    document.getElementById('VeldFormaat').value = "GROOT";
    document.getElementById('Naam').value = null;
    document.getElementById('Email').value = null;
    document.getElementById('Telefoon').value = null;
    document.getElementById('Auto').value = "Ja";
    document.getElementById('SoortVerblijf').value = "Caravan";
    document.getElementById('Electriciteit').value = "Ja";
    document.getElementById('ExtraDoucheMuntjes').value = null;
    document.getElementById('Volwassenen').value = null;
    vdocument.getElementById('KinderenTot4').value = null;
    document.getElementById('KinderenTot12').value = null;  
    document.getElementById('Huisdier').value = "Ja"; 
  } else{
    alert(ErrorMessage);
    ErrorMessage = "Reservatie geannuleerd door fouten:\n"; //clears the error messages so they don't appear twice in the same alert
  }
}

//function to fill input fields with relevant customer data, for auto entering certain values
function VulKlantenInfo(){
  var KDataArray = document.getElementById('KlantenData').value.split("|");
  var Naam = document.getElementById('Naam').value = KDataArray[0];
  var Email = document.getElementById('Email').value = KDataArray[1];
  var Telefoon = document.getElementById('Telefoon').value = KDataArray[2];
}

//function to fill input fields with relevant reservation data, for auto entering certain values
function VulReservatieAanpassenData(){
  var RDataArray = document.getElementById('BestaandeReservatieData').value.split("|");
  var VertrekDatum = document.getElementById('AanpassenVertrekDatum').value = RDataArray[0];
  var PlaatsNr = document.getElementById('OrigineelPlaatsNummer').value = placeholder = RDataArray[1];
  var PlaatsNr = document.getElementById('OrigineelPlaatsNummer').innerHTML = placeholder = RDataArray[1];

  var DoucheMuntjes = document.getElementById('AanpassenDoucheMuntjes');
  var Bezoekers = document.getElementById('AanpassenBezoekers');
  var WasBeurten = document.getElementById('AanpassenWassen');
  var DroogBeurten = document.getElementById('AanpassenDrogen');

  //if there are showercoins already added to the reservation it finds them and enters them into the input, and if not it'll enter 0
  if(RDataArray[2] == ''){
    DoucheMuntjes.value = 0;
  } else {
    DoucheMuntjes.value = RDataArray[2];
  }

  //if there are visitors already added to the reservation it finds them and enters them into the input, and if not it'll enter 0 
  if(RDataArray[3] == ''){
    Bezoekers.value = 0;
  } else {
    Bezoekers.value = RDataArray[3];
  }

  //if there are cleaning cycles already added to the reservation it finds them and enters them into the input, and if not it'll enter 0 
  if(RDataArray[4] == ''){
    WasBeurten.value = 0;
  } else {
    WasBeurten.value = RDataArray[4];
  }

  //if there are drying cycles already added to the reservation it finds them and enters them into the input, and if not it'll enter 0 
  if(RDataArray[5] == ''){
    DroogBeurten.value = 0;
  } else {
    DroogBeurten.value = RDataArray[5];
  }

  if(vertrekdatum != '' && PlaatsNr != '' && DoucheMuntjes != '' && Bezoekers != '' && WasBeurten != '' && DroogBeurten != ''){
    CheckAanpassenPlekken();
  }
}

//function used for deleting the selected reservation
function VerwijderReservatie() {
  var verwijderen = confirm("Weet je zeker dat je deze reservatie wilt verwijderen?\nDruk op OK om de reservatie te verwijderen");
  if(verwijderen == true){
    var Message = "Reservatie wordt verwijderd";
    var RDataArray = document.getElementById('BestaandeReservatieData').value.split("|");
    var ReservatieNr = RDataArray[6];

    var ReservatieVerwijderRequest = new XMLHttpRequest();                            //Http Request to delete the customer via php
    ReservatieVerwijderRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('DeleteReservatie').innerHTML = this.responseText;
      }
    };
    ReservatieVerwijderRequest.open("GET", "SQLQueries/DeleteReservatie.php?ReservatieNr="+encodeURIComponent(ReservatieNr)+ true);
    ReservatieVerwijderRequest.send();
    BestaandeReservaties();
  }else{
    var Message = "Verwijderen geannuleerd";
  }
  alert(Message);
  BestaandeReservaties();
}

//Function that fetches the entered spot data anc checks what spots are free when updating a reservation
function CheckAanpassenPlekken(){
  var RDataArray = document.getElementById('BestaandeReservatieData').value.split("|");
  var Aankomst = RDataArray[7]; 
  var Vertrek = document.getElementById('AanpassenVertrekDatum').value;
  var PlekFormaat = RDataArray[8];
  var PlekNr = RDataArray[1];
  ReservatiePlekkenCheck(Aankomst, Vertrek, PlekFormaat, "AanpassenPlekNummer", PlekNr); 
}

//Function for updating the relevant reservation en potentially adding or removing reservation_lines from reservatie_regels
function AanpassingDoorvoeren(){
  var RDataArray = document.getElementById('BestaandeReservatieData').value.split("|");
  var ReservatieNr = RDataArray[6];
  var Aankomst = RDataArray[7];
  var AangepastVertrekDatum = document.getElementById('AanpassenVertrekDatum').value;
  var AangepastPlaatsNr = document.getElementById('AanpassenPlekNummer').value;
  var AangepastDoucheMuntjes = document.getElementById('AanpassenDoucheMuntjes').value;
  var AangepastBezoekers = document.getElementById('AanpassenBezoekers').value;
  var AangepastWasBeurten = document.getElementById('AanpassenWassen').value;
  var AangepastDroogBeurten = document.getElementById('AanpassenDrogen').value;

  if(AangepastDoucheMuntjes == '' || AangepastBezoekers == '' || AangepastWasBeurten == '' ||AangepastDroogBeurten == ''){
    alert("Aanpassen geannuleerd door fouten:\nNiet alle velden zijn ingevuld\n");
  }else{
    if(AangepastVertrekDatum == ''){
      alert("Aanpassen geannuleerd door fouten:\nGeen VertrekDatum ingevoerd\n");
    }else {
      var AanpassingDoorvoerenRequest = new XMLHttpRequest();                            //Http Request to delete the customer via php
      AanpassingDoorvoerenRequest.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
          document.getElementById('AanpassingDoorvoeren').innerHTML = this.responseText;
        }
      };
      AanpassingDoorvoerenRequest.open("GET", "SQLQueries/AanpassingenDoorvoeren.php?ReservatieNr="+encodeURIComponent(ReservatieNr)+
      "&AangepastVertrekDatum="+encodeURIComponent(AangepastVertrekDatum)+
      "&AankomstDatum="+encodeURIComponent(Aankomst)+
      "&AangepastPlaatsNr="+encodeURIComponent(AangepastPlaatsNr)+
      "&AangepastDoucheMuntjes="+encodeURIComponent(AangepastDoucheMuntjes)+
      "&AangepastBezoekers="+encodeURIComponent(AangepastBezoekers)+
      "&AangepastWasBeurten="+encodeURIComponent(AangepastWasBeurten)+
      "&AangepastDroogBeurten="+encodeURIComponent(AangepastDroogBeurten), true);
      AanpassingDoorvoerenRequest.send();
      if(1 == 1){
        BestaandeReservaties();
        BestaandeReservaties();
      }
    }
  }
}

//Function to calculate the revenue made for this current month
function Omzet(){
  var d =  new Date();  
  var month =  new Array();
  month[0] = "Januari";
  month[1] = "Februari";
  month[2] = "Maart";
  month[3] = "April";
  month[4] = "Mei";
  month[5] = "Juni";
  month[6] = "Juli";
  month[7] = "Augustus";
  month[8] = "September";
  month[9] = "Oktober";
  month[10] = "November";
  month[11] = "December";
  var m = month[d.getMonth()];
  document.getElementById("PageTitle").innerHTML = "Omzet van " + m;        

  var OmzetRequest = new XMLHttpRequest();
  OmzetRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('OmzetPrint').innerHTML = this.responseText;
    }
  };
  OmzetRequest.open("GET", "SQLQueries/OmzetPrint.php", true);
  OmzetRequest.send();
}

//Changes the page title when registering a new user
function titleRegistratie(){
  document.getElementById("PageTitle").innerHTML = "Gebruiker Registreren"; //Changes the page title
}

//Function opens a new tab and in that makes an HttpRequest to open CreatePDF.php and passes the reservation 
//Id through. This Id is used in CreatePDF.php to get the relevant Invoice Data and process it into a PDF
function CreatePDF(ReservatieNr){
  window.open("SQLQueries/CreatePDF.php?id="+encodeURI(ReservatieNr));
}

// Find the right method, call on correct element
function launchFullScreen(element) {
  if(element.requestFullScreen) {
    element.requestFullScreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }
}

// Launch fullscreen for browsers that support it!
launchFullScreen(document.documentElement); // the whole page