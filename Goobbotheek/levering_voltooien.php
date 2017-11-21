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
  <link rel="stylesheet" href="datetimepicker/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="datetimepicker/css/bootstrap-datetimepicker.min.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">

        <?php
include("db_connect.php");

if
(!isset($_POST["verzekeringsnummer"]) || trim($_POST["verzekeringsnummer"]) == '' && $_POST['voltooid'] == 'Ja')
{
    echo "<font size='100px'>U heeft het verzekeringsnummer niet ingevoerd. Probeer het opnieuw.</font>";
    header("refresh:5; url=leveroverzichtlijst.php");
    exit;
}

else
{
          if( $_POST['voltooid'] == 'Nee')
          {
                $query1 = "UPDATE       `recept`
                            SET        `voltooid` = 1
                            WHERE      `id` = '".$_SESSION["receptID"]."'";

                $result1= mysqli_query($conn, $query1);

                $query_medicijn = "SELECT * FROM receptmedicijn where recept = '".$_SESSION["receptID"]."'";
                $result_medicijn = mysqli_query($conn, $query_medicijn);
            
                while($medicijn=mysqli_fetch_array($result_medicijn))
                {    
                        $query2 = "UPDATE       `aantal`
                        SET        `aantal` = `aantal` + '".$medicijn["aantalMedicijnen"]."'
                        WHERE      `medicijn` = '".$medicijn["medicijn"]."'";

                        $result2 = mysqli_query($conn, $query2);
                }
          }

          else if( $_POST['voltooid'] == 'Ja')
          {
                $query = "UPDATE       `recept`
                            SET        `voltooid` = 2
                            WHERE      `id` = '".$_SESSION["receptID"]."'";

                $result = mysqli_query($conn, $query);
          }

          if (isset($_POST["opmerking"]))
          {
                $query = "UPDATE       `recept`
                SET        `opmerking` = '".$_POST["opmerking"]."'
                WHERE      `id` = '".$_SESSION["receptID"]."'";

                $result = mysqli_query($conn, $query);
          }

          if ($result)
          {
                echo "De levering is afgetekent. U wordt teruggestuurd naar de leveringslijst.";
                header("refresh:5;url=leverschema.php");
          }
          else 
          {
                echo "Er is een probleem opgetreden waardoor de levering niet is afgetekent. Neem contact op met uw baas.";
                header("refresh:5;url=leverschema.php");
          }
        }
?>

    <?php include 'footer.php';?>
  </div>
  </div>
</body>
</html>