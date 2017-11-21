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
          <h1>Login</h1>
        </div>
        <div class="container">
          <h6>Uw huisarts moet u eerst hebben geregistreerd!</h6>
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
          <form id="login" action="login_patient.php" method="post" class="form">
            <div class="form-login">
            <h4>Login</h4>
            <br>
            Email
            <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Vul hier uw email in" />
            </br>
            Verzekeringsnummer
            <input type="text" name="verzekeringsnummer" id="verzekeringsnummer" class="form-control input-sm" placeholder="Vul hier uw verzekeringsnummer in" />
            </br>
            Geboorteplaats
            <input type="text" name="geboorteplaats" id="geboorteplaats" class="form-control input-sm" placeholder="Vul hier uw geboorteplaats in" />
            </br>
            <div class="wrapper">
            <span class="group-btn">
                <input type="submit" name="inloggen" class="w3-button w3-blue" value="Inloggen">
            </span>
            </div>
            </div>
          </form>
        </div>
    </div>
</div>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
