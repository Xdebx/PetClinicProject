<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Add New Service';
include "../includes/header1.php";
include "../includes/config.php";
?>
<div class="container">
<h2>Create new service</h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="post" action="store.php" enctype="multipart/form-data">
<div class="form-group">
<label for="service_name" class="control-label">Service Name</label>
<input type="text" class="form-control " id="service_name" name="service_name" placeholder="Service name">
</div>
<div class="form-group">
<label for="service_cost" class="control-label">Service Cost</label>
<input type="text" class="form-control " id="service_cost" name="service_cost" placeholder="Service cost" ></text>
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
</form>
</center>
</div>
<?php } ?>