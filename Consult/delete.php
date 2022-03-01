<?php
include "../includes/config.php";
$sql = "DELETE FROM Health_Consultation WHERE consult_id = ". $_GET['consult_id'];
//echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result) {
echo "customer deleted";
header('location:index.php');
}
mysqli_free_result($result);
mysqli_close( $conn );
?>