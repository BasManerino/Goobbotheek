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
    <?php include 'navbar.php';
          include 'db_connect.php'?>


    <?php





     ?>

    <div id="Content">
      <h1>Leveroverzicht</h1>
      <form name="Leveringen">
<div class="bs-example">
<div class="panel panel-default">
<!-- Table -->
<table class="table">
  <thead>
    <tr>
      <th>Orderid</th>
      <th>Leverdata</th>
      <th>Voltooid</th>
    </tr>
  </thead>



  <tbody>

<?php
$basis_query = "SELECT * FROM recept WHERE patient = ".$_GET['value']."";
    $basis_result = mysqli_query($conn, $basis_query);


    if ($basis_result->num_rows > 0) {
         // output data of each row
         while($basis_record = $basis_result->fetch_array()) {

           if($basis_record['voltooid'] == 0)
           {
              $voltooid = 'Nog niet';
           }

           if($basis_record['voltooid'] == 1)
           {
              $voltooid = 'Nee';
           }

           if($basis_record['voltooid'] == 2)
           {
              $voltooid = 'Ja';
           }


           echo "<tr>
                  <td>". $basis_record["id"]."</td>
                  <td>". $basis_record["leverdata"]."</td>
                  <td>". $voltooid ."</td>
                </tr>";
              }
         } else {
              echo "0 recepten gevonden!";
         }

         $conn->close();
         ?>
  </tbody>
</table>
</div>
    </div>

</div>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
