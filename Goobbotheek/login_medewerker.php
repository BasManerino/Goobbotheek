<?php session_start();

$_SESSION['post-data'] = $_POST;

include("db_connect.php");

$wachtwoord = hash('sha512', $_POST['wachtwoord']);

//echo($beter1);

	if ( empty($_POST["email"]) || empty($_POST["wachtwoord"]) || empty($_POST["functie"]))
	{
		echo "U heeft uw emailadres, wachtwoord of functie niet ingevuld. Probeer het nogmaals.";
		header("refresh:4; url=loginform_medewerker.php");
	}
		if ($_POST["functie"] == 'Huisarts')	
		{
		   $query_huisarts = "SELECT	*
		   FROM		`huisarts`
		   WHERE		`email` = '".$_POST["email"]."';";

		   $result_huisarts = mysqli_query($conn, $query_huisarts);
		   $record_huisarts = mysqli_fetch_assoc($result_huisarts);

		   $query_wachtwoord = "SELECT	*
		   FROM		`huisartswachtwoord`
		   WHERE		`wachtwoord` = '".$wachtwoord."'
		   AND         `huisarts` = '".$record_huisarts["id"]."';";

		   $result_wachtwoord = mysqli_query($conn, $query_wachtwoord);
		   $record_wachtwoord = mysqli_fetch_assoc($result_wachtwoord);
	   
		   if ( mysqli_num_rows($result_huisarts) > 0 && mysqli_num_rows($result_wachtwoord) > 0)
		   {
			   $_SESSION["id"] = $record_huisarts["id"];
			   $_SESSION["email"] = $record_huisarts["email"];
			   $_SESSION["rol"] = $record_huisarts["rol"];
			   $_SESSION["wachtwoord"] = $record_wachtwoord["wachtwoord"];

			   header("location:huisartshomepage.php");
		   }

		   else
		   {
			   echo "Uw inloggegevens zijn niet juist. Probeer opnieuw in te loggen.";
			   header("refresh:4; url=loginform_medewerker.php");
			   return;
		   }
	   }

	   else if ($_POST["functie"] == 'Apotheker')	
	   {
		  $query_apotheker = "SELECT	*
		  FROM		`apotheker`
		  WHERE		`email` = '".$_POST["email"]."';";

		  $result_apotheker = mysqli_query($conn, $query_apotheker);
		  $record_apotheker = mysqli_fetch_assoc($result_apotheker);

		  $query_wachtwoord = "SELECT	*
		  FROM		`apothekerwachtwoord`
		  WHERE		`wachtwoord` = '".$wachtwoord."'
		  AND         `apotheker` = '".$record_apotheker["id"]."';";

		  $result_wachtwoord = mysqli_query($conn, $query_wachtwoord);
		  $record_wachtwoord = mysqli_fetch_assoc($result_wachtwoord);
	  
		  if ( mysqli_num_rows($result_apotheker) > 0 && mysqli_num_rows($result_wachtwoord) > 0)
		  {
			  $_SESSION["id"] = $record_apotheker["id"];
			  $_SESSION["email"] = $record_apotheker["email"];
			  $_SESSION["rol"] = $record_apotheker["rol"];
			  $_SESSION["wachtwoord"] = $record_wachtwoord["wachtwoord"];
            
			  header("location:apothekerhomepage.php");
		  }

		  else
		  {
			  echo "Uw inloggegevens zijn niet juist. Probeer opnieuw in te loggen.";
			  header("refresh:4; url=loginform_medewerker.php");
			  return;
		  }
	  }

	  else if ($_POST["functie"] == 'Koerier')	
	  {
		 $query_koerier = "SELECT	*
		 FROM		`koerier`
		 WHERE		`email` = '".$_POST["email"]."';";

		 $result_koerier = mysqli_query($conn, $query_koerier);
		 $record_koerier = mysqli_fetch_assoc($result_koerier);

		 $query_wachtwoord = "SELECT	*
		 FROM		`koerierwachtwoord`
		 WHERE		`wachtwoord` = '".$wachtwoord."'
		 AND         `koerier` = '".$record_koerier["id"]."';";

		 $result_wachtwoord = mysqli_query($conn, $query_wachtwoord);
		 $record_wachtwoord = mysqli_fetch_assoc($result_wachtwoord);
	 
		 if ( mysqli_num_rows($result_koerier) > 0 && mysqli_num_rows($result_wachtwoord) > 0)
		 {
			 $_SESSION["id"] = $record_koerier["id"];
			 $_SESSION["email"] = $record_koerier["email"];
			 $_SESSION["rol"] = $record_koerier["rol"];
			 $_SESSION["wachtwoord"] = $record_wachtwoord["wachtwoord"];

			 header("location:koerierhomepage.php");
		 }

		 else
		 {
			 echo "Uw inloggegevens zijn niet juist. Probeer opnieuw in te loggen.";
			 header("refresh:4; url=loginform_medewerker.php");
			 return;
		 }
	 }
        //Dit bepaald welke rol waar naartoe kan
        /*switch ($_SESSION["verified"])
				{
						case "1": {
							$email = $_SESSION["email"];
							$verzekeringsnummer = $_SESSION["verzekeringsnummer"];
							$subject = "Activeer uw login sessie";
							$message = "<html>
											<head>
												<style>
													body
													{
														font-size:12px;
														color: black;
													}
												</style>
											</head>
											<body>		
											Bedankt voor het inloggen, klik <a href='http://localhost/2017-2018/Goobbotheek/Goobbotheek/loginform2.php?verzekeringsnummer=".$verzekeringsnummer."'>hier</a> om uw inlog sessie af te maken. 
											</body>
										</html>";
							
							$headers = "From: goobbotheek@gmail.com\r\n";
							//$headers .= "Cc: hsok@mboutrecht.nl, gft@mboutrecht.nl\r\n";
							//$headers .= "Bcc: gnb@mboutrecht.nl, hpl@mboutrecht.nl\r\n";
							$headers .= "Content-Type: text/html; charset=UTF-8";
							mail($email, $subject, $message, $headers);
							echo "<font color='red' font size='100px'>Uw gegevens kloppen. U krijgt een email met daarin een verwijzingsmail die u maat aanklikken. U wordt teruggestuurd naar de homepage.</font>";
							header("refresh:6; url=login.php");
								 /*switch ($_SESSION["rol"])
								 {
								 case "1":
										 header("location: klanthomepage.php");
										 break;
								 case "2":
										 header("location: baliehomepage.php");
										 break;
								 case "3":
											header("location: eigenaarhomepage.php");
										 break;
									}
						}
						case "0": {
											echo "<font color='red' font size='25px'>U heeft uw account nog niet geverifieerd.";
										 header("refresh:50; url=loginform.php");
										 exit;
						}
				}

		}
		else
		{
			// Meldt de gebruiker dat hij een niet bestaand emailadres en wachtwoordcombinatie heeft gebruikt. Stuur hem door naar de login_form.php pagina
			echo "Het door u ingevulde email, verzekeringsnummer of geboortplaats is niet bekend, log opnieuw in.";
			header("refresh:5;url=loginform.php?content=.php");
		}*/
?>
