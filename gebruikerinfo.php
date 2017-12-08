<?php
include 'db_connect.php';

$sql = "SELECT * FROM gebruiker";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<td>". $row["gebruikernaam"]."</td> <td>". $row["adres"]."</td> <td>". $row["email"]."
         </td> <td>". $row["blocked"]." </td><td><a href='delgebruiker.php?id=".$row['email']."'  role='button' class='btn btn-info btn-block'>Block</a></td></tr>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>
