<?php 
$page_title = 'Login';
include "../Includes/header1.php";
//include "../Includes/loginpage.html";
if (isset($errors) && !empty($errors)) {
 echo '<h1>Error!</h1>
 <p class="error">The following error(s) occurred:<br />';
 foreach ($errors as $msg) {
 echo " - $msg<br />\n";
 }
 echo '</p><p>Please try again.</p>';
}
?>
<link rel="stylesheet" type="text/css" href="../Includes/logstyles.css">
<div class="login-box">
  <h2>Please login or create a user</h2>
  <form action="login.php" method="post">
    <div class="user-box">
      <input type="text" name="email" size="10" maxlength="100" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass" size="10" maxlength="50" required="">
      <label>Password</label>
    </div>
  <center><button type="submit" name="submit" class="btn btn-primary">Login</button></center>
      <span></span>
      <span></span>
      <span></span>
      <span></span>

    </a>
    <p><center><a href="../Employee/create.php">Create New User</a></center></p>
  </form>
</div>
<!-- <center><form action="login.php" method="post">
 <p>Email Address: <input type="text" name="email" size="10" maxlength="100" placeholder="Email Address"/> </p>
 <p>Password: <input type="password" name="pass" size="10" maxlength="50" placeholder="Password" /></p>
 <p><button type="submit">Login</button></p>
 <p><a href="../Employee/create.php">Create New User</a></p>
</form></center> -->
