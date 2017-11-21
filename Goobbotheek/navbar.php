<!DOCTYPE html>
<html>
<head>

<style>
body {margin:0;}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>

<div class="topnav col-lg-12 col-xs-4">

<?php
/*if(session_id())
{
$query_patient = "SELECT *
FROM 	`user`
WHERE  `verzekeringsnummer`= '".$_SESSION["verzekeringsnummer"]."'";

$query_koerier = "SELECT email
FROM 	`koerier`
WHERE   `id`= '".$_SESSION["koerier"]."'";

$query_apotheker = "SELECT email
FROM 	`apotheker`
WHERE   `id`= '".$_SESSION["apotheker"]."'";

$query_huisarts = "SELECT email
FROM 	`huisarts`
WHERE   `id`= '".$_SESSION["huisarts"]."'";

$result_patient = mysqli_query($conn, $query_patient);

$result_koerier = mysqli_query($conn, $query_koerier);

$result_apotheker = mysqli_query($conn, $query_apotheker);

$result_huisarts = mysqli_query($conn, $query_huisarts);

$record_patient = mysqli_fetch_assoc($result_patient);
$record_koerier = mysqli_fetch_assoc($result_koerier);
$record_apotheker = mysqli_fetch_assoc($result_apotheker);
$record_huisarts = mysqli_fetch_assoc($result_huisarts);*/

if (isset($_SESSION["verzekeringsnummer"]) && $_SESSION["verzekeringsnummer"] == true || isset($_SESSION["id"]) && $_SESSION["id"] == true && isset($_SESSION["rol"]) && $_SESSION["rol"] == true)
{
	switch($_SESSION["rol"])
	{
		case "1":
        echo "
              <a class='active' href='./patienthomepage.php'>Home</a>
              <a href='./catalogus.php'>Catalogus</a>
              <a href='./patientprofiel.php'>Patiëntprofiel</a>
              <a href='./handleidingmobiel.php'>Handleiding Mobiel</a>              
              <a href='./logout.php'>Uitloggen</a>";
        break;

    case "2":
        echo "
              <a class='active' href='./huisartshomepage.php'>Home</a>
              <a href='./catalogus.php'>Catalogus</a>
              <a href='./registerform.php'>Registreer een patient</a>
              <a href='./receptschrijven.php'>Recept schrijven</a>
              <a href='./leveroverzichtzoeken.php'>Leveroverzicht</a>
              <a href='./logout.php'>Uitloggen</a>";
        break;

    case "3":
        echo "
              <a class='active' href='./apothekerhomepage.php'>Home</a>
              <a href='./catalogus.php'>Catalogus</a>
              <a href='./overzichtvoorraden.php'>Overzicht Voorraden</a>
              <a href='./spullen_overzicht.php'>Spullen Koerier</a>
              <a href='./medicijnmenu.php'>Medicijn Menu</a>
              <a href='./logout.php'>Uitloggen</a>";
        break;

    case "4":
        echo "
              <a class='active' href='./koerierhomepage.php'>Home</a>
              <a href='./catalogus.php'>Catalogus</a>
              <a href='./leverschema.php'>Leverschema</a>
              <a href='./logout.php'>Uitloggen</a>
              <a href='https://cdn.discordapp.com/attachments/366635390783848479/366635681805500416/goobstandthere.png' style='font-color: black'></a>";
        break;

        default:
        break;
        }
  }

else {
  ?>
  <a class='active' href='./index.php'>Home</a>
  <a href='./catalogus.php'>Catalogus</a>
  <a href='./loginform_patient.php'>Inloggen voor patiënten</a>
  <a href='./loginform_medewerker.php'>Inloggen voor medewerkers</a>
  <?php
}
?>

</div>
</body>
</html>
