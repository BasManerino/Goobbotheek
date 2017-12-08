<?php session_start();
	//var_dump($_POST);

  include_once("db_connect.php");
  
  if(!isset($_POST["allergie"]))
	{
      $query_combinatie2 = "DELETE FROM usermedicijn WHERE patient = ".$_SESSION["patient"]."";
      
      var_dump($query_combinatie2);
      
      $result_combinatie2 = mysqli_query($conn, $query_combinatie2);
	}

  else if(isset($_POST["allergie"]))
  {
    $delete = array();
    foreach($_POST["allergie"] as $val)
    {
        $delete[] = intval($val);
    }

    $query_combinatie2 = "DELETE FROM usermedicijn WHERE `patient` = '".$_SESSION["patient"]."' AND medicijn NOT IN (".implode(',',$delete).");";
    
    
    var_dump($query_combinatie2);
    
    $result_combinatie2 = mysqli_query($conn, $query_combinatie2);
    foreach($_POST["allergie"] as $medicijn)
      {
        
          //var_dump($_POST["combinatie"]);
          $id = $_SESSION["patient"];
          //var_dump($id);
          $select = ("SELECT * FROM `medicijn` WHERE `id` = ".$medicijn."");
          //var_dump($select);
          $result = mysqli_query($conn, $select);

          $record = mysqli_fetch_assoc($result);

          $sql = array(); 
          $sql[] = $record['id'];
          $select2 = ("SELECT * FROM `usermedicijn` WHERE `medicijn` = ".$record['id']." AND `patient` = '".$_SESSION["patient"]."'");
          var_dump($select2);
          $result2 = mysqli_query($conn, $select2);

          $record2 = mysqli_fetch_assoc($result2);

            $query_combinatie = "INSERT INTO usermedicijn (patient, medicijn) VALUES ('$id','".implode('\',\'', $sql)."')";
            
            var_dump($query_combinatie);
            
            $result_combinatie = mysqli_query($conn, $query_combinatie);
          }
      }
	echo "U wijzigingen zijn doorgevoerd. U wordt doorgestuurd naar de updatetabel.";
	//header("refresh: 40; url=wijzigpatientinfotabel.php");
?>
