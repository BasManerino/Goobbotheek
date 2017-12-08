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
          <h1>Klant Order</h1>
          <form name="orderinfo">
<div class="bs-example">
    <div class="panel panel-default">
		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Naam film</th>
					<th>Adres</th>
          <th>Aflever datum/tijd</th>
          <th>Ophaal datum/tijd</th>
          <th>Prijs</th>
          <th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>John Wick 2</td>
					<td>Hilverstraat 12</td>
          <td>23-4 18:00</td>
          <td>30-4 19:00</td>
          <td>7,50</td>
          <td><a href="videoinformatie.php" role="button" class="btn btn-info btn-block">FilmInfo</a></td>
				</tr>
        <tr>
					<td>2</td>
					<td>Bee Movie</td>
					<td>Hilverstraat 12</td>
          <td>27-4 19:00</td>
          <td>4-5 21:00</td>
          <td>5,00</td>
          <td><a href="videoinformatie.php" role="button" class="btn btn-info btn-block">FilmInfo</a></td>
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
