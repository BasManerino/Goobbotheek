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
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">
          <h1>Registreren</h1>
        </div>
        <div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form id="register" action="register.php" method="post" class="form">
            <h4>Registreer</h4>
            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Vul hier het e-mailadres in" />
            </br>
            <input type="text" name="verzekeringsnummer" id="verzekeringsnummer" class="form-control input-sm" placeholder="Vul hier het verzekeringsnummer in" />
            </br>
            <input type="text" name="geboorteplaats" id="geboortedatum" class="form-control input-sm" placeholder="Vul hier de geboorteplaats in" />
            </br>
            <input type="text" name="achternaam" id="achternaam" class="form-control input-sm" placeholder="Vul hier de achternaam in" />
            </br>
            <input type="text" name="telefoonnummer" id="telefoonnummer" class="form-control input-sm" placeholder="Vul hier het telefoonnummer in" />
            </br>
            <input type="text" name="adres" id="adres" class="form-control input-sm" placeholder="Vul hier het adres in" />
            </br>
            <input type="text" name="postcode" id="postcode" class="form-control input-sm" placeholder="Vul hier de postcode in" />
            </br>
            <input type="text" name="huisartsenpost" id="huisartsenpost" class="form-control input-sm" placeholder="Vul hier de huisartsenpost in" />
            </br>
            <select name="apotheker">
                    <option value="">Kies een apotheker</option>
                    <option value="Benu">Benu</option>
                    <option value="Alphega">Alphega</option>
                    <option value="Ganzenhoe">Ganzenhoe</option>
            </select>
            </br>
            </br>
            <select name="huisarts">
                    <option value="">Kies een huisarts</option>
                    <option value="De Groot">De Groot</option>
                    <option value="Born">Born</option>
                    <option value="Vreendie">Vreendie</option>
            </select>
            </br>
            </br>
            <input type="submit" name="submit" value="Registreer" class="w3-button w3-blue">
            </form>
            </div>

        </div>
    </div>
</div>

    <?php include 'footer.php';?>



  </div>
</body>
</html>
