<?php
    session_start();

    if(!isset($_SESSION['receptid']))
    {
        $_SESSION["receptid"] = $_POST["receptid"];
    }

    date_default_timezone_set("Europe/Amsterdam");
    $now = date("G:i");
    //var_dump($now);    
    $begin = ('00:00');
    $end = ('13:30');

    if(!isset($_SESSION['verzekeringsnummer']))
    {
        $_SESSION["verzekeringsnummer"] = $_POST["verzekeringsnummer"];
    }

    include("db_connect.php");
    $query = "SELECT	*
    FROM		`user`
    WHERE		`verzekeringsnummer` = '".$_SESSION["verzekeringsnummer"]."';";

    $result_select = mysqli_query($conn, $query);

    $record = mysqli_fetch_assoc($result_select);

    $_SESSION["rol"] = $record["rol"];
    $_SESSION["verzekeringsnummer"] = $record["verzekeringsnummer"];
    $_SESSION["email"] = $record["email"];
    $_SESSION["achternaam"] = $record["achternaam"];
    $_SESSION["geboorteplaats"] = $record["geboorteplaats"];
    $_SESSION["adres"] = $record["adres"];
    $_SESSION["telefoonnummer"] = $record["telefoonnummer"];
    $_SESSION["postcode"] = $record["postcode"];
    $_SESSION["apotheker"] = $record["apotheker"];
    $_SESSION["huisarts"] = $record["huisarts"];
    $_SESSION["huisartsenpost"] = $record["post"];
    $_SESSION["verified"] = $record["verified"];
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
  <script type="text/javascript" src="moment.js" charset="UTF-8"></script>
  <script type="text/javascript" src="datetimepicker/sample in bootstrap v2/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  
</head>
<body>
  <div id="container">
    <?php include 'navbar.php';?>
        <div id="Content">
            <div class="col-md-offset-5 col-md-3 col-xs-12">
                <h4>Levertijd wijzigen</h4>
                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                        <form id=".form_datetime" action="levertijd_wijzigen_parse.php" method="post" class="form-horizontal">
                            <div class="form-group">
                            <?php
                            if ($now >= $begin && $now <= $end)
                            {
                                echo "<div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class='form-control' name='leverdata'/>
                                    <span style='width: 14%' class='input-group-addon'>
                                        <span style='width: 14%' class='glyphicon glyphicon-calendar'></span>
                                    </span>
                                </div>";
                            }
                            else
                            {
                                echo "<div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class='form-control' name='leverdata'/>
                                    <span style='width: 14%' class='input-group-addon'>
                                        <span style='width: 14%' class='glyphicon glyphicon-calendar'></span>
                                    </span>
                                </div>";
                            }
                            ?>
                                <input type="submit" name="submit" value="Verzenden" class="w3-button w3-blue" style="margin-top: 150px;">
                                <script type="text/javascript">
                                $(function () {
                                    var start = new Date();
                                    $('#datetimepicker1').datetimepicker({
                                        startDate: start,
                                        format: "dd-mm-yyyy hh:ii",
                                        locale: 'ru',
                                        autoclose: true,
                                        hoursDisabled: '0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14',
                                        minuteStep: 10
                                    });
                                });
                                </script>
                                <script type="text/javascript">
                                $(function () {
                                    var start = new Date();
                                    //start.setDate(start.getDate() + 1);
                                    $('#datetimepicker2').datetimepicker({
                                        startDate: start,
                                        format: "dd-mm-yyyy hh:ii",
                                        locale: 'ru',
                                        autoclose: true,
                                        datesDisabled: [new Date()],
                                        hoursDisabled: '0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14',
                                        minuteStep: 10
                                    });
                                });
                                </script>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php //include 'footer.php';?>
  </div>
</body>
</html>
