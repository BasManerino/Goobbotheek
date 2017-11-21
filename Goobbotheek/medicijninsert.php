<?php session_start();
  //var_dump($_POST);
  include("db_connect.php");

  //var_dump($_POST);
  date_default_timezone_set("Europe/Amsterdam");
  $date = date("d-m-Y H:i:s");
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

  if(!isset($_POST["naam"]) || trim($_POST["naam"]) == '' OR
      !isset($_POST["omschrijving"]) || trim($_POST["omschrijving"]) == '' OR
      !isset($_POST["aantal"]) || trim($_POST["aantal"]) == '' OR
      !isset($_POST["maximaal"]) || trim($_POST["maximaal"]) == '')
      {
       echo "U heeft een of meer velden niet ingevuld. Probeer het opnieuw.";
       header("refresh:4; url=medicijninsertform.php");
       exit;
   }

   /*$select_title = ("SELECT `naam` FROM `medicijn` WHERE `naam` = '".$_POST["naam"]."'");
       $negative_title_result = mysqli_query($conn, $select_title);

       if(mysqli_num_rows($negative_title_result) > 0)
       {
           echo "Deze naam is al in gebruik. Voer een andere in.";
           header("refresh:4; url=medicijninsertform.php");
           exit;
       }*/
     //var_dump($combinatie);
    //  $columns = implode(", ",array_keys($combinatie));
    //  $escaped_values = array_map('mysqli_real_escape_string', array_values($combinatie));
    //  $values  = implode(", ", $escaped_values);  

     $naam = mysqli_real_escape_string($conn, $_POST["naam"]);
     $omschrijving = mysqli_real_escape_string($conn, $_POST["omschrijving"]);
     $aantal = mysqli_real_escape_string($conn, $_POST["aantal"]);
     $maximaal = mysqli_real_escape_string($conn, $_POST["maximaal"]);

$query_algemeen = "INSERT INTO `medicijn`
                                (`id`,
                                 `naam`,
                                 `omschrijving`)

                     VALUES     (NULL,
                                 '".$naam."',
                                 '".$omschrijving."')";

       //var_dump($query_algemeen);

       $result_algemeen = mysqli_query($conn, $query_algemeen);

       $last_id = mysqli_insert_id($conn);


              $query_aantal = "INSERT INTO `aantal`
                                            (`medicijn`,
                                             `aantal`,
                                             `maximaal`)

                                 VALUES     ('".$last_id."',
                                             '".$aantal."',
                                             '".$maximaal."')";

              //var_dump($query_aantal);

              $result_aantal = mysqli_query($conn, $query_aantal);

              //var_dump($_POST["combinatie"]);
              
            if(isset($_POST["combinatie"]))
            {
                foreach($_POST["combinatie"] as $medicijn)
                {
                $select = ("SELECT * FROM `medicijn` WHERE `id` = ".$medicijn."");
                //var_dump($select);
                $result = mysqli_query($conn, $select);
                $record = mysqli_fetch_assoc($result);
                $sql = array(); 
                    $sql[] = $record['id'];

                                $query_combinatie = "INSERT INTO combinatie (medicijn, verbodenMedicijn) VALUES ('$last_id','".implode('\',\'', $sql)."')";

                //var_dump($query_combinatie);
  
                $result_combinatie = mysqli_query($conn, $query_combinatie);
                }
                
            }

              if ($query_algemeen)
                {
                    echo "Het medicijn is succesvol toegevoegd";
                    //header("refresh:5; url=medicijninsertform.php");
                    exit();
                }

                else
                {
                    echo "Er is iets fout gegaan!";
                    //header("refresh:6; url=medicijninsertform.php");
                    exit();
                }

                mysqli_close($conn);
?>
  </div>
</body>
</html>