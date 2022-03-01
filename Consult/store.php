<?php
include "../includes/config.php";
session_start();
if (!isset($_SESSION['emp_id'])) {
require ('../includes/login_functions.inc.php');
redirect_user();
}
elseif ($_POST['submit'] ==  "save")
{
  
try{
    mysqli_query($conn,'START TRANSACTION');

    $sql = 'INSERT INTO Health_Consultation (emp_observation,scheddate,consult_cost,pet_id,condition_id,emp_id) VALUES (?,Now(),?,?,?,?)';

$emp_observation = $_POST['emp_observation'];
$consult_cost = $_POST['consult_cost'];
$pet_id = $_POST['petid'];
$condition_id = $_POST['condition_id'];
$emp_id = $_POST['emp_id'];

$stmt1 = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt1, 'sdiii',  $emp_observation,$consult_cost,$pet_id,$condition_id, $emp_id, );
    mysqli_stmt_execute($stmt1);

  if( (mysqli_stmt_affected_rows($stmt1) > 0) ){
   
   mysqli_commit($conn);
   $flag = true;
   }

}
 catch(mysqli_sql_exception $e) {

 }

}
header('Location: index.php');
?>
