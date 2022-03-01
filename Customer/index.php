<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
  <?php
$page_title = 'Customer CRUD';
include "../includes/config.php";
include "../includes/header1.php";
?>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><a href="create.php" class="btn btn-primary a-btn-slide-text">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  <span><strong>Register New Customer</strong></span></a></center>
<div class="table-responsive">
<table  class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
         <th>Lastname</th>
        <th>Address</th>
        <th>Photo</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
 <tbody>
<?php 
$sql = "SELECT * FROM customer ORDER BY customer_id ASC";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_assoc($result)) {
   
        echo "<tr>\n";
        echo "<td>".$row['customer_id']."</td>";
        echo "<td>".$row['lname']."</td>";
        echo "<td>".$row['fname']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td><img width ='100px' height='90px' src=".$row['img_cus']."></td>";
        echo "<td align='center'><a href='edit.php?cust_id=".$row['customer_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
        echo "<td align='center'><a href='delete.php?cust_id=".$row['customer_id']."'><i class='fa fa-trash-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
        echo "</tr>\n"; 
} 
 mysqli_free_result($result);
 mysqli_close( $conn );
 ?>
</tbody>
</table>
</div>
<?php
include("../includes/footer.php");
?>
<?php } ?>