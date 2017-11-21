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
         	include ("db_connect.php");
       $_SESSION['id'] = $_GET["id"];

        $query = "SELECT * FROM medicijn as m, aantal as a WHERE m.id = ".$_GET["id"]." and a.medicijn = ".$_GET["id"]."";
      	$result = mysqli_query($conn, $query);
      	$record = mysqli_fetch_assoc($result);


          ?>
        <div id="Content">
          <h1>Medicijninformatie</h1>

          <div class="container">
          		<div class="card">
          			<div class="container-fliud">
          				<div class="wrapper row">
          					<div class="preview col-md-6">

          						<div class="preview-pic tab-content">

          						</div>


          					</div>
          					<div class="details col-md-6">
                      <div class="w3-center" >
          						<h2 class="product-title"><?php echo "$record[naam]"?></h2>


            <?php




          /*   if ($seriecheck['serie'] == '1')
             {
         ?>
         <div class="w3-panel w3-green"> <h4>Dit is een seriepakket!</h4> </div>
                <?php
                 }
                 ?> */
                 // dit kunnen we uiteindelijk misschien veranderen voor als de voorraad op 0 is
?>

                    </div>

                      <div class="w3-panel w3-topbar w3-bottombar w3-border-green w3-pale-green" id="medicijnomschrijving">
          						<p class="product-description"><?php echo "$record[omschrijving]"?></p>
                      <p class="product-description">Aantal beschikbaar:<?php echo "$record[aantal]"?></p>
                    </div>





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
