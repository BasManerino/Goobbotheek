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
  //var_dump($_POST);
  include("db_connect.php");

  //var_dump($_POST);
  date_default_timezone_set("Europe/Amsterdam");
  $date = date("d-m-Y H:i:s");

    if
       (!isset($_POST["verzekeringsnummer"]) || trim($_POST["verzekeringsnummer"]) == '' OR
       !isset($_POST["medicijn1"]) || trim($_POST["medicijn1"]) == '' OR
       !isset($_POST["aantal1"]) || trim($_POST["aantal1"]) == '' OR
       !isset($_POST["leverdata"]) || trim($_POST["leverdata"]) == '' )
       {
           echo "<font size='100px'>U heeft niet genoeg gegevens ingevoerd. Probeer het opnieuw.</font>";
           header("refresh:4; url=receptschrijven.php");
           exit;
       }
       $select = "SELECT * FROM `user` where `verzekeringsnummer` = '".$_POST["verzekeringsnummer"]."' LIMIT 1";
       $result = mysqli_query($conn, $select);
       $record = mysqli_fetch_assoc($result);

       $select1 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn1"]."' LIMIT 1";
       $select_result1 = mysqli_query($conn, $select1);
       $record_select1 = mysqli_fetch_assoc($select_result1);

       $select_aantal_1 = "SELECT * FROM `aantal` where `medicijn` = '".$record_select1["id"]."'";
       $result_aantal_1 = mysqli_query($conn, $select_aantal_1);
       $aantal_1 = mysqli_fetch_assoc($result_aantal_1);

       if ($_POST["aantal1"] > $aantal_1["aantal"])
       {
           echo "<font size='100px'>Er is helaas niet genoeg van het eerste medicijn beschikbaar om dit recept te voltooien. U wordt teruggestuurd naar de recept toevoeg pagina.</font>";
           //header("refresh:4; url=receptschrijven.php");
           return;
       }

       if(isset($_POST["medicijn2"]) && isset($_POST["aantal2"]))
       {
        $select2 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn2"]."' LIMIT 2";
        $select_result2 = mysqli_query($conn, $select2);
        $record_select2 = mysqli_fetch_assoc($select_result2);
 
        $select_aantal_2 = "SELECT * FROM `aantal` where `medicijn` = '".$record_select2["id"]."'";
        $result_aantal_2 = mysqli_query($conn, $select_aantal_2);
        $aantal_2 = mysqli_fetch_assoc($result_aantal_2);

            if ($_POST["aantal2"] > $aantal_2["aantal"])
            {
                echo "<font size='200px'>Er is helaas niet genoeg van het tweede medicijn beschikbaar om dit recept te voltooien. U wordt teruggestuurd naar de recept toevoeg pagina.</font>";
                header("refresh:4; url=receptschrijven.php");
                return;
            }
        }

       if(isset($_POST["medicijn3"]) && isset($_POST["aantal3"]))
       { 
        $select3 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn3"]."' LIMIT 3";
        $select_result3 = mysqli_query($conn, $select3);
        $record_select3 = mysqli_fetch_assoc($select_result3);
 
        $select_aantal_3 = "SELECT * FROM `aantal` where `medicijn` = '".$record_select3["id"]."'";
        $result_aantal_3 = mysqli_query($conn, $select_aantal_3);
        $aantal_3 = mysqli_fetch_assoc($result_aantal_3);

            if ($_POST["aantal3"] > $aantal_3["aantal"])
            {
                echo "<font size='300px'>Er is helaas niet genoeg van het derde medicijn beschikbaar om dit recept te voltooien. U wordt teruggestuurd naar de recept toevoeg pagina.</font>";
                header("refresh:4; url=receptschrijven.php");
                return;
            }
        }
       
        /*if(isset($_POST["medicijn4"]) && isset($_POST["aantal4"]))
        { 
            $select4 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn4"]."' LIMIT 4";
            $select_result4 = mysqli_query($conn, $select4);
            $record_select4 = mysqli_fetch_assoc($select_result4);
     
            $select_aantal_4 = "SELECT * FROM `aantal` where `medicijn` = '".$record_select4["id"]."'";
            $result_aantal_4 = mysqli_query($conn, $select_aantal_4);
            $aantal_4 = mysqli_fetch_assoc($result_aantal_4);
 
            if ($_POST["aantal4"] > $aantal_4["aantal"])
            {
                echo "<font size='400px'>Er is helaas niet genoeg van het vierde medicijn beschikbaar om dit recept te voltooien. U wordt teruggestuurd naar de recept toevoeg pagina.</font>";
                header("refresh:4; url=receptschrijven.php");
                return;
            }
        }*/

        if(isset($_POST["medicijn5"]) && isset($_POST["aantal5"]))
        { 
            $select5 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn5"]."' LIMIT 5";
            $select_result5 = mysqli_query($conn, $select5);
            $record_select5 = mysqli_fetch_assoc($select_result5);
     
            $select_aantal_5 = "SELECT * FROM `aantal` where `medicijn` = '".$record_select5["id"]."'";
            $result_aantal_5 = mysqli_query($conn, $select_aantal_5);
            $aantal_5 = mysqli_fetch_assoc($result_aantal_5);
  
            if ($_POST["aantal5"] > $aantal_5["aantal"])
            {
                echo "<font size='500px'>Er is helaas niet genoeg van het vijfde medicijn beschikbaar om dit recept te voltooien. U wordt teruggestuurd naar de recept toevoeg pagina.</font>";
                header("refresh:4; url=receptschrijven.php");
                return;
            }
        }

  $select1 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn1"]."' LIMIT 1";
  $select_result1 = mysqli_query($conn, $select1);
  $record_select1 = mysqli_fetch_assoc($select_result1);

  $select2 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn2"]."' LIMIT 1";
  $select_result2 = mysqli_query($conn, $select2);
  $record_select2 = mysqli_fetch_assoc($select_result2);

  $select3 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn3"]."' LIMIT 1";
  $select_result3 = mysqli_query($conn, $select3);
  $record_select3 = mysqli_fetch_assoc($select_result3);

  $select4 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn4"]."' LIMIT 1";
  $select_result4 = mysqli_query($conn, $select4);
  $record_select4 = mysqli_fetch_assoc($select_result4);

  $select5 = "SELECT id FROM `medicijn` where `naam` = '".$_POST["medicijn5"]."' LIMIT 1";
  $select_result5 = mysqli_query($conn, $select5);
  $record_select5 = mysqli_fetch_assoc($select_result5);

  if(isset($_POST["medicijn1"]))
  {
  $select_combinatie1 = "SELECT * FROM `combinatie` WHERE medicijn = '".$record_select1["id"]."' AND verbodenMedicijn = '".$record_select2["id"]."' OR medicijn = '".$record_select1["id"]."' AND verbodenMedicijn = '".$record_select3["id"]."' OR medicijn = '".$record_select1["id"]."' AND verbodenMedicijn = '".$record_select4["id"]."' OR medicijn = '".$record_select1["id"]."' AND verbodenMedicijn = '".$record_select5["id"]."'";
  //var_dump($select_combinatie1);
  $result_combinatie1 = mysqli_query($conn, $select_combinatie1);
  $record_combinatie1 = mysqli_fetch_assoc($result_combinatie1);
  }

  if(isset($_POST["medicijn2"]))
  {
  $select_combinatie2 = "SELECT * FROM `combinatie` WHERE medicijn = '".$record_select2["id"]."' AND verbodenMedicijn = '".$record_select1["id"]."' OR medicijn = '".$record_select2["id"]."' AND verbodenMedicijn = '".$record_select3["id"]."' OR medicijn = '".$record_select2["id"]."' AND verbodenMedicijn = '".$record_select4["id"]."' OR medicijn = '".$record_select2["id"]."' AND verbodenMedicijn = '".$record_select5["id"]."'";
  //var_dump($select_combinatie2);
  $result_combinatie2 = mysqli_query($conn, $select_combinatie2);
  $record_combinatie2 = mysqli_fetch_assoc($result_combinatie2);
  }

  if(isset($_POST["medicijn3"]))
  {
  //var_dump($select_combinatie2);
  $select_combinatie3 = "SELECT * FROM `combinatie` WHERE medicijn = '".$record_select3["id"]."' AND verbodenMedicijn = '".$record_select1["id"]."' OR medicijn = '".$record_select3["id"]."' AND verbodenMedicijn = '".$record_select2["id"]."' OR medicijn = '".$record_select3["id"]."' AND verbodenMedicijn = '".$record_select4["id"]."' OR medicijn = '".$record_select3["id"]."' AND verbodenMedicijn = '".$record_select5["id"]."'";
  $result_combinatie3 = mysqli_query($conn, $select_combinatie3);
  $record_combinatie3 = mysqli_fetch_assoc($result_combinatie3);
  }

  if(isset($_POST["medicijn4"]))
  {
    //var_dump($select_combinatie2);
  $select_combinatie4 = "SELECT * FROM `combinatie` WHERE medicijn = '".$record_select4["id"]."' AND verbodenMedicijn = '".$record_select1["id"]."' OR medicijn = '".$record_select4["id"]."' AND verbodenMedicijn = '".$record_select2["id"]."' OR medicijn = '".$record_select4["id"]."' AND verbodenMedicijn = '".$record_select3["id"]."' OR medicijn = '".$record_select4["id"]."' AND verbodenMedicijn = '".$record_select5["id"]."'";
  $result_combinatie4 = mysqli_query($conn, $select_combinatie4);
  $record_combinatie4 = mysqli_fetch_assoc($result_combinatie4);
  }

  if(isset($_POST["medicijn5"]))
  {
    //var_dump($select_combinatie2);
  $select_combinatie5 = "SELECT * FROM `combinatie` WHERE medicijn = '".$record_select5["id"]."' AND verbodenMedicijn = '".$record_select1["id"]."' OR medicijn = '".$record_select5["id"]."' AND verbodenMedicijn = '".$record_select2["id"]."' OR medicijn = '".$record_select5["id"]."' AND verbodenMedicijn = '".$record_select3["id"]."' OR medicijn = '".$record_select5["id"]."' AND verbodenMedicijn = '".$record_select4["id"]."'";
  $result_combinatie5 = mysqli_query($conn, $select_combinatie5);
  $record_combinatie5 = mysqli_fetch_assoc($result_combinatie5);
  }

  if    (mysqli_num_rows($result_combinatie1) > 0 OR mysqli_num_rows($result_combinatie2) > 0 OR mysqli_num_rows($result_combinatie3) > 0 OR mysqli_num_rows($result_combinatie4) > 0 OR mysqli_num_rows($result_combinatie5) > 0)
        {
            echo "<font size='500px'>Deze medicijnen gaan helaas niet samen. Kies een andere.</font>";
            header("refresh:4; url=receptschrijven.php");
            return;
        }

  $query = "INSERT INTO `recept`(
                   `id`,
                   `patient`,
                   `leverdata`)
        VALUES 			  (
                   NULL,
                   '".$_POST["verzekeringsnummer"]."',
                   '".$_POST["leverdata"]."')";

  //var_dump($query);

  $result = mysqli_query($conn, $query);

  $last_id = mysqli_insert_id($conn);

  if (isset($_POST["medicijn1"]) && isset($_POST["aantal1"]))
  {
  $query1 = "INSERT INTO `receptmedicijn`(
    `medicijn`,
    `recept`,
    `aantalMedicijnen`)
    VALUES (
    '".$record_select1["id"]."',
    '".$last_id."',
    '".$_POST["aantal1"]."')";

    $result1 = mysqli_query($conn, $query1);

    //var_dump($query1);
  }

  if (isset($_POST["medicijn2"]) && isset($_POST["aantal2"]))
  {
      $query2 = "INSERT INTO `receptmedicijn`(
    `medicijn`,
    `recept`,
    `aantalMedicijnen`)
    VALUES (
    '".$record_select2["id"]."',
    '".$last_id."',
    '".$_POST["aantal2"]."')";

      $result2 = mysqli_query($conn, $query2);

      //var_dump($query2);
  }

  if (isset($_POST["medicijn3"]) && isset($_POST["aantal3"]))
  {
      $query3 = "INSERT INTO `receptmedicijn`(
    `medicijn`,
    `recept`,
    `aantalMedicijnen`)
    VALUES (
    '".$record_select3["id"]."',
    '".$last_id."',
    '".$_POST["aantal3"]."')";

      $result3 = mysqli_query($conn, $query3);

      //var_dump($query3);
  }

  if (isset($_POST["medicijn4"]) && isset($_POST["aantal4"]))
  {
      $query4 = "INSERT INTO `receptmedicijn`(
    `medicijn`,
    `recept`,
    `aantalMedicijnen`)
    VALUES (
    '".$record_select4["id"]."',
    '".$last_id."',
    '".$_POST["aantal4"]."')";

      $result4 = mysqli_query($conn, $query4);

      //var_dump($query4);
  }

  if (empty($_POST["medicijn5"]) && empty($_POST["aantal5"]))
  {
      $query5 = "INSERT INTO `receptmedicijn`(
    `medicijn`,
    `recept`,
    `aantalMedicijnen`)
    VALUES (
    '".$record_select5["id"]."',
    '".$last_id."',
    '".$_POST["aantal5"]."')";

      $result5 = mysqli_query($conn, $query5);

      //var_dump($query5);
  }

   if ($select_result1)
   {
       $query = "UPDATE `aantal`
       SET              `aantal` = `aantal` - '".$_POST["aantal1"]."'
       WHERE            `medicijn` = '".$record_select1["id"]."'";

       $result = mysqli_query($conn, $query);
   }

   if ($select_result2)
   {
       $query = "UPDATE `aantal`
       SET              `aantal` = `aantal` - '".$_POST["aantal2"]."'
       WHERE            `medicijn` = '".$record_select2["id"]."'";

       $result = mysqli_query($conn, $query);
   }

   if ($select_result3)
   {
       $query = "UPDATE `aantal`
       SET              `aantal` = `aantal` - '".$_POST["aantal3"]."'
       WHERE            `medicijn` = '".$record_select3["id"]."'";

       $result = mysqli_query($conn, $query);
   }

   if ($select_result4)
   {
       $query = "UPDATE `aantal`
       SET              `aantal` = `aantal` - '".$_POST["aantal4"]."'
       WHERE            `medicijn` = '".$record_select4["id"]."'";

       $result = mysqli_query($conn, $query);
   }

   if ($select_result5)
   {
       $query = "UPDATE `aantal`
       SET              `aantal` = `aantal` - '".$_POST["aantal5"]."'
       WHERE            `medicijn` = '".$record_select5["id"]."'";

       $result = mysqli_query($conn, $query);
   }

   if($_POST['afwijking'] == '')
   {
    $afwijking = "<html>
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
                    </body>
                    </html>";              
   }

   else
   {
    $afwijking = "<html>
    <head>
        <style>
            body
            {
                font-size:12px;
                color: black;
            }
        </style>
    </head>
    <body>LET OP: De huidige leverdata wijkt af van de afgesproken leverdata.
                    <br>
                    Reden: ".$_POST["afwijking"]."
                    <br>
                    Huidige leverdata: ".$_POST["leverdata"]."
                    <br>
                    Afgesproken leverdata: ".$_POST["oud"]."
                    
                    </body>
                    </html>";  
   }

