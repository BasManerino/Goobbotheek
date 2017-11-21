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
          include 'db_connect.php';
?>
        <div id="Content">

          <div class="container">
  	<div class="row">
  		 <h1><span class="title-label">Catalogus</span></h1>

          <div class="table-responsive col-md-12">
          <table class="table table-striped table-hover">
            <tbody>
            <?php






            $sql = "SELECT * FROM medicijn";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            echo "<tr>
            <th>Id</th>
            <th>Naam</th>
            <th></th>
            <th></th>
                  </tr>";

            // output data of each row
            while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo "<tr>
              <td><p>".$row["id"]."</td>
              <td><p>".$row["naam"]."</td>
              <td></td>
               <td><a href='medicijninformatie.php?id=".$row['id']."' class='w3-button w3-block w3-blue'>Meer Informatie</a></td>
                    </tr>";
            }
            echo "";
            } else {
            echo "0 results";
            }
            $conn->close();
            ?>
          </tbody>
          </table>

          </div>
          <div class="col-xs-6" id="third">

          </div>
          <div class="col-xs-3"></div>
  	</div>
  </div>

        </div>
    <?php include 'catfooter.php';?>
  </div>
</html>
