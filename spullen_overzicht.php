<?php
session_start();

include("db_connect.php");

date_default_timezone_set("Europe/Amsterdam");
$date = date("Y-m-d 00:00:00");
$date2 = date("Y-m-d 23:59:59");
//echo ($date);
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
  <h1>Spullenoverzicht</h1>
  <form name="Leveringen">
<div class="bs-example">
<div class="panel panel-default">

<?php
$query_medicijn = "SELECT naam FROM medicijn as m, recept as r, receptmedicijn as rm WHERE r.leverdata BETWEEN '".$date."' AND '".$date2."' AND r.id = rm.recept and rm.medicijn = m.id GROUP BY m.naam";
$result_medicijn = mysqli_query($conn, $query_medicijn);
while($medicijn = mysqli_fetch_array($result_medicijn))
            {
                $query_medicijn1 = "SELECT * FROM medicijn WHERE naam = '".$medicijn['naam']."'";
                $result_medicijn1 = mysqli_query($conn, $query_medicijn1);
                while($medicijn1 = mysqli_fetch_array($result_medicijn1))
                {
                    $query_aantal = "SELECT SUM(aantalMedicijnen) as sum FROM receptmedicijn WHERE medicijn = '".$medicijn1['id']."'";
                    $recept_aantal = mysqli_query($conn, $query_aantal);
                    while($aantal = mysqli_fetch_array($recept_aantal))
                    {
                        echo "<h2>".$medicijn1['naam']."  x  ".$aantal['sum']."</h2>";
                    }
            }
        }
?>
</table>
</div>
</div>

</div>
<?php include 'footer.php';?>
</div>
</body>
</html>