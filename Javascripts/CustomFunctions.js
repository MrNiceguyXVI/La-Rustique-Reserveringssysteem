function home(){
  window.location.href = "http://localhost/La-Rustique-Reserveringssysteem/Menu.php";
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

//function to display the accurate form info for the choses user
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

function logOut(){
  //To be added
}

//Function that happens when the Reservation section is loaded
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
  
}

//function to fill the 'already existing' customer selection with the existing customers
function BestaandeKlanten(){
  var KlantenDataRequest = new XMLHttpRequest();                            //Http Request to get all the existing customers into the specified element
    KlantenDataRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('KlantenData').innerHTML = this.responseText;
      }
    };
    KlantenDataRequest.open("GET", "SQLQueries/KlantenData.php", true);
    KlantenDataRequest.send();
}

//Function that happens when the Spots section is loaded
function Plaatsen(){
  document.getElementById("PageTitle").innerHTML = "Plaatsen overzicht ";  //Changes the page title

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

//Function that happens when the invoice section is loaded
function Facturen(){
  document.getElementById("PageTitle").innerHTML = "Facturen";              //Changes the page title

  var FacturenRequest = new XMLHttpRequest();                               //Http Request to get all invoices into the specified element
  FacturenRequest.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      document.getElementById('Facturen').innerHTML = this.responseText;
    }
  };
  FacturenRequest.open("POST", "SQLQueries/Facturen.php", true);
  FacturenRequest.send();
}

//var to collect all error codes
var ErrorMessage = "Reservatie geannuleerd door fouten:\n";

//function to activate PakPlekken.php
function PlekkenBeschikbaar(){
  var combidatum = document.getElementById('Dates').value.split("/");
  var aankomstdatum = combidatum[0];
  var vertrekdatum = combidatum[1];
  var plekformaat = document.getElementById('VeldFormaat').value;

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
        document.getElementById('BeschikbarePlekken').innerHTML = this.responseText;
      }
    };
    
    //Use the ampersand & to glue variables together, and encoding the data
    PlekkenRequest.open("GET", "SQLQueries/PakPlekken.php?aankomst="+encodeURI(aankomstdatum)+"&vertrek="+encodeURI(vertrekdatum)+"&formaat="+encodeURI(plekformaat), true);
    PlekkenRequest.send();
  }
}

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

  //call Plekken Beschikbaar Function to refresh the already existing customer selector
  PlekkenBeschikbaar();
  PlekkenBeschikbaar();

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

    //Refreshes the customer selector
    BestaandeKlanten();
    BestaandeKlanten();
    
    //document.getElementById('Dates').value = null;
  } else{
    alert(ErrorMessage);
    ErrorMessage = "Reservatie geannuleerd door fouten:\n"; //clears the error messages so they don't appear twice in the same alert
  }
}

function VulKlantenInfo(){
  var KDataArray = document.getElementById('KlantenData').value.split("|");
  var Naam = document.getElementById('Naam').value = KDataArray[0];
  var Email = document.getElementById('Email').value = KDataArray[1];
  var Telefoon = document.getElementById('Telefoon').value = KDataArray[2];
}

//Function that happens when the Revenue section is loaded
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
  document.getElementById("PageTitle").innerHTML = "Omzet van " + m;        //Changes the page title
}

//Function that happens when the User registration section is loaded
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