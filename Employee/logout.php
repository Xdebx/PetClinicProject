<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<?php # Script 12.6 - logout.php
session_start();
if (!isset($_SESSION['emp_id'])) {
require ('../includes/login_functions.inc.php');
redirect_user();
} 
else 
{
$_SESSION = array();
session_destroy();
setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
}
$page_title = 'Logged Out!';
include ('../Includes/header1.php');
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";
include ('../includes/footer.php');
?>