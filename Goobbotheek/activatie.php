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

          $query = "UPDATE     `user`
                    SET        `verified` = 1
                    WHERE      `email` = '".$_GET["email"]."'";

          $result = mysqli_query($conn, $query);

          if ($result){
            echo "U heeft zich succesvol geactiveerd! U kan nu inloggen. U wordt gestuurd naar de login pagina.";
            header("refresh:7;url=loginform_patient.php");
          }
          else {
            echo "Er is een probleem opgetreden waardoor het account niet geactiveerd is. Neem contact op met uw huisarts.";
            header("refresh:7;url=www.goobbotheek.com");
          }
?>

    <?php include 'footer.php';?>
  </div>
</body>
</html>
