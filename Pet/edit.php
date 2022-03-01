<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>

<?php
$page_title = 'Edit Pet';
include "../includes/config.php";
include "../includes/header1.php";
$result = mysqli_query( $conn,"SELECT * FROM Pets where pet_id = ". $_GET['pet_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>
<div class="container">
<h2><center>Update pets</center></h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="POST" action="update.php" enctype="multipart/form-data">
<div class="form-group">
<label for="petid" class="control-label">Pet ID</label>
<input type='text' class="form-control " id='petid' name='pet_id' value="<?php echo $_GET['pet_id']; ?>">
</div>
<div class="form-group">
<label for="pname" class="control-label">Pet Name</label>
<input type="text" class="form-control " id="pname" name="pname" value="<?php echo $row['pname'];?>">
</div>
<div class="form-group">
<label for="age" class="control-label">Age</label>
<input type="text" class="form-control " id="age" name="age" value="<?php echo $row['age'];?>">
</div>
<div class="form-group">
<label for="gender" class="control-label">Gender</label>
<input type="text" class="form-control " id="gender" name="gender" value="<?php echo $row['gender'];?>">
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

<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
 <div>
  <div class="form-group"> 
    <label for="imgpath" class="control-label">image</label>
    <?php echo "<img border=\"0\" src=\"".$row['img_pet']."\" width=\"250\" alt=\"item Name\" height=\"250\">" ?>;
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