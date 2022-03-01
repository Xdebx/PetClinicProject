<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Add New Pet';
include "../includes/header1.php";
include "../includes/config.php";
?>
<div class="container">
<h2>Create new pet</h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="post" action="store.php" enctype="multipart/form-data">
<div class="form-group">
<label for="pname" class="control-label">Pet Name</label>
<input type="text" class="form-control " id="pname" name="pname" placeholder="Pet name" >
</div>
<div class="form-group">
<label for="age" class="control-label">Age</label>
<input type="text" class="form-control " id="age" name="age" placeholder="Age" ></text>
</div>
<div class="form-group">
<label for="gender" class="control-label">Gender</label>
<input type="text" class="form-control " id="gender" name="gender" placeholder="Gender"></text>
</div>
<div class="form-group"> 
   <label for="petb_id">Breed</label>
  <select name="petb_id" id="pet_id"class="form-control">
   <?php
   $sql = "select petb_id,pbreed from Pet_Breed";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['petb_id'].'>'.$rows['pbreed'].'</option>';
    } 
  ?>
</select>
</div>
<div class="form-group"> 
   <label for="customer_id">Owner</label>
  <select name="customer_id" id="customer_id"class="form-control">
   <?php
   $sql = "select customer_id,fname from customer";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['customer_id'].'>'.$rows['fname'].'</option>';
    } 
  ?>
</select>
</div>
<div>
<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
<div class="buttons">
<button type="submit" name="submit" class="btn btn-primary" value="save">SAVE</button>
<div class="cancels">
<a href="../includes/Home.html" class="btn btn-default" role="button">CANCEL</a>
</div>
</div>
</form>
</center>
</div>
<?php } ?>