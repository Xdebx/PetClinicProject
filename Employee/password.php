<?php # password.php
// This page lets a user change their password.
$page_title = 'Change Your Password';
include ('../includes/header1.php');
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 require ('../Includes/config.php'); // Connect to the db.
 $errors = array(); // Initialize an error array.
// Check for an email address:
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
} else {
$e = mysqli_real_escape_string($conn, trim($_POST['email']));
}
// Check for the current password:
if (empty($_POST['password'])) {
$errors[] = 'You forgot to enter your current password.';
} else {
$p = mysqli_real_escape_string($conn, trim($_POST['password']));
}
// Check for a new password and match
// against the confirmed password:
if (!empty($_POST['password'])) {
 if ($_POST['password'] != $_POST['password2']) {
 $errors[] = 'Your new password did not match the confirmed password.';
} else {
$np = mysqli_real_escape_string($conn, trim($_POST['password']));
}
} else {
$errors[] = 'You forgot to enter your new password.';
}
if (empty($errors)) { // If everything's OK.
// Check that they've entered the right email address/password combination:
 $q = "SELECT emp_id FROM Employee WHERE (email='$e' AND password=SHA1('$p') )";
 $r = @mysqli_query($conn, $q);
 $num = @mysqli_num_rows($r);
 if ($num == 1) { // Match was made.
// Get the user_id:
 $row = mysqli_fetch_assoc($r);
 echo $row['user_id'];
// Make the UPDATE query:
 $q = "UPDATE Employee SET password=SHA1('$np') WHERE emp_id =".$row['emp_id'];
 $r = @mysqli_query($conn, $q);
 if (mysqli_affected_rows($conn) == 1) { // If it ran OK.
// Print a message.
echo '<h1>Thank you!</h1>
<p>Your password has been updated. In Chapter 12 you will actually be able to log in!</p><p><br /></p>';
} else { // If it did not run OK.
// Public message:
echo '<h1>System Error</h1>
<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>';
// Debugging message:
echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
}
mysqli_close($conn); // Close the database connection.
// Include the footer and quit the script (to not show the form).
include ('../includes/footer.php');
exit();
} else { // Invalid email address/password combination.
echo '<h1>Error!</h1>
<p class="error">The email address and password do not match those on file.</p>';
}
} else { // Report the errors.
echo '<h1>Error!</h1>
<p class="error">The following error(s) occurred:<br />';
foreach ($errors as $msg) { // Print each error.
echo " - $msg<br />\n";
}
echo '</p><p>Please try again.</p><p><br /></p>';
} // End of if (empty($errors)) IF.
mysqli_close($conn); // Close the database connection.
} // End of the main Submit conditional.
?>
<h1>Change Your Password</h1>
<form action="password.php" method="post">
<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email Address" /> </p>
<p>Current Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Current Password" /></p>
<p>New Password: <input type="password" name="password" size="10" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="New Password" /></p>
<p>Confirm New Password: <input type="password" name="password2" size="10" maxlength="20" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" placeholder="Confirm Password" /></p>
<p><input type="submit" name="submit" value="Change Password" /></p>
</form>
<?php include ('../includes/footer.php'); ?>