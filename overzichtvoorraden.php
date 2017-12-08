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
          <h1>Overzicht Voorraden</h1>
          <form name="orderinfo">
<div class="bs-example">
    <div class="panel panel-default">
        <!-- Table -->
        <table class="table w3-table-all">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Voorraad</th>
                    <th>Maximaal</th>
                </tr>
            </thead>
            <tbody>
        <?php
        include 'db_connect.php';

        $query_medicijn =  "select * from medicijn as m, aantal as a where a.medicijn = m.id order by maximaal DESC";
        $result_medicijn = mysqli_query($conn, $query_medicijn);
        while($medicijn= mysqli_fetch_array($result_medicijn))
        {
           if ($medicijn["aantal"] < $medicijn["maximaal"] * 0.25)
           {
                echo "<tr>
                <td>". $medicijn["id"]."</td>
                <td>". $medicijn["naam"]."</td>
                <td bgcolor='red'>". $medicijn["aantal"]."</td>
                <td>". $medicijn["maximaal"]."</td>";
           }

           else
           {
                echo "<tr>
                <td>". $medicijn["id"]."</td>
                <td>". $medicijn["naam"]."</td>
                <td>". $medicijn["aantal"]."</td>
                <td>". $medicijn["maximaal"]."</td>";
           }
        }

        ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
  <?php include 'catfooter.php';?>
</div>

</body>
</html>
