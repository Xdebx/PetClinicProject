<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Edit Customer';
include "../Includes/config.php";
include "../Includes/header1.php";
$result=mysqli_query( $conn,"SELECT * FROM customer where customer_id = ". $_GET['cust_id']);
$row = mysqli_fetch_array($result);
?>
<div class="container">
<h2><center>Update customer</center></h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="POST" action="update.php" enctype="multipart/form-data">
<div class="form-group">
<label for="customerid" class="control-label">Customer ID</label>
<input type='text' class="form-control " id='customerid' name='customer_id' value="<?php echo $_GET['cust_id']; ?>">
</div>
<div class="form-group">
<label for="lname" class="control-label">Last name</label>
<input type="text" class="form-control " id="lname" name="lname" value="<?php echo $row['lname'];?>">
</div>
<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control " id="fname" name="fname" value="<?php echo $row['fname'];?>">
</div>
<div class="form-group">
<label for="address" class="control-label">Address</label>
<input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address'];?>">
</div>
<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
 <div>
  <div class="form-group"> 
    <label for="imgpath" class="control-label">image</label>
    <?php echo "<img border=\"0\" src=\"".$row['img_cus']."\" width=\"250\" alt=\"item Name\" height=\"250\">" ?>;
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