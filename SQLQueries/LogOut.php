<?php
  //Starts the session so it can be destroyed, then redirects to the log in page
  echo "<style onload='RedirectlogIn();'></style>";
  session_start();
  session_destroy();  
?>