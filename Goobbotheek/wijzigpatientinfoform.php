<?php
    session_start();

    $_SESSION["patient"] = $_GET["id"];
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/w3.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">

          <?php

          	include("db_connect.php");
          	$query = "SELECT * FROM `user` WHERE `verzekeringsnummer` = ".$_GET["id"];
          	$result = mysqli_query($conn, $query);
          	$record = mysqli_fetch_assoc($result);

          ?>
          <!DOCTYPE html>
          <html>
          	<head>
          		<title></title>
          	</head>
          	<body>
          	<h3>U kan de onderstaande gegevens wijzigen.</h3>
          		<form action="wijzigpatientinfo.php" method="post">
          		<input type="hidden" name="id " value="<?php echo $record["verzekeringsnummer"]; ?>">


              <table class="table w3-table-all"> <br><br><br>

                  Medicijnen die de patiënt niet mag. Aangevinkde checkbox betekend dat de patiënt dit medicijnen niet kan laten leveren.
                  <?php
                  include("db_connect.php");
?>
                  <table class="table w3-table-all">
                <?php
                  include("db_connect.php");
                  $query = "SELECT * FROM medicijn";
                  $result = mysqli_query($conn,$query);
                  $record = mysqli_fetch_all($result, MYSQLI_ASSOC);




                  for ($i=0; $i < sizeof($record); $i++)
                  {
                    $checked = '';
                    $recordCheck = $record[$i]["id"];
                    
                   $query2 = "SELECT * FROM usermedicijn where patient = ".$_GET["id"]." AND medicijn = ".$recordCheck."";
                   //var_dump($query2);
                   $result2 = mysqli_query($conn, $query2);
                   $record2 = mysqli_fetch_assoc($result2);
                   
                   if(mysqli_num_rows($result2) > 0)
                   {
                     $checked = 'checked="checked"';
                   }
                     echo"
                     <tr>
                     <td>".$record[$i]["id"]."</td>
                     <td>".$record[$i]["naam"]."</td>
                     <td><input type='checkbox' name='allergie[]' value='".$record[$i]["id"]."' $checked></td>
                     </tr>";
                   }
                   ?>
                   </table>


          					<td><input type="submit"
          							   name="submit"
          							   value="Wijzig"
                           class="w3-button w3-block w3-yellow">

          					</td>
          				</tr>



          		</form>
          	</body>
          </html>


        </div>
    <?php include 'catfooter.php';?>
  </div>
</body>
</html>
