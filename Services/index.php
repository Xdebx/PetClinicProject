<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Grooming Service CRUD';
include "../includes/config.php";
include "../includes/header1.php";
?>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><a href="create.php" class="btn btn-primary a-btn-slide-text">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  <span><strong>Create New Service</strong></span></a></center>
<div class="table-responsive">
<table  class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Service name</th>
        <th>Service cost</th>
        <th>Photo</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
 <tbody>
<?php 
$sql = "SELECT * FROM Grooming_Service ORDER BY service_id ASC";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_assoc($result)) {
 //  echo print_r($row);  
        echo "<tr>\n";
        echo "<td>".$row['service_id']."</td>";
        echo "<td>".$row['service_name']."</td>";
        echo "<td>".$row['service_cost']."</td>";
        echo "<td><img width ='100px' height='90px' src=".$row['img_gservice']."></td>";
        echo "<td align='center'><a href='edit.php?service_id=".$row['service_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
        echo "<td align='center'><a href='delete.php?service_id=".$row['service_id']."'><i class='fa fa-trash-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
        echo "</tr>\n"; 
} 
 mysqli_free_result($result);
 mysqli_close( $conn );
 ?>
</tbody>
</table>
</div>
<?php
include("../Includes/footer.php");
?><?php } ?>