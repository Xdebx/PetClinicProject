<?php
$page_title = 'Add New Employee';
include "../includes/config.php";
include "../includes/header1.php";
?>
<div class="container">
<h2>Create new employee</h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="post" action="store.php" enctype="multipart/form-data">

<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control " id="fname" name="fname" placeholder="First name" >
</div>
<div class="form-group">
<label for="email" class="control-label">Email</label>
<input type="text" class="form-control " id="email" name="email" placeholder="Email" >
</div>
<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="password" class="form-control " id="password" name="password" placeholder="Password" >
</div>
<div class="form-group">
<label for="password2" class="control-label">Confirm Password</label>
<input type="password" class="form-control " id="password2" name="password2" placeholder="Confirm Password" >
</div>
<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
<div>
<div class="buttons">
<button type="submit" name="submit" class="btn btn-primary" value="save">SAVE</button>
<div class="cancels">
<a href="../includes/Home.html" class="btn btn-default" role="button">CANCEL</a>
</div>
</div>
</form>
</center>
</div> 
