<?php
include '../Connection.php';
echo "<option>---Selecteer een optie---</option>";
$sqlQuery = "SELECT KNaam, KTel, KEmail FROM klanten";
$result = mysqli_query($con, $sqlQuery);
while($row = mysqli_fetch_array($result))
{
  echo '
  <option value="'.$row["KNaam"].'|'.$row["KEmail"].'|'.$row["KTel"].'">'.$row["KNaam"].', '.$row["KEmail"].', '.$row["KTel"].'</option>';
}
?>