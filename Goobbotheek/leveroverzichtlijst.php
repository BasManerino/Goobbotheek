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
      <h1>Leveroverzicht Lijst</h1>
      <form name="Gebruikers">
<div class="bs-example">
<div class="panel panel-default">
<!-- Table -->
<table class="table">
  <thead>
    <tr>
      <th>Achternaam</th>
      <th>Adres</th>
      <th>Geboortedatum</th>
      <th>Verzekeringsnummer</th>

      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Jansen</td>
      <td>Hilverstraat 12</td>
      <td>jansen@mail.com</td>
      <td>509</td>
      <td><a href="#" role="button" class="w3-button w3-blue">Zie Overzicht</a></td>
    </tr>
    <tr>
      <td>Zuylen</td>
      <td>Appellaan 15</td>
      <td>jansen@mail.com</td>
      <td>307</td>
      <td><a href="#" role="button" class="w3-button w3-blue">Zie Overzicht</a></td>
    </tr>

  </tbody>
</table>
</div>
    </div>

</div>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
