<?php
include '../Connection.php';

$PakAccountsQuery = "SELECT * FROM Accounts";
$PakAccountsResult = mysqli_query($con, $PakAccountsQuery);

while($PakAccountsRow = mysqli_fetch_array($PakAccountsResult)){
  echo "
      <tr>
        <td>".$PakAccountsRow['ANaam']."</td>
        <td>".$PakAccountsRow['AWachtwoord']."</td>
        <td>".$PakAccountsRow['AAdmin']."</td>
        <td><button type='button' class='btn btn-sm btn-success' data-toggle='modal' data-target='#AanpassenModal' onclick='GetAccountInfo(".$PakAccountsRow['AccountNr'].")'>Aanpassen</button></td>
      </tr>
    ";
}
?>