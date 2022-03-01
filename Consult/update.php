<?php
include "../includes/config.php";
session_start();
if (!isset($_SESSION['emp_id'])) {
require ('../includes/login_functions.inc.php');
redirect_user();
}
elseif ($_POST['submit'] ==  "update"){
$consult_id = $_POST['consult_id'];
$emp_observation = $_POST['emp_observation'];
$consult_cost = $_POST['consult_cost'];
$pet_id = $_POST['petid'];
$condition_id = $_POST['condition_id'];
$emp_id = $_POST['emp_id'];
$sql = "UPDATE Health_Consultation SET emp_observation = '$emp_observation',scheddate = Now(),consult_cost = '$consult_cost',pet_id = '$pet_id',condition_id = '$condition_id',emp_id = '$emp_id' WHERE consult_id = " . $consult_id ;
$result = mysqli_query( $conn,$sql);
if ($result) {
//  echo "customer updated";
header("location:index.php");
}
}
?>