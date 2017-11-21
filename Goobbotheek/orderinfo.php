<?php
session_start();

ob_start();

$_SESSION["receptID"] = $_GET["receptID"];

include("db_connect.php");

$query_recept = "SELECT * FROM recept WHERE id = '".$_GET['receptID']."'";
$recept_result = mysqli_query($conn, $query_recept);
$recept = mysqli_fetch_assoc($recept_result);

$query_user = "SELECT * FROM user where verzekeringsnummer = '".$recept["patient"]."'";
$result_user = mysqli_query($conn, $query_user);
$patient = mysqli_fetch_assoc($result_user);

if($recept['voltooid'] == 1)
{
   $voltooid = 'Ja';
}

else
{
   $voltooid = 'Nee';
}
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
  <h1>Leveroverzicht</h1>
<div class="bs-example">
<div class="panel panel-default">
<!-- Table -->
<table class="table w3-table-all">
<tr>

<th><font color="black">Voltooid</font><br></th>
<th><font color="black">Achternaam</font></th>
<th><font color="black">Leverdata</font></th>
<th><font color="black">Adres</font></th>
<th><font color="black">Postcode</font></th>
<th><font color="black">Telefoonnummer</font></th>
<th><font color="black">Medicijnen</font></th>


<tr>

<?php 
        echo "<tr>";

        echo "<td>".$voltooid."</td>";
        echo "<td>".$patient['achternaam']."</td>";
        echo "<td>".$recept['leverdata']."</td>";
        echo "<td>".$patient['adres']."</td>";
        echo "<td>".$patient['postcode']."</td>";
        echo "<td>".$patient['telefoonnummer']."</td>";
        $query_receptmedicijn = "SELECT * FROM receptmedicijn where recept = '".$recept["id"]."'";
        $result_receptmedicijn = mysqli_query($conn, $query_receptmedicijn);
        
        while($receptmedicijn=mysqli_fetch_array($result_receptmedicijn))
        {
            $i = 0;

            $query_medicijn = "SELECT * FROM medicijn where id = '".$receptmedicijn["medicijn"]."'";
            $result_medicijn = mysqli_query($conn, $query_medicijn);
        
            while($medicijn=mysqli_fetch_array($result_medicijn))
            {
               echo "<td>".$medicijn['naam']. ' x' .$receptmedicijn['aantalMedicijnen']."</td>";
               $i++;
            }
        }

     
?>
</table>
</div>
</div>

<div id="row" align="center">
<form id="levering_voltooien" action="levering_voltooien.php" method="post" class="form">
<h4>Opmerking/bijzonderheden (Niet verplicht)</h4><textarea id="opmerking" class="input" name="opmerking" rows="10" cols="60"></textarea>
    <br>

    <h4>Verzekeringsnummer patient (Verplicht)</h4><input type="text" style="width: 30%"name="verzekeringsnummer" id="verzekeringsnummer" class="form-control input-sm" placeholder="Voer hier het verzekeringsnummer van de patient in" />
    <br>
    <h4>Levering voltooid</h4>
    <select name="voltooid">
        <option value="Ja">Ja</option>
        <option value="Nee">Nee</option>
    </select>
    <br>
    <br>
    <input type="submit" name="submit" class="w3-button w3-blue">
    <br>
    <br>
    </form>
</div>

</div>
<?php include 'catfooter.php';?>
</div>
</body>
</html>