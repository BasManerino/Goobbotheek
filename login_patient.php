<?php
session_start();

include("db_connect.php");
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
		//Dit bepaald welke rol waar naartoe kan
		
	if ( empty($_POST["email"]) || empty($_POST["verzekeringsnummer"]) || empty($_POST["geboorteplaats"]))
	{
		echo "U heeft uw emailadres, verzekeringsnummer of geboorteplaats niet ingevuld. Probeer het nogmaals.";
		header("refresh:4; url=loginform_patient.php");
		return;
	}

		$query = "SELECT	*
				  FROM		`user`
				  WHERE		`verzekeringsnummer` = '".$_POST["verzekeringsnummer"]."' AND `geboorteplaats` = '".$_POST["geboorteplaats"]."' AND `email` = '".$_POST["email"]."';";

		$result = mysqli_query($conn, $query);
		$record = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) < 1)
	{
		echo "Uw inloggegevens zijn niet juist. Probeer opnieuw in te loggen.";
		header("refresh:4; url=loginform_patient.php");
		return;
	}
		$_SESSION["verzekeringsnummer"] = $record["verzekeringsnummer"];
		$_SESSION["email"] = $record["email"];
		$_SESSION["achternaam"] = $record["achternaam"];
		$_SESSION["geboorteplaats"] = $record["geboorteplaats"];
		$_SESSION["adres"] = $record["adres"];
		$_SESSION["telefoonnummer"] = $record["telefoonnummer"];
		$_SESSION["postcode"] = $record["postcode"];
		$_SESSION["apotheker"] = $record["apotheker"];
		$_SESSION["huisarts"] = $record["huisarts"];
		$_SESSION["huisartsenpost"] = $record["post"];
		$_SESSION["rol"] = $record["rol"];
		$_SESSION["verified"] = $record["verified"];
		if(mysqli_num_rows($result) > 0)
		{
        switch ($record["verified"])
				{
						case "1": {

							header("location:patienthomepage.php");
						}
						case "0": {
											echo "U heeft uw account nog niet geverifieerd.";
										 header("refresh:50; url=loginform.php");
										 exit;
						}
				}

		}
		else
		{
			// Meldt de gebruiker dat hij een niet bestaand emailadres en wachtwoordcombinatie heeft gebruikt. Stuur hem door naar de login_form.php pagina
			echo "Het door u ingevulde email, verzekeringsnummer of geboorteplaats is niet bekend, log opnieuw in.";
			header("refresh:5;url=loginform.php?content=loginform_patient.php");
		}
?>

    <?php include 'footer.php';?>
  </div>
</body>
</html>