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
          <h1>Medicijn Toevoegen</h1>
        </div>
        <?php
            include("db_connect.php");

            $query = "SELECT * FROM medicijn";
            $result = mysqli_query($conn, $query);
            $record = mysqli_fetch_all($result, MYSQLI_ASSOC);

            //var_dump($record);
         ?>
        <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form id="medicijninsert" action="medicijninsert.php" method="post" enctype="multipart/form-data" class="form">
            <h4>Nieuw Medicijn</h4>
<br>
            <input type="text" name="naam" id="naam" class="form-control input-sm" placeholder="Vul hier de medicijnnaam in"/>
          </br> <br>
            <input type="text" name="omschrijving" id="omschrijving" class="form-control input-sm" placeholder="Vul hier de omschrijving in"/>
          </br> <br>
          <input type="text" name="aantal" id="aantal" class="form-control input-sm" placeholder="Vul hier het aantal in"/>
        </br> <br>
        <input type="text" name="maximaal" id="maximaal" class="form-control input-sm" placeholder="Vul hier het maximaal in"/>
        </div>
        </div>
        <div class="row">
        <div class="col-md-offset-5 col-md-6">
        <h3>Kier hieronder medicijnen die niet combineerd mogen worden met dit medicijn.</h3>
        <br>
        <?php
            for ($i=0; $i < sizeof($record); $i++) {
              echo "<div><a>".$record[$i]["naam"]."</a><input style='margin-bottom:3%; margin-left:1%;' float='center' type='checkbox' name='combinatie[]' value=".$record[$i]["id"]."></div>";
            }
        ?>
            <input type="submit" name="submit" value="Maak aan" class="w3-button w3-blue">
            <br>
            <br>
            </div>
          </form>
        </div>
    </div>
</div>

    <?php include 'footer.php';?>



  </div>
</body>
</html>
