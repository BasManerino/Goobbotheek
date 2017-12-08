<?php
session_start();

include("db_connect.php");
     
       $query_recept = "SELECT * FROM recept WHERE patient = '".$_SESSION["verzekeringsnummer"]."'";
       $recept_result = mysqli_query($conn, $query_recept);

       $query_apotheker = "SELECT * FROM apotheker WHERE id = '".$_SESSION["apotheker"]."'";
       //var_dump($query_apotheker);
       $result_apotheker = mysqli_query($conn, $query_apotheker);
       //var_dump($result_apotheker);
       $record_apotheker = mysqli_fetch_assoc($result_apotheker);
       //var_dump($record_apotheker);

       $query_huisarts = "SELECT * FROM huisarts where id = '".$_SESSION["huisarts"]."'";
       $result_huisarts = mysqli_query($conn, $query_huisarts);
       $record_huisarts = mysqli_fetch_assoc($result_huisarts);

       $query_user = "SELECT * FROM user where verzekeringsnummer = '".$_SESSION["verzekeringsnummer"]."'";
       $result_user = mysqli_query($conn, $query_user);
       $record_user = mysqli_fetch_assoc($result_user);
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
          <h1>Klantgegevens</h1>

          <div id="gegevens">
             Verzekeringsnummer: <strong><?= $record_user["verzekeringsnummer"] ?></strong><br>
             Email:  <strong><?= $record_user["email"] ?></strong><br>
             Achternaam:  <strong><?= $record_user["achternaam"] ?></strong><br>
             Geboorteplaats:  <strong><?= $record_user["geboorteplaats"] ?></strong><br>
             Adres:  <strong><?= $record_user["adres"] ?></strong><br>
             Telefoonnummer:  <strong><?= $record_user["telefoonnummer"] ?></strong><br>
             Postcode:  <strong><?= $record_user["postcode"] ?></strong><br>
             Apotheker:  <strong><?= $record_apotheker["naam"] ?></strong><br>
             Huisarts:  <strong><?= $record_huisarts["naam"] ?></strong><br>
             Post:  <strong><?= $record_user["post"] ?></strong><br>
             <br>

             <div class="row">
            <span class="group-btn">
                <a href="accountgegevensform.php" class="w3-button w3-block w3-blue">Verander adresgegevens<i class="fa fa-id-card"></i></a>
            </span> <br>

	           </div>
          </div>

          <div id="leveringen">
          <table class="table w3-table-all">
<tr>

<th><font color="black">Id</font></th>
<th><font color="black">Leverdata</font></th>
<tr>

<?php 
while($recept=mysqli_fetch_array($recept_result)){

    echo "<tr>";

    echo "<td>".$recept['id']."</td>";
    echo "<td>".$recept['leverdata']."</td>";

    echo "</tr>";

}//end while
?>
</table>
         </div>
          </div>
       <?php include 'footer.php';?> 
  </div>
</body>
</html>
