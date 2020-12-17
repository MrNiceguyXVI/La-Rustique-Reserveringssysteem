function logIn(){
  var Gebruikersnaam = document.getElementById('GebruikersnaamInlog').value;
  var Wachtwoord = document.getElementById('WachtwoordInlog').value;

  if(Gebruikersnaam == '' || Wachtwoord == ''){
    alert("Niet alle velden zijn ingevoerd!");
  } else {
    alert("De inloggegevens worden gecontroleerd");
    var InloggenRequest = new XMLHttpRequest();                               //Http Request to open GebruikerToevoegen.php
    InloggenRequest.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById('logInDiv').innerHTML = this.responseText;
      }
    };
    InloggenRequest.open("GET", "SQLQueries/LogIn.php?Gebruikersnaam="+encodeURIComponent(Gebruikersnaam)+"&Wachtwoord="+encodeURIComponent(Wachtwoord), true);
    InloggenRequest.send();
  }
}

//For alerting the user while within php that the input username or password was incorrect
function UserNonExistent(){
  alert("Wachtwoord of Gebruikersnaam zijn onjuist");
}

//For redirecting the user while within php to the menu
function RedirectMenu(){
  location.href = "http://localhost/La-Rustique-Reserveringssysteem/Menu.php";
}