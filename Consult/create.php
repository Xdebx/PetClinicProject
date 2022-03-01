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
include "../includes/header1.php";
include "../includes/config.php";
?>
<div class="container">
<h2>Create new pet health status</h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="post" action="store.php" enctype="multipart/form-data">
<div class="form-group">
<label for="emp_observation" class="control-label">Employee Observation</label>
<input type="text" class="form-control " id="emp_observation" name="emp_observation" placeholder="Employee Observation" >
</div>
<div class="form-group">
<label for="consult_cost" class="control-label">Consultation Cost</label>
<input type="number" class="form-control " id="consult_cost" name="consult_cost" placeholder="Consultation Cost"></text>
</div>
<div class="form-group"> 
   <label for="pet_id">Pet</label>
  <select name="petid" id="pet_id"class="form-control">
   <?php
   $sql = "select pet_id,pname from Pets";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['pet_id'].'>'.$rows['pname'].'</option>';
    } 
  ?>
</select>
</div>
<div class="form-group"> 
   <label for="condition_id">Condition</label>
  <select name="condition_id" id="condition_id"class="form-control">
   <?php
   $sql = "select condition_id,cname from Disease_Injuries";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['condition_id'].'>'.$rows['cname'].'</option>';
    } 
  ?>
</select>
</div>

<div class="form-group"> 
   <label for="emp_id">Employee</label>
  <select name="emp_id" id="emp_id"class="form-control">
   <?php
   $sql = "select emp_id,fname from Employee";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['emp_id'].'>'.$rows['fname'].'</option>';
    } 
  ?>
</select>
</div>
<div>
<div class="buttons">
<button type="submit" name="submit" class="btn btn-primary" value="save">SAVE</button>
<div class="cancels">
<a href="../includes/Home.html" class="btn btn-default" role="button">CANCEL</a>
</div>
</div>
</center>
</form>
</div>
<?php } ?>