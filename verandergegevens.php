<?php session_start();?>
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
  <link rel="stylesheet" href="datetimepicker/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="datetimepicker/css/bootstrap-datetimepicker.min.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">
        <?php
include("db_connect.php");

$query = "UPDATE user
              SET                  adres = '".$_POST['adres']."',
                                   telefoonnummer = '".$_POST['telefoonnummer']."',
                                   postcode = '".$_POST['postcode']."'
              WHERE                verzekeringsnummer = '".$_SESSION['verzekeringsnummer']."'";

              $result = mysqli_query($conn, $query);

                  if ( $result )
                  {
                      echo "Uw gegevens zijn succesvol gewijzigd. U word teruggestuurd naar uw profiel.";
                      header("refresh:5; url=patientprofiel.php");
                  }

                  else
                  {
                      echo "Er is iets mis gegaan, uw gegevens zijn niet goed gewijzigd. U word teruggestuurd naar de wijzigpagina";
                      header("refresh:5; url=accountgegevensform.php");
                  }

?>


    <?php include 'footer.php';?>
  </div>
</body>
</html>