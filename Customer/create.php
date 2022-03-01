<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Add New Customer';
include "../includes/config.php";
include "../includes/header1.php";
?>
<div class="container">
<h2>Create new customer</h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="post" action="store.php" enctype="multipart/form-data">
<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control " id="fname" name="fname" placeholder="First name" >
</div>
<div class="form-group">
<label for="lname" class="control-label">Last name</label>
<input type="text" class="form-control " id="lname" name="lname" placeholder="Last name" >
</div>
<div class="form-group">
<label for="address" class="control-label">Address</label>
<input type="text" class="form-control " id="address" name="address" placeholder="Address" >
</div>
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
</center>
</form>
</div>
<?php } ?>