<?php # Script 12.3 - login.php
if ($_SERVER['REQUEST_METHOD'] =='POST') {
require ('../includes/login_functions.inc.php');
require ('../includes/config.php');
list ($check, $data) = check_login ($conn, $_POST['email'], $_POST['pass']);
if ($check) { // OK!
session_start();
$_SESSION['emp_id'] = $data['emp_id'];
$_SESSION['fname'] = $data['fname'];
redirect_user('loggedin.php');
} else {
$errors = $data;
}
mysqli_close($conn);
}
include ('../Includes/login_page.inc.php');
