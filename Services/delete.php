<?php
include "../includes/config.php";
$sql = "DELETE FROM Grooming_Service WHERE service_id = ". $_GET['service_id'];
//echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
echo "customer deleted";
header('location:index.php');
}
mysqli_free_result($result);
mysqli_close( $conn );
?>