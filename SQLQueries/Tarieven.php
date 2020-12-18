<?php
include '../Connection.php';
$sqlQuery = "SELECT * FROM categorieen";
$result = mysqli_query($con, $sqlQuery);
while($row = mysqli_fetch_array($result))
{
  echo "
    <tr>
      <td>".$row['CategorieNaam']."</td>
      <td>€".$row['Prijs'].",-</td>
    </tr>
  ";
}
?>