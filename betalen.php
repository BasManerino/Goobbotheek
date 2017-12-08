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
          include 'block.php';
          include ("db_connect.php");

          date_default_timezone_set("Europe/Amsterdam");
               $date = date("Y-m-d");


        $query = "SELECT * FROM `film` WHERE `filmid` ='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        $record = mysqli_fetch_assoc($result);

        $videoquery = "SELECT `videoid` FROM `video` WHERE `film` ='".$_SESSION['id']."'";
        $videoresult = mysqli_query($conn, $videoquery);
        $videorecord = mysqli_fetch_assoc($videoresult);

        $date = new DateTime($_POST["aanmaakdatum"]);
            $strip = $date->format('Y-m-d');
            //var_dump($strip);

            $date1 = new DateTime($_POST["ophaaldatum"]);
            $date2 = new DateTime($_POST["afleverdatum"]);

            $days = $date1->diff($date)->format("%a");
            //var_dump($days);

            $bestelprijs = 7.50;
            $weeks = floor($days / 7);
            $dayRemainder = $days % 7;
            $weekprijs = $weeks * 6;
            $duratieprijs = $dayRemainder + $weekprijs;

            if ($duratieprijs > 50)
            {
                  $leverkosten = 0.00;
            }

            else if(!empty($_POST["afleverdatum"]) AND !empty($_POST["aflevertijd"]))
            {
                  $leverkosten = 2.00;
            }

            else
            {
                  $leverkosten = 0.00;
            }

            $totale_prijs = $bestelprijs + $leverkosten + $duratieprijs;




        $orderquery = "INSERT INTO `order`(
                         `id`,
                         `gebruiker`,
                         `totaleprijs`
                            )
              VALUES 	   (NULL,
                         '".$_SESSION["email"]."',
                            $totale_prijs
                            )";
        $orderresult = mysqli_query($conn, $orderquery);
        $last_id = mysqli_insert_id($conn);


        $regelquery = "INSERT INTO `orderregel`(
                         `video`,
                         `order`
                            )
              VALUES 	   ('".$videorecord['videoid']."',
                          '".$last_id."'
                            )";
        $regelresult = mysqli_query($conn, $regelquery);
var_dump($regelquery);

        $afleverquery = "INSERT INTO `afleverdata`(
                         `order`,
                         `afleverdatum`,
                         `aflevertijd`
                            )
              VALUES 	   ($last_id,
                          '".$_POST["afleverdatum"]."',
                          '".$_POST["aflevertijd"]."'
                            )";
        $afleverresult = mysqli_query($conn, $afleverquery);


        $ophaalquery = "INSERT INTO `ophaaldata`(
                         `order`,
                         `ophaaldatum`,
                         `ophaaltijd`
                            )
              VALUES 	   ($last_id,
                          '".$_POST["ophaaldatum"]."',
                          '".$_POST["ophaaltijd"]."'
                            )";

        $ophaalresult = mysqli_query($conn, $ophaalquery);



          ?>

        <div id="Content">
          <h1>Bedankt voor het bestellen</h1>

          <div class="container">
          		<div class="card">
          			<div class="container-fliud">
          				<div class="wrapper row">
          					<div class="preview col-md-6">

          						<div class="preview-pic tab-content">
                        U krijgt een mail met de orderinformatie opgestuurd!
          						<div class="action">

          					</div>
          				</div>
          			</div>
          		</div>
          	</div>

        </div>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
