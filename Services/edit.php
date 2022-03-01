<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Edit Service';
include "../includes/header1.php";
include "../includes/config.php";
$result = mysqli_query( $conn,"SELECT * FROM Grooming_Service where service_id = ". $_GET['service_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>
<div class="container">
<h2></center>Update Grooming Service</center></h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="POST" action="update.php" enctype="multipart/form-data">
<div class="form-group">
<label for="serviceid" class="control-label">Service ID</label>
<input type='text' class="form-control " id='serviceid' name='service_id' value="<?php echo $_GET['service_id']; ?>">
</div>
<div class="form-group">
<label for="service_name" class="control-label">Service Name</label>
<input type="text" class="form-control " id="service_name" name="service_name" value="<?php echo $row['service_name'];?>">
</div>
<div class="form-group">
<label for="service_cost" class="control-label">Service Cost</label>
<input type="text" class="form-control " id="service_cost" name="service_cost" value="<?php echo $row['service_cost'];?>">
</div>
<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
 <div>
  <div class="form-group"> 
    <label for="imgpath" class="control-label">image</label>
    <?php echo "<img border=\"0\" src=\"".$row['img_gservice']."\" width=\"250\" alt=\"item Name\" height=\"250\">" ?>;
 </div>
<div>
<button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
<a href="../includes/Home.html" class="btn btn-default" role="button">Cancel</a>
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