<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<?php
session_start();
if (!isset($_SESSION['emp_id'])) {
require ('../includes/login_functions.inc.php');
redirect_user();
}
$page_title = 'Logged In!';
include ('../Includes/header1.php');
echo "<h1>Logged In!</h1>
<p>You are now logged in, {$_SESSION['fname']}!</p>
<p><a href=\"logout.php\">Logout </a></p>";
include ('../Includes/footer.php');
?>