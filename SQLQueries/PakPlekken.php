<?php
include '../Connection.php';
$aankomst = $_GET['aankomst'];
$vertrek = $_GET['vertrek'];
$formaat = $_GET['formaat'];

echo $aankomst."|".$vertrek."|".$formaat;
?>