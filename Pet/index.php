<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Pets CRUD';
include "../includes/config.php";
include "../includes/header1.php";
?>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><a href="create.php" class="btn btn-primary a-btn-slide-text">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
  <span><strong>Register New Pet</strong></span></a></center>
<div class="table-responsive">
<table  class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pet name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Breed</th>
        <th>Owner</th>
        <th>Photo</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
 <tbody>
<?php 
$sql = "select p.pet_id,p.pname,p.age,p.gender,pb.petb_id,pb.pbreed,c.customer_id,c.fname, p.img_pet from Pets p INNER JOIN Pet_Breed pb USING (petb_id) INNER JOIN Customer c USING (customer_id)";
$result = mysqli_query( $conn,$sql );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_assoc($result)) {
 //  echo print_r($row);  
        echo "<tr>\n";
        echo "<td>".$row['pet_id']."</td>";
        echo "<td>".$row['pname']."</td>";
        echo "<td>".$row['age']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['pbreed']."</td>";
         echo "<td>".$row['fname']."</td>";
        echo "<td><img width ='100px' height='90px' src=".$row['img_pet']."></td>";
        echo "<td align='center'><a href='edit.php?pet_id=".$row['pet_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
        echo "<td align='center'><a href='delete.php?pet_id=".$row['pet_id']."'><i class='fa fa-trash-o' aria-hidden='true' style='font-size:24px' ></a></i></td>";
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