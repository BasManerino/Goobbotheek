<?php
session_start();

include("db_connect.php");

date_default_timezone_set("Europe/Amsterdam");
$date = date("Y-m-d 00:00:00");
$date2 = date("Y-m-d 23:59:59");
//echo ($date);

$query_recept = "SELECT * FROM recept as r WHERE leverdata BETWEEN '".$date."' AND '".$date2."'";
$recept_result = mysqli_query($conn, $query_recept);
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
  <h1>Leveroverzicht</h1>
  <form name="Leveringen">
<div class="bs-example">
<div class="panel panel-default">
<!-- Table -->
<table class="table w3-table-all">
<tr>

<th><font color="black">Voltooid</font><br></th>
<th><font color="black">Achternaam</font></th>
<th><font color="black">Leverdata</font></th>
<th><font color="black">Adres</font></th>
<th><font color="black">Meer informatie</font></th>

<tr>

<?php 
while($recept=mysqli_fetch_array($recept_result)){

$query_user = "SELECT * FROM user where verzekeringsnummer = '".$recept["patient"]."'";
$result_user = mysqli_query($conn, $query_user);

if($recept['voltooid'] == 0)
{
   $voltooid = 'Nog niet';
}

if($recept['voltooid'] == 1)
{
   $voltooid = 'Nee';
}

if($recept['voltooid'] == 2)
{
   $voltooid = 'Ja';
}

$query_user = "SELECT * FROM user where verzekeringsnummer = '".$recept["patient"]."'";
$result_user = mysqli_query($conn, $query_user);

while($patient=mysqli_fetch_array($result_user)){

$verzekeringsnummer = $patient['verzekeringsnummer'];
$receptID = $recept['id'];

$link = 'orderinfo.php?verzekeringsnummer='.$verzekeringsnummer.'&receptID='.$receptID.'';

echo "<tr>";

echo "<td>".$voltooid."</td>";
echo "<td>".$patient['achternaam']."</td>";
echo "<td>".$recept['leverdata']."</td>";
echo "<td>".$patient['adres']."</td>";
echo "<td><a href=$link class='w3-button w3-blue'>Meer informatie</a></td";
echo "</tr>";
}
}//end while
?>
</table>
</div>
</div>

</div>
<?php include 'footer.php';?>
</div>
</body>
</html>