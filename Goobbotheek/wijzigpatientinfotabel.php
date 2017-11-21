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
          <h1>Update patiëntinfo</h1>
          <form name="orderinfo">
<div class="bs-example">
    <div class="panel panel-default">
        <!-- Table -->
        <table class="table w3-table-all">
            <thead>
                <tr>
                    <th>Verzekeringsnummer</th>
                    <th>Naam</th>
                </tr>
            </thead>
            <tbody>
        <?php
        include 'db_connect.php';

        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 echo "<tr>
                        <td>". $row["verzekeringsnummer"]."</td>
                        <td>". $row["achternaam"]."</td>
                        <td><a href='wijzigpatientinfoform.php?id=".$row['verzekeringsnummer']."'  role='button' class='w3-button w3-block w3-green'>Wijzig</a></td>
                      </tr>";
             }
        } else {
             echo "0 results";
        }

        $conn->close();
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
