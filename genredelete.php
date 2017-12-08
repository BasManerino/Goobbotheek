<?php
 include("db_connect.php");

 $query = "DELETE FROM `genre`
WHERE   `genreid` = '".$_GET['id']."'";

$result = mysqli_query($conn, $query);

var_dump($result);

 echo "het genre is verwijderd.";
 header("refresh:10; url=genredeletetabel.php");
 ?>
