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
if(!isset($_POST["leverdata"]) || trim($_POST["leverdata"]) == '')
{
    echo "U heeft geen leverdata ingevuld.";
    header("refresh:4;url=levertijd_wijzigen.php");
    return;
}

$leverdata = date("Y-m-d G:i:00", strtotime($_POST['leverdata']));
//var_dump($leverdata);

include("db_connect.php");
          $query = "SELECT	*
          FROM		`recept`
          WHERE		`leverdata` = '".$_POST["leverdata"]."' AND `id` = '".$_SESSION["receptid"]."'";

$result_select = mysqli_query($conn, $query);

if(mysqli_num_rows($result_select) > 0)
  {
      echo "Deze leverdata is helaas al bezet. Kies alstublieft een andere.";
      header("refresh:4;url=levertijd_wijzigen.php");
      return;
  }

          $query = "UPDATE     `recept`
                    SET        `leverdata` = '".$leverdata."'
                    WHERE      `id` = '".$_SESSION["receptid"]."'";

          $result_update = mysqli_query($conn, $query);

          if ($result_update){
            echo "Uw leverdata is succesvol gewijzigd. Uw levering zal plaatsvinden op de zojuist gekozen datum en tijd.";
            header("refresh:7;url=index.php");
            return;
          }
?>

    <?php include 'footer.php';?>
  </div>
</body>
</html>
