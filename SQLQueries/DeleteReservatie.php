<?php
include '../Connection.php';
$ReservatieNr = urldecode($_GET['ReservatieNr']);

//I have set an on cascade setting in the database, which makes it so all the records with this id as their foreign id's get deleted as well
$DeleteReservatieQuery = "DELETE FROM reservaties WHERE ReservatieNr = '$ReservatieNr'";
$DeleteReservatieResult = mysqli_query($con, $DeleteReservatieQuery);
?>