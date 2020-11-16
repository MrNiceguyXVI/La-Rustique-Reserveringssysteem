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
          <img src="Img/Placeholder.png" class="img-fluid" alt="Responsive image">
        </div>

        <!--Page name-->
        <div class="col-10" style="display:flex;align-items: center; flex-wrap: wrap;">          
          <div class="text-black" id="PageTitle">Welkom!</div>
        </div>
      </div>

      <!--Menu and Selected page-->
      <div class="row justify-content-center" style="height:94vh">
        <!--Menu-->
        <div class="col-2 bg-dark">
        <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active bg-dark border-0 text-white" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
        </div>

        <!--Selected page-->
        <div class="col-10 p-0">        
          <!--<div class="embed-responsive">
            <iframe class="embed-responsive-item" src=""></iframe>
          </div>-->
          <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
        </div>
      </div>
      <!--I'll add my classes to bootstrap's javascript document-->
    </div>
  </body>
</html>