<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/.../js/bootstrap.min.js" ></script>
<script src="https://kit.fontawesome.com/c88097f817.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="title">
    <div class="logo"><strong>PET</strong>CLINIC</div>
  </div>
<div class="topnav" id="myTopnav">
  <a class="active" href="../Includes/Home.html">Home</a>
  <a href="../Customer/index.php">Customers</a>
  <a class="active" href="../Employee/index.php">Employee</a>
  <a href="../Pet/index.php">Pets</a>
  <a class="active" href="../Services/index.php">Service</a>
  <a href="../Order/orders.php">TermTest</a>
  <a class="active" href="../Consult/index.php">UNIT1</a>
  <a href="../Backres/impback.php">Import</a>
  <a class="active" href="../Backres/resback.php">Export</a>
  <a class="active"
  <?php if ( (isset($_SESSION['emp_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) {
echo '<a href="../Employee/logout.php"> Logout</a>';
} 
else 
{
echo '<a href="../Employee/login.php"> Login</a>';
}
?>
</div>
</body>
</html>
