<?php
$database_select = $_SERVER["HTTP_HOST"];
switch ($database_select)
{
    case "localhost":
        $servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "apotheek";
        break;
    default:
        $servername = "mysql.hostinger.nl";
        $username = "u213695949_bas";
        $password = "Ikm4j0FRh4Vj";
        $dbname = "u213695949_goob";
        break;
}

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
//echo "Connected successfully";
//mysqli_close($conn);
?>
