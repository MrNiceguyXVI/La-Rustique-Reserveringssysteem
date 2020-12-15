<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 

//fetching all the needed data that was passed through th URL
$ReservatieNr = urldecode($_GET['ReservatieNr']);
$VertrekDatum = urldecode($_GET['AangepastVertrekDatum']);
$PlaatsNr = urldecode($_GET['AangepastPlaatsNr']);
$DoucheMuntjes = urldecode($_GET['AangepastDoucheMuntjes']);
$Bezoekers = urldecode($_GET['AangepastBezoekers']);
$WasBeurten = urldecode($_GET['AangepastWasBeurten']);
$DroogBeurten = urldecode($_GET['AangepastDroogBeurten']);

//for testing if all the data passes through
echo $VertrekDatum."|".$PlaatsNr."|".$DoucheMuntjes."|".$Bezoekers."|".$WasBeurten."|".$DroogBeurten."|".$ReservatieNr;


/* TO DO LIST
* Add checks for douchemuntjes, Bezoekers, Was Beurten and Droog Beurten respectively to check: if the entered value is 0 it should delete the that row from reservatie_regels if it exists, if not then do nothing.
* if that entered value is above 0, update the row in reservatie_regels if it already exists for that category and insert a row if it does not.
*
* add another check: if the entered leave date is the same as it was, just change the spot number if it is any different from what it was.
* if the leave date is different check the following:
* check it's not before the arrival date, and that it's not after the current date either; this is not allowed
* check if there exists any record containing the entered spot number that is between the arrivald date and given leave date, and it must ignore records with the reservation id that is passed along;
* if there exists a record it means theres already a reservation in between those dates on the entered spot, and it must alert the user and discontinue any data altering/entering/deleting
*
*/
?>