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
          <h1>Medicijngegevens</h1>

          <?php
              include("db_connect.php");
           ?>

          <div class="row">
            <span class="group-btn">
                <a href="medicijninsertform.php" class="w3-button w3-block w3-blue">Voeg een medicijn toe<i class="fa fa-plus"></i></a>
            </span> <br>
            <span class="group-btn">
                <a href="medicijnupdatetabel.php" class="w3-button w3-block w3-green">Update medicijninformatie<i class="fa fa-pencil-square-o"></i></a>
            </span> <br>
            <span class="group-btn">
                <a href="medicijndeletetabel.php" class="w3-button w3-block w3-red">Verwijder een medicijn<i class="fa fa-window-close"></i></a>
            </span>


	           </div>
          </div>
      <?php include 'footer.php';?>
  </div>
</body>
</html>
