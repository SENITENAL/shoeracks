<?php
// Getting the form data

require("dbConn.php");        
require("loginchecker.php");

$location = $_POST['location'];
$email = $_POST['email'];
$username = $_SESSION['username'];

// Getting the uploaded file information
$pname = $_FILES['pfpicture']['name'];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["pfpicture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



  if (move_uploaded_file($_FILES["pfpicture"]["tmp_name"], $target_file)) {    
    $filepath = $target_dir . $pname;
    $sql = "UPDATE users SET location='$location', email='$email', upicturename='$pname', upicturepath='$filepath' WHERE username='$username'";
    mysqli_query($conn, $sql);
    echo 'Added to your profile successfully!';
    header("Location:index.php");
  }
  else{
    echo 'Error: ' . mysqli_error($conn);
  }


// Close the database connection
mysqli_close($conn);
?>

