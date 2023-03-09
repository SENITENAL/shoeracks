<?php
// Getting the form data
$name = $_POST['name'];
$price = $_POST['price'];
$period = $_POST['period'];
$condition = $_POST['condition'];

// Getting the uploaded file information
$pname = $_FILES['picture']['name'];
   $target_dir = "images/";
   $target_file = $target_dir . basename($_FILES["picture"]["name"]);

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoeracks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Inserting the data into the database
if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {    
      $filepath = $target_dir . $pname;
$sql = "INSERT INTO shoes (name, price, period, `condition`, picturename, picturepath) VALUES ('$name',$price,'$period','$condition','$pname','$filepath')";
mysqli_query($conn, $sql);
    echo 'Added to rack successfully!';
 
      ?>
    <a href="resell.php"><button>BACK TO RESELL</button></a>
    <?php
}
else{
    echo 'Error: ' . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
?>