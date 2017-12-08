<?php
	//var_dump($_POST);
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
	include_once("db_connect.php");

	$query = "UPDATE `medicijn`
			  SET 	 `naam` 		= '".$_POST['naam']."',
					 `omschrijving` 	= '".$_POST['omschrijving']."'
			  WHERE  `id` 				= '".$_POST['id']."';";

	mysqli_query($conn, $query) or die("Query-fout: ".mysqli_error());

				$aantquery = "UPDATE `aantal`
						  SET 	 `aantal` 		= '".$_POST['aantal']."',
						         `maximaal`     = '".$_POST['maximaal']."'
						  WHERE  `medicijn` 				= '".$_POST['id']."';";


	mysqli_query($conn, $aantquery) or die("Query-fout: ".mysqli_error());

	/*$query2 = "SELECT verbodenMedicijn FROM combinatie where medicijn = ".$_POST["id"]." AND verbodenMedicijn = ".$recordCheck."";
	// var_dump($query2);
	$result2 = mysqli_query($conn, $query2);
	// var_dump($result2);
	$record2 = mysqli_fetch_assoc($result2);
	// var_dump($record2);*/

	if(isset($_POST["combinatie"]))
	{

	foreach($_POST["combinatie"] as $medicijn)
	{
			//var_dump($_POST["combinatie"]);
			$id = $_POST["id"];
			//var_dump($id);
			$select = ("SELECT * FROM `medicijn` WHERE `id` = ".$medicijn."");
			//var_dump($select);
			$result = mysqli_query($conn, $select);

			$record = mysqli_fetch_assoc($result);

			$sql = array(); 
			$sql[] = $record['id'];
			$select2 = ("SELECT * FROM `combinatie` WHERE `medicijn` = ".$_POST["id"]." AND `verbodenMedicijn` = ".$record['id']."");
			//var_dump($select2);
			$result2 = mysqli_query($conn, $select2);

			$record2 = mysqli_fetch_assoc($result2);
			//var_dump(mysqli_num_rows($result2));
			if(mysqli_num_rows($result2) < 1)
			{
				$query_combinatie = "INSERT INTO combinatie (medicijn, verbodenMedicijn) VALUES ('$id','".implode('\',\'', $sql)."')";
				
				//var_dump($query_combinatie);
				
				$result_combinatie = mysqli_query($conn, $query_combinatie);
			}
			else
			{
				$query_combinatie2 = "DELETE FROM combinatie WHERE medicijn = ".$_POST['id']." AND verbodenMedicijn != ".$record['id']."";
				
				//var_dump($query_combinatie2);
				
				$result_combinatie2 = mysqli_query($conn, $query_combinatie2);
			}	
    }
	}
echo "Het medicijn is succesvol geupdate. U wordt teruggestuurd naar de updatetabel.";
header("refresh:4; url=medicijnupdatetabel.php");
exit;

?>
  </div>
</body>
</html>