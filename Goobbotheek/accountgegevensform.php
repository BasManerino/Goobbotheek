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
          <h1>Klantgegevens Veranderen</h1>
        </div>

        <div id="gegevens">
        <?php
            include("db_connect.php");

            $select_gebruiker = "SELECT * FROM user WHERE verzekeringsnummer = '{$_SESSION["verzekeringsnummer"]}'";

            $result = mysqli_query($conn, $select_gebruiker);

            $row = mysqli_fetch_assoc($result);


         ?>

        </div>

    
        <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form id="verandergegevens" action="verandergegevens.php" method="post" class="form">
            <h4>Verander</h4>
            <input type="text" name="adres" id="adres" class="form-control input-sm" placeholder="Vul hier uw nieuwe adres in"
             value="<?= $row["adres"] ?>" />
            </br>
            <input type="text" name="telefoonnummer" id="telefoonnummer" class="form-control input-sm" placeholder="Vul hier uw nieuwe telefoonnummer in"
             value="<?= $row["telefoonnummer"] ?>" />
            </br>
            <input type="text" name="postcode" id="postcode" class="form-control input-sm" placeholder="Vul hier uw nieuwe postcode in"
             value="<?= $row["postcode"] ?>" />
            </br>

            <input type="submit" name="submit" value="Verander" class="w3-button w3-blue">
            </form>
            </div>

        </div>
    </div>
</div>

    <?php include 'footer.php';?>



  </div>
</body>
</html>
