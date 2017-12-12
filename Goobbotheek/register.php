<?php session_start();
  //ini_set("xdebug.var_display_max_children", -1);
  //ini_set("xdebug.var_display_max_data", -1);
  //ini_set("xdebug.var_display_max_depth", -1);
  //var_dump($_POST);
  include("db_connect.php");

  //var_dump($_POST);
  date_default_timezone_set("Europe/Amsterdam");
  $date = date("d-m-Y H:i:s");

    if
       (!isset($_POST["email"]) || trim($_POST["email"]) == '' OR
       !isset($_POST["verzekeringsnummer"]) || trim($_POST["verzekeringsnummer"]) == '' OR
       !isset($_POST["geboorteplaats"]) || trim($_POST["geboorteplaats"]) == '' OR
       !isset($_POST["achternaam"]) || trim($_POST["achternaam"]) == '' OR
       !isset($_POST["telefoonnummer"]) || trim($_POST["telefoonnummer"]) == '' OR
       !isset($_POST["adres"]) || trim($_POST["adres"]) == '' OR
       !isset($_POST["postcode"]) || trim($_POST["postcode"]) == '' OR
       !isset($_POST["huisartsenpost"]) || trim($_POST["huisartsenpost"]) == '' OR
       !isset($_POST["apotheker"]) || trim($_POST["apotheker"]) == '' OR
       !isset($_POST["huisarts"]) || trim($_POST["huisarts"]) == '')
       
       {
           echo "<font size='100px'>U heeft niet genoeg gegevens ingevoerd. Probeer het opnieuw.</font>";
           header("refresh:4; url=registerform.php");
           exit;
       }

       $selectApotheker = "SELECT id FROM `apotheker` where `naam` = '".$_POST["apotheker"]."'";
       //var_dump($selectApotheker);
       $select_resultApotheker = mysqli_query($conn, $selectApotheker);
       $record_selectApotheker = mysqli_fetch_assoc($select_resultApotheker);

       $selectHuisarts = "SELECT id FROM `huisarts` where `naam` = '".$_POST["huisarts"]."'";
       //var_dump($selectHuisarts);
       $select_resultHuisarts = mysqli_query($conn, $selectHuisarts);
       $record_selectHuisarts = mysqli_fetch_assoc($select_resultHuisarts);

  $query = "INSERT INTO `user`(
                   `email`,
                   `verzekeringsnummer`,
                   `geboorteplaats`,
                   `achternaam`,
                   `telefoonnummer`,
                   `adres`,
                   `postcode`,
                   `post`,                   `apotheker`,
                   `huisarts`)
        VALUES 		 (
                   '".$_POST["email"]."',
                   '".$_POST["verzekeringsnummer"]."',
                   '".$_POST["geboorteplaats"]."',
                   '".$_POST["achternaam"]."',
                   '".$_POST["telefoonnummer"]."',
                   '".$_POST["adres"]."',
                   '".$_POST["postcode"]."',
                   '".$_POST["huisartsenpost"]."',
                   '".$record_selectApotheker["id"]."',
                   '".$record_selectHuisarts["id"]."')";

  $result = mysqli_query($conn, $query);

  //var_dump($query);

  //var_dump($result);


if ( $result )
  {
    $email = $_POST["email"];
    $subject = "Activatie voor apotheek Goobbotheek";
    $message = "<html>
            <head>
              <style>
                body
                {
                  font-size:16px;
                  color: black;
                  font-family: Verdana;
                }
              </style>
            </head>
            <body> <h3> Activatiemail apotheek Goobbotheek </h3>
            Uw huisarts heeft u geregistreerd, klik <a href='www.goobbotheek.com/activatie.php?email=".$email."'>hier</a> om uw account te activeren.
            </body>
          </html>";


    $headers = "From: goobbotheekautoreply@gmail.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8";


    mail($email, $subject, $message, $headers);
    echo "Uw gegevens zijn correct door ons ontvangen. U ontvangt een bevestigings e-mail met daarin een activatielink. Voor het kunnen inloggen is het nodig dat u uw account op deze manier activeerd. U wordt doorgestuurd naar de loginpagina.";
    //header("refresh:20; url=loginform.php");

}
else
{
 echo ("Query fout");
//header("refresh:12; url=index.php?content=registerform.php");
}

?>
