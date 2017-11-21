<?php session_start();

$_SESSION['post-data'] = $_POST;

include("db_connect.php");

	if ( empty($_POST["email"]) || empty($_POST["wachtwoord"]))
	{
		echo "U heeft uw wachtwoord of emailadres niet ingevuld. Probeer het nogmaals";
		header("refresh:4; url=index.php?content=loginform.php");
	}
	else
	{

		$query_gebruiker = "SELECT	*
				  FROM		`gebruiker`
				  WHERE		`email`			= '".$_POST["email"]."'";

		$query_wachtwoord = "SELECT *
					FROM 		`wachtwoord`
					WHERE   `wachtwoord`= '".$_POST["wachtwoord"]."'";

		$query_gebruikerrol = "SELECT *
					FROM 		`gebruikerrol`
					WHERE   `gebruiker`= '".$_POST["email"]."'";



		$result_gebruiker = mysqli_query($conn, $query_gebruiker);

		$result_wachtwoord = mysqli_query($conn, $query_wachtwoord);

		$result_gebruikerrol = mysqli_query($conn, $query_gebruikerrol);

		if ( mysqli_num_rows($result_gebruiker) > 0 AND mysqli_num_rows($result_wachtwoord) > 0 AND mysqli_num_rows($result_gebruikerrol) > 0  )
		{
			// Meldt de gebruiker dat hij is ingelogd redirect naar homepage developer
			$record_gebruiker = mysqli_fetch_assoc($result_gebruiker);
			$record_wachtwoord = mysqli_fetch_assoc($result_wachtwoord);
			$record_gebruikerrol = mysqli_fetch_assoc($result_gebruikerrol);
			var_dump($record_gebruiker);
			var_dump($record_wachtwoord);
			var_dump($record_gebruikerrol);
			$_SESSION["gebruikernaam"] = $record_gebruiker["gebruikernaam"];
			$_SESSION["adres"] = $record_gebruiker["adres"];
			$_SESSION["email"] = $record_gebruiker["email"];
			$_SESSION["verifieerd"] = $record_gebruiker["verifieerd"];
			$_SESSION["wachtwoord"] = $record_wachtwoord["wachtwoord"];
			$_SESSION["rol"] = $record_gebruikerrol["rol"];


//Dit bepaald welke rol waar naartoe kan
switch ($_SESSION["verifieerd"])
				{
						case "1": {
								 switch ($_SESSION["rol"])
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
			echo "Het door u ingevulde email en/of wachtwoord is niet bekend, log opnieuw in.";
			header("refresh:2;url=index.php?content=.php");
		}
}
?>
