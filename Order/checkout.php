<?php
session_start();
include("../includes/config.php");
include("../includes/header1.php");
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
  <?php
//print_r($_SESSION);
 try {
mysqli_query($conn,'START TRANSACTION');
$q = 'INSERT INTO Grooming_Info(scheddue,pet_id) VALUES (NOW(), ?)';
// $flag = true;
$stmt1 = mysqli_prepare($conn, $q);
mysqli_stmt_bind_param($stmt1, 'i', $pet_id);
mysqli_stmt_execute($stmt1);
$orderinfo_id = mysqli_insert_id($conn);
// echo $orderinfo_id;
$q2 = 'INSERT INTO groomingline(groominginfo_id ,service_id)VALUES (?, ?,?)';
$stmt2 = mysqli_prepare($conn, $q2);



mysqli_stmt_bind_param($stmt2, 'ii', $groominginfo_id, $product_code);

// print_r($_SESSION["cart_products"]);
foreach ($_SESSION["cart_products"] as $cart_itm){
//set variables to use in content below
  $service_name = $cart_itm["service_name"];
  $product_price = $cart_itm["service_cost"];
  $product_code = $cart_itm["service_id"];
  //print_r($product_code);
  mysqli_stmt_execute($stmt1);
   mysqli_stmt_execute($stmt2);
   if( (mysqli_stmt_affected_rows($stmt1) > 0) && (mysqli_stmt_affected_rows($stmt2) > 0) ){
   // mysqli_commit($conn);
   $flag = true;
   }
   // else {
   //   // mysqli_rollback($conn);
   //  $flag = false;
   // }
}
if ($flag == true){
 mysqli_commit($conn);
  unset($_SESSION['cart_products']);
}
// else {
//  mysqli_rollback($dbc);
// }
}
 catch(mysqli_sql_exception $e) {
  mysqli_rollback($conn);
 }
header('Location: orders.php');
?><?php } ?>