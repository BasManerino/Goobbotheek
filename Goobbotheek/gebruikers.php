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
    <?php include 'navbar.php';
          include 'block.php';?>
        <div id="Content">
          <h1>Gebruikers</h1>
          <form name="Gebruikers">
<div class="bs-example">
    <div class="panel panel-default">
		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>Gebruiker</th>
					<th>Adres</th>
					<th>Mail</th>
          <th>Blocked</th>
          <th></th>
				</tr>
			</thead>
			<tbody>
					<?php include 'gebruikerinfo.php';?>
			</tbody>
		</table>
	</div>
        </div>

  </div>
  <?php include 'catfooter.php';?>
</div>

</body>
</html>
