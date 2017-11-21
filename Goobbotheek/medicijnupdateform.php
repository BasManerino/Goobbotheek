<?php
session_start();
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

          	$query = "SELECT * FROM `medicijn` WHERE `id` = ".$_GET["id"];

            $aantquery = "SELECT * FROM `aantal` WHERE `medicijn` = ".$_GET["id"];

          	$result = mysqli_query($conn, $query);

            $aantresult = mysqli_query($conn, $aantquery);

          	$record = mysqli_fetch_assoc($result);

            $aantrecord = mysqli_fetch_assoc($aantresult);
          ?>


          <!DOCTYPE html>
          <html>
          	<head>
          		<title></title>
          	</head>
          	<body>
          	<h3>U kunt de onderstaande gegevens wijzigen.</h3>
          		<form action="medicijnupdate.php" method="post">
          			<input type="hidden" name="id" value="<?php echo $record["id"]; ?>">
          			<table>
          				<tr>
          					<td>Naam</td>
          					<td>
          						<input type="text"
          							   name="naam"
          							   value="<?php echo $record["naam"]; ?>">
          					</td>
          				</tr>
          				<tr>
          					<td>Omschrijving</td>
          					<td><input type="text"
          							   name="omschrijving"
          							   value="<?php echo $record["omschrijving"] ?>">
          					</td>
          				</tr>
                  <tr>
          					<td>Aantal</td>
          					<td><input type="text"
          							   name="aantal"
          							   value="<?php echo $aantrecord["aantal"] ?>">
          					</td>
          				</tr><tr>
          					<td>Maximaal</td>
          					<td><input type="text"
          							   name="maximaal"
          							   value="<?php echo $aantrecord["maximaal"] ?>">
          					</td>
          				</tr>
          				<tr>
          					<td></td>
          					<td><input type="submit"
          							   name="submit"
          							   value="Wijzig"
                           class="w3-button w3-block w3-yellow">

          					</td>
          				</tr>
                </table>
								<h3>Pas hier aan welke medicijnen niet met het huidige medicijn combineerd mogen worden.</h3>
								<?php
						$query = "SELECT * FROM medicijn";
            $result = mysqli_query($conn, $query);
            $record = mysqli_fetch_all($result, MYSQLI_ASSOC);

            for ($i=0; $i < sizeof($record); $i++) {
							$checked = '';
							$recordCheck = $record[$i]["id"];
							$query2 = "SELECT verbodenMedicijn FROM combinatie where medicijn = ".$_GET["id"]." AND verbodenMedicijn = ".$recordCheck."";
							// var_dump($query2);
							$result2 = mysqli_query($conn, $query2);
							// var_dump($result2);
							$record2 = mysqli_fetch_assoc($result2);
							// var_dump($record2);
							if(mysqli_num_rows($result2) > 0)
							{
									$checked = 'checked="checked"';
							}
							echo "<div><a>".$record[$i]["naam"]."</a><input style='margin-bottom:3%; margin-left:1%;' float='center' type='checkbox' name='combinatie[]' value=".$recordCheck." $checked></div>";
						}
        ?>
          		</form>
          	</body>
          </html>


        </div>
    <?php include 'catfooter.php';?>
  </div>
</body>
</html>
