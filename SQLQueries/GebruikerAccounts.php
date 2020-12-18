<?php
include '../Connection.php';

$PakAccountsQuery = "SELECT * FROM Accounts";
$PakAccountsResult = mysqli_query($con, $PakAccountsQuery);

while($PakAccountsRow = mysqli_fetch_array($PakAccountsResult))
{
  echo "
      <tr>
        <td>".$PakAccountsRow['ANaam']."</td>
        <td><input type='password' value='".$PakAccountsRow['AWachtwoord']."' id='".$PakAccountsRow['AccountNr']."'disabled style='border:none;background: rgba(76, 175, 80, 0.0);'></input> <img src='Img/eye-fill.svg' onmouseover='mouseoverPass(".$PakAccountsRow['AccountNr'].");' onmouseout='mouseoutPass(".$PakAccountsRow['AccountNr'].");'/></td>
        <td>".$PakAccountsRow['AAdmin']."</td>
        <td><button type='button' class='btn btn-sm btn-success' data-toggle='modal' data-target='#AanpassenModal' onclick='GetAccountInfo(".$PakAccountsRow['AccountNr'].")'>Aanpassen</button></td>
      </tr>
    ";
}
?>