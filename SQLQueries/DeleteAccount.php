<?php
include '../Connection.php';
$AccountNr = urldecode($_GET['AccountNr']);

$DeleteAccountQuery = "DELETE FROM accounts WHERE AccountNr = '$AccountNr'";
$DeleteAccountResult = mysqli_query($con, $DeleteAccountQuery);
?>