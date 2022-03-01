<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Health Status';
include "../includes/config.php";
include "../includes/header1.php";
include "../includes/header2.php";
?>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<div class="table-responsive">
<table  class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
         <th>Pet name</th>
        <th>Condition</th>
        <th>Observation</th>
        <th>Date Schedule</th>
        <th>Consultation Cost</th>
        <th>Employee</th>
        </tr>
    </thead>
 <tbody>
<?php
$search = $_POST['s'];

$sql = "select c.consult_id,c.emp_observation,c.scheddate,c.consult_cost,p.pet_id,p.pname,di.condition_id,di.cname,e.emp_id,e.fname from Health_Consultation c INNER JOIN Pets p USING(pet_id) INNER JOIN Disease_Injuries di USING (condition_id) INNER JOIN Employee e USING (emp_id) where pname like '%$search'";

$result = mysqli_query($conn,$sql);

$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_assoc($result)) {
 //  echo print_r($row);  
        echo "<tr>\n";
        echo "<td>".$row['consult_id']."</td>";
        echo "<td>".$row['pname']."</td>";
        echo "<td>".$row['cname']."</td>";
        echo "<td>".$row['emp_observation']."</td>";
        echo "<td>".$row['scheddate']."</td>";
        echo "<td>".$row['consult_cost']."</td>";
        echo "<td>".$row['fname']."</td>";
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