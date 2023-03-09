<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoeracks";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Please enter a valid email address.');
    }

    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo 'Thank you! Your message has been received!';
        ?>
        <a href="index.php"><button>BACK TO SHOERACKS</button></a>
        <?php
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

$conn->close();
?>
