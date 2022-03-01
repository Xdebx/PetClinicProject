<?php
include "../includes/config.php";
session_start();
if (!isset($_SESSION['emp_id'])) {
require ('../includes/login_functions.inc.php');
redirect_user();
}
elseif ($_POST['submit'] ==  "save"){
$pname = $_POST['pname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$petb_id = $_POST['petb_id'];
$customer_id = $_POST['customer_id'];
$target_dir = "../upload4/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //$query = "UPDATE item set img_path = '$target_file' where item_id = 1 ";
        $sql = "INSERT INTO Pets (pname,age,gender,petb_id,customer_id,img_pet)
VALUES ('$pname','$age','$gender','$petb_id','$customer_id','$target_file')";
echo $sql;
$result = mysqli_query( $conn,$sql);
 if ($result) {
   header("location: index.php");
 }
 else{
   echo mysqli_error();
 }
     }
 else {
         echo "Sorry, there was an error uploading your file.";
     }
}
?>