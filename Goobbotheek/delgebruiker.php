<?php
include 'db_connect.php';
$id = $_GET['id'];
$email_query = "SELECT * FROM `gebruiker` WHERE `email` = '".$id."';";

    $email_result = mysqli_query($conn, $email_query);

    $email_record = mysqli_fetch_assoc($email_result);

     $query_user = "SELECT  *
                  FROM       `gebruiker`
                  WHERE      `email`            = '".$id."';";

     $result_user = mysqli_query($conn, $query_user);

     if ( mysqli_num_rows($result_user) > 0)
     {
         $record_user = mysqli_fetch_assoc($result_user);
             //var_dump($record_user);
               $_SESSION["email"] = $record_user["email"];
               $_SESSION["blocked"] = $record_user["blocked"];

         switch ($_SESSION["blocked"])
         {
              case "0":
                         $query_blo = "UPDATE   `gebruiker`
                         SET    `blocked` = 1
                         WHERE  `email` = '".$id."'";

                         $result_blo = mysqli_query($conn, $query_blo);
                         if ($result_blo)
                         {
                                echo "U heeft deze gebruiker succesvol geblokkeerd. Gebruikers die geblokkeerd zijn kunnen geen video's bestellen, maar kunnen wel video's bekijken en hun accountgegevens bekijken en wijzigen. U wordt teruggestuurd naar de blokkeerpagina.";
                                header("refresh:8; url=gebruikers.php");
                                exit;
                         }
                         else
                         {
                                echo "Er ging iets fout bij het blokkeren. Probeer het opnieuw.";
                                header("refresh:4; url=gebruikers.php");
                                exit;
                         }
              case "1":
                         $query_de = "UPDATE    `gebruiker`
                         SET    `blocked` = 0
                         WHERE  `email` = '".$id."'";

                         $result_de = mysqli_query($conn, $query_de);
                         if ($result_de)
                         {
                                echo "U heeft deze gebruiker succesvol gedeblokkeerd. Gebruikers die niet geblokkeerd zijn hebben normale toegang tot alle toebehorende website rechten. U wordt teruggestuurd naar de blokkeerpagina.";
                                header("refresh:8; url=gebruikers.php");
                                exit;
                         }
                         else
                         {
                                echo "Er ging iets fout bij het deblokkeren. Probeer het opnieuw.";
                                header("refresh:4; url=gebruikers.php");
                                exit;
                         }
              }
     }
     ?>
