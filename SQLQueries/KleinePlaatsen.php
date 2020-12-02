<?php
include '../Connection.php';
$currentDate = date("Y-m-d"); 
?>
<?php
  $currentDate = date("Y-m-d");                                                                                     
  $DateQuery = "SELECT PlaatsNr FROM reservaties WHERE '".$currentDate."' between AankomstDatum and VertrekDatum-1";  # Selects the spotnumbers from spots that are occupied on the current date
  $DateResult = mysqli_query($con, $DateQuery);                                                                     
  $BezetArray = [];                                                                                                 # An array that gets Filled with places that are currently occupied
  while($RowDate = mysqli_fetch_array($DateResult))
  {                                                                # Pushes the spot Number into the array if it's in the queryresult
    array_push($BezetArray, $RowDate['PlaatsNr']);                                                                  #
  }                                                                                                                 #
  $PlaatsQuery = "SELECT PlaatsNr FROM plaatsen WHERE PlaatsFormaat = 'KLEIN'";                                     # Selects the Spot Numbers for all the small spots                                            
  $PlaatsResult = mysqli_query($con, $PlaatsQuery);
  while($RowPlaats = mysqli_fetch_array($PlaatsResult))
  {                                                            
    if(in_array($RowPlaats['PlaatsNr'],$BezetArray))
    {                                                               # Changes the Status text and class so                                                    
      $Status = "Bezet";                                                                                            # it can be automatically displayed if
      $StatusClass="bg-danger";                                                                                     # a spot is free or occupied. The class
    }
    else
    {                                                                                                          # is to change the table pane color
      $Status = "Vrij";                                                                                             #
      $StatusClass="bg-success";                                                                                    #
    }                                                                                                               #
    echo "
    <tr>
      <td>".$RowPlaats['PlaatsNr']."</td>
      <td class='".$StatusClass." text-white'>".$Status."</td>
    </tr>
    ";                                                            
  }
?>