if ( $result )
  {
    $email = $record["email"];
    $verzekeringsnummer = $_POST["verzekeringsnummer"];
    $receptid = $last_id;
    $subject = "Mogelijkheid levertijd wijzigen Goobbotheek";
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
                    Uw huisarts heeft uw recept aangemaakt, klik <a href='www.goobbotheek.com/loginform2.php?verzekeringsnummer=".$verzekeringsnummer."'>hier</a> om de leverdata te wijzigen indien gewenst. Hier moet u uw verzekeringsnummer nog een keer invoeren en ook de recept ID die in deze mail staat.
                    <br>
                    Recept ID: ".$last_id."
                    <br>
                    Leverdata: ".$_POST['leverdata']."

                    <br>
                    <br>
                    ".$afwijking."
                    </body>
                </html>";
    
    $headers = "From: goobbotheek@gmail.com\r\n";
    //$headers .= "Cc: hsok@mboutrecht.nl, gft@mboutrecht.nl\r\n";
    //$headers .= "Bcc: gnb@mboutrecht.nl, hpl@mboutrecht.nl\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8";
    mail($email, $subject, $message, $headers);
    echo "Het recept is geslaagd. De patient zal een email krijgen met daarin een verwijzing om de leverdata te wijzigen indien zij dit wensen. U wordt doorgestuurd naar de toevoeg pagina.";
    header("refresh:5; url=receptschrijven.php");
}
else
{
 echo ("Query fout");
 //header("refresh:5; url=receptschrijven.php");
}

?>
</div>

        
    <?php include 'footer.php';?>
  </div>
  </div>
</body>
</html>