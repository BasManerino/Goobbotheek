<?php
session_start();
include("db_connect.php");


if(isset($_POST["allergie"])){
  if (is_array($_POST["allergie"])) {
    $nietOntvangen = 1;
    foreach($_POST["allergie"] as $value){
      $query_allergie = "INSERT INTO `usermedicijn`
                                      ( `patient`,
                                        `medicijn`,
                                      `nietOntvangen`)

                           VALUES     ('".$_POST["verzekeringsnummer"]."',
                                        '".$value."',
                                       '".$nietOntvangen."')";


             $result_allergie = mysqli_query($conn, $query_allergie);
var_dump($query_allergie);
    }
  } else {
      echo "Geen medicijnen aangevinkt";
  }
}

?>
