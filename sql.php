<?php
include("db_connect.php");

$wachtwoord1 = 'apotheker123';

$beter1 = hash('sha512', $wachtwoord1);

$query = "INSERT INTO `apothekerwachtwoord`(
    `apotheker`,
    `wachtwoord`)
          VALUES 		 (
                1,
                '$beter1')";

var_dump($query);

$result = mysqli_query($conn, $query);

$wachtwoord2 = 'apotheker246';

$beter2 = hash('sha512', $wachtwoord2);

$query = "INSERT INTO `apothekerwachtwoord`(
    `apotheker`,
    `wachtwoord`)
          VALUES 		 (
                2,
                '$beter2')";

var_dump($query);

$result = mysqli_query($conn, $query);

$wachtwoord3 = 'apotheker369';

$beter3 = hash('sha512', $wachtwoord3);

$query = "INSERT INTO `apothekerwachtwoord`(
    `apotheker`,
    `wachtwoord`)
          VALUES 		 (
                3,
                '$beter3')";

var_dump($query);

$result = mysqli_query($conn, $query);

$wachtwoord4 = 'huisarts123';

$beter4 = hash('sha512', $wachtwoord4);

$query = "INSERT INTO `huisartswachtwoord`(
    `huisarts`,
    `wachtwoord`)
          VALUES 		 (
                1,
                '$beter4')";

var_dump($query);

$result = mysqli_query($conn, $query);

$wachtwoord5 = 'huisarts246';

$beter5 = hash('sha512', $wachtwoord5);

$query = "INSERT INTO `huisartswachtwoord`(
    `huisarts`,
    `wachtwoord`)
          VALUES 		 (
                2,
                '$beter5')";

var_dump($query);

$result = mysqli_query($conn, $query);

$wachtwoord6 = 'huisarts369';

$beter6 = hash('sha512', $wachtwoord6);

$query = "INSERT INTO `huisartswachtwoord`(
    `huisarts`,
    `wachtwoord`)
          VALUES 		 (
                3,
                '$beter6')";

var_dump($query);

$result = mysqli_query($conn, $query);

$wachtwoord7 = 'koerier123';

$beter7 = hash('sha512', $wachtwoord7);

$query = "INSERT INTO `koerierwachtwoord`(
    `koerier`,
    `wachtwoord`)
          VALUES 		 (
                1,
                '$beter7')";

var_dump($query);

$result = mysqli_query($conn, $query);
?>