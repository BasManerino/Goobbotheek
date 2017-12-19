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
session_start();
 include("db_connect.php");

 $queryaantal = "DELETE FROM `aantal`
WHERE   `medicijn` = '".$_GET['id']."'";

$query = "DELETE FROM `combinatie`
WHERE   `medicijn` = '".$_GET['id']."'";

 $query = "DELETE FROM `medicijn`
WHERE   `id` = '".$_GET['id']."'";

$resultaantal = mysqli_query($conn, $queryaantal);
$result = mysqli_query($conn, $query);

//var_dump($query);

 echo "Het medicijn is verwijderd.";
 header("refresh:10; url=medicijndeletetabel.php");
 ?>
  </div>
</body>
</html>
