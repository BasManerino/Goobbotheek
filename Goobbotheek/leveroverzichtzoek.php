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
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <style  type="text/css" media="screen">
  ul  li{
    list-style-type:none;
  }
  </style>
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">
          <table class="table w3-table-all">
              <thead>
                  <tr>
                      <th>Achternaam</th>
                      <th>Verzekeringsnummer</th>
                  </tr>
              </thead>
          <?php
            include 'db_connect.php';
            if(isset($_POST['submit'])){
            if(isset($_GET['go'])){
            if(preg_match("/^[  a-zA-Z]+/", $_POST['achternaam'])){
            $name=$_POST['achternaam'];
            $sql="SELECT achternaam, verzekeringsnummer FROM user WHERE achternaam LIKE '%" . $name .  "%'";
            //-run  the query against the mysql query function
            $result=mysqli_query($conn,$sql);
            //-create  while loop and loop through result set
            while($row=mysqli_fetch_array($result)){
                    $achternaam=$row['achternaam'];
                    $verzekeringsnummer=$row['verzekeringsnummer'];
            //-display the result of the array
            echo "<tr>
                   <td>". $row["achternaam"]."</td>
                   <td>". $row["verzekeringsnummer"]."</td>
                     <td><td><a href='leveroverzicht.php?value=".$row['verzekeringsnummer']."'  class='w3-button w3-block w3-blue'>Leveroverzicht Bekijken</a></td></td>
                 </tr>";
            }
            }
            else{
            echo  "<p>Voer een achternaam in</p>";
            }
            }
            }
          ?>


        </div>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
