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
  <link href="sample in bootstrap v2/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="datetimepicker/sample in bootstrap v2/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
  <script type="text/javascript" src="datetimepicker/sample in bootstrap v2/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">
        <?php
            date_default_timezone_set("Europe/Amsterdam");
            $date = date("yyyy-m-d HH:i:ss");
        ?>
          <div class="row">
              <div class="col-md-offset-5 col-md-3">
                  <form id="recept" action="receptschrijven_parse.php" method="post" class="form">
                  <h4>Recept</h4>
                  <input ypet="text" name="verzekeringsnummer" id="verzekeringsnummer" class="form-control input-sm" placeholder="Verzekeringsnummer patiënt" />
                  <br><br>
                  <input type="text" name="medicijn1" id="medicijn1" class="form-control input-sm" placeholder="Naam medicijn 1" />
                <br>  <select name="aantal1">
                    <option value="">Kies een aantal</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                  <br><br><br>
                  <input type="text" name="medicijn2" id="medicijn2" class="form-control input-sm" placeholder="Naam medicijn 2" />
                <br>  <select name="aantal2">
                    <option value="">Kies een aantal</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                  <br><br><br>
                  <input type="text" name="medicijn3" id="medicijn3" class="form-control input-sm" placeholder="Naam medicijn 3" />
              <br>   <select name="aantal3">
                    <option value="">Kies een aantal</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                  <br><br><br>
                  <input type="text" name="medicijn4" id="medicijn4" class="form-control input-sm" placeholder="Naam medicijn 4" />
              <br>   <select name="aantal4">
                    <option value="">Kies een aantal</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                  <br><br><br>
                  <input type="text" name="medicijn5" id="medicijn5" class="form-control input-sm" placeholder="Naam medicijn 5" />
              <br>   <select name="aantal5">
                    <option value="">Kies een aantal</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
           <br>
           <br>
           <br>
           Huidige leverdata
           <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" name="leverdata"/>
                                    <span style="width: 14%" class="input-group-addon">
                                        <span style="width: 14%" class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker2').datetimepicker({
                                        format: "yyyy-mm-dd hh:ii:00",
                                        locale: 'ru',
                                        autoclose: true,
                                        hoursDisabled: '0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14',
                                        minuteStep: 10,
                                    });
                                });
                                </script>
            <br>
            <br>
            Oude datum (Alleen invoeren als de leverdata afwijkt van de afspraak)
            <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" name="oud"/>
                                    <span style="width: 14%" class="input-group-addon">
                                        <span style="width: 14%" class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker3').datetimepicker({
                                        format: "yyyy-mm-dd hh:ii:00",
                                        locale: 'ru',
                                        autoclose: true,
                                        hoursDisabled: '0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14',
                                        minuteStep: 10,
                                    });
                                });
                                </script>
          <br>
          <br>
          <br>
          In het geval van een leverdata afwijking, kies hier een reden.
          <select name="afwijking">
                    <option value="">Kies een reden</option>
                    <option value="Medicijn niet op voorraad">Medicijn niet op voorraad</option>
                  </select>

      <input type="submit" name="submit" value="Verzenden" class="w3-button w3-blue" style="margin-top: 100px;">
                  </form>
                  </div>
        </div>
        <br>
        <br>
    <?php include 'footer.php';?>
  </div>
</body>
</html>
