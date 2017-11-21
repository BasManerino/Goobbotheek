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
          <h1>Allergie</h1>
        </div>
        <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form id="allergie" action="allergie.php" method="post" class="form">
              vul hier het verzekeringsnummer van de patiënt in
            <input type="text" name="verzekeringsnummer" id="verzekeringsnummer" class="form-control input-sm" placeholder="Verzekeringsnummer patiënt" />
            </br>
            </br>
            </br>
            Het kan zijn dat een patiënt bepaalde medicijnen niet mag ontvangen, vink de medicijnen die de patiënt NIET mag ontvangen hieronder aan.
            <table class="table w3-table-all">
            <?php
            include("db_connect.php");
            $query = "SELECT * FROM medicijn";
            $result = mysqli_query($conn,$query);
            $record = mysqli_fetch_all($result, MYSQLI_ASSOC);


            for ($i=0; $i < sizeof($record); $i++)
            {
               echo"
               <tr>
               <td>".$record[$i]["id"]."</td>
               <td>".$record[$i]["naam"]."</td>
               <td><input type='checkbox' name='allergie[]' value='".$record[$i]["id"]."'></td>
               </tr>";
             }
             ?>
             </table>
             <br><br>
            <input type="submit" name="submit" value="Verstuur" class="w3-button w3-blue">




            </form>
            </div>

        </div>
    </div>
</div>

    <?php include 'footer.php';?>



  </div>
</body>
</html>
