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
$result = mysqli_query( $conn,"SELECT * FROM Health_Consultation where consult_id = ". $_GET['consult_id']);
$row = mysqli_fetch_array($result);
?>
<div class="container">
<h2>Edit pet</h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="post" action="update.php" enctype="multipart/form-data">
<div class="form-group">
<label for="consult_id" class="control-label">Consult ID</label>
<input type="text" class="form-control " id="consult_id" name="consult_id" value="<?php echo $_GET['consult_id']; ?>">
</div>
<div class="form-group">
<label for="emp_observation" class="control-label">Employee Observation</label>
<input type="text" class="form-control " id="emp_observation" name="emp_observation"value="<?php echo $row['emp_observation']; ?>">
</div>
<div class="form-group">
<label for="consult_cost" class="control-label">Consultation Cost</label>
<input type="text" class="form-control " id="consult_cost" name="consult_cost"value="<?php echo $row['consult_cost']; ?>"></text>
</div>

<div class="form-group"> 
   <label for="pet_id">Pet</label>
  <select name="petid" id="pet_id"class="form-control">
<?php

  $sql = "select c.consult_id,c.emp_observation,c.scheddate,c.consult_cost,p.pet_id,p.pname,di.condition_id,di.cname,e.emp_id,e.fname from Health_Consultation c INNER JOIN Pets p USING(pet_id) INNER JOIN Disease_Injuries di USING (condition_id) INNER JOIN Employee e USING (emp_id) where consult_id = ". $_GET['consult_id'];
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);

//====================================================================================
   $sql = "select pet_id,pname from Pets where pet_id <>".$row['pet_id'];
   $results = mysqli_query($conn,$sql);
   echo '<option selected value='.$row['pet_id'].'>'.$row['pname'].'</option>';
//====================================================================================
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

  $sql = "select c.consult_id,c.emp_observation,c.scheddate,c.consult_cost,p.pet_id,p.pname,di.condition_id,di.cname,e.emp_id,e.fname from Health_Consultation c INNER JOIN Pets p USING(pet_id) INNER JOIN Disease_Injuries di USING (condition_id) INNER JOIN Employee e USING (emp_id) where consult_id = ". $_GET['consult_id'];
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);

//====================================================================================
   $sql = "select condition_id,cname from Disease_Injuries where condition_id <>".$row['condition_id'];
   $results = mysqli_query($conn,$sql);
   echo '<option selected value='.$row['condition_id'].'>'.$row['cname'].'</option>';
//====================================================================================
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

  $sql = "select c.consult_id,c.emp_observation,c.scheddate,c.consult_cost,p.pet_id,p.pname,di.condition_id,di.cname,e.emp_id,e.fname from Health_Consultation c INNER JOIN Pets p USING(pet_id) INNER JOIN Disease_Injuries di USING (condition_id) INNER JOIN Employee e USING (emp_id) where consult_id = ". $_GET['consult_id'];
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);

//====================================================================================
   $sql = "select emp_id,fname from Employee where emp_id <>".$row['emp_id'];
   $results = mysqli_query($conn,$sql);
   echo '<option selected value='.$row['emp_id'].'>'.$row['fname'].'</option>';
//====================================================================================
   while ($rows = mysqli_fetch_assoc($results)){ 
      echo '<option value='.$rows['emp_id'].'>'.$rows['fname'].'</option>';
    } 
  ?>
</select>
</div>
<div>
<button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
<a href="../Includes/Home.html" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
</center>
</div>
<?php
mysqli_free_result($result);
mysqli_close( $conn );
?>
</body>
</html>
<?php } ?>