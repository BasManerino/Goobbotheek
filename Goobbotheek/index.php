<?php
    if(isset($_SESSION['variablename']))
    {
        session_destroy();
    }
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
          <h1>Home</h1>
          <h3>Welkom op de Goobbotheek. U kan de medicijncatalogus bekijken en als uw huisarts u heeft geregistreerd kan u inloggen.
          Ook kunt u hier de catalogus van de verschillende medicijnen bekijken zodat u weet of we u benodigde medicijn in ons assortiment hebben.</h3>

        </div>
        <div align="center">
        <img src=".\img\logo.png">
       </div>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
