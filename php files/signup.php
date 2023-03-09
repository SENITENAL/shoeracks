 <link href="style.css" rel="stylesheet" type="text/css" />
<?php
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="shoeracks";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error)
	die("Connection failed:".mysqli_connect_error());

		if (isset($_POST['signup'])) {
    // Retrieve form data
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
            $sql= "INSERT INTO users (username, password,phone) VALUES ('$username','$password','$phone')";
            if($conn->query($sql)===true){
        echo "<p style='font-size: 18px; color: gray; font-family: Georgia'>Sign up successful. You have been added to the Shoerack Squad! Welcome, $username.</p>";
echo "<p style='font-size: 16px;color: yellow; font-family: Georgia'>Please move on to the login page and login to your account to continue.</p>";
    ?> <a href="login.html"><br><button>Login here</button></a> <?php
    } 
    else{
	echo "Error in Signing Up,Please try again".$conn->error;
}                            
}
$conn->close();

?>