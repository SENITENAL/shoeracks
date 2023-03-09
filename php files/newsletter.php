<?php
  $servername="localhost";
	$username="root";
	$password="";
	$dbname="shoeracks";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
	die("Connection failed:".mysqli_connect_error());
}
		if (isset($_POST['subscribe'])) {
          // Retrieving form data
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Please enter a valid email address.');
  }

            $sql= "INSERT INTO newsletter (email) VALUES ('$email')";
           
  if (mysqli_query($conn, $sql)) {
    echo 'Thank you! Your have been added to our newsletter list!';
    ?>
    <a href="index.php"><button>BACK TO SHOERACKS</button></a>
    <?php
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }
}
$conn->close();

?>