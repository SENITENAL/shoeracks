<?php
require("dbConn.php");
require("loginchecker.php");

// Get user phone number from session
$user_phone_number = $_POST["phone"];

// Query the users table to get the user ID for the given phone number
$sql = "SELECT user_id FROM users WHERE phone = '$user_phone_number'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row["user_id"];

    // Get order data from form
    $shoes_name = $_POST["shoe_name"];
    $shoes_size = $_POST["shoe_size"];
    $shoes_quantity = $_POST["shoe_quantity"];
    $order_date = date("Y-m-d H:i:s");

    // Insert new order record into the database
    $sql = "INSERT INTO orders (user_id, shoes_name, shoes_size, shoes_quantity, order_date)
            VALUES ('$user_id', '$shoes_name', '$shoes_size', '$shoes_quantity', '$order_date')";
    if (mysqli_query($conn, $sql)) {
        echo "ADDED TO RACK  successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "User not found";
}

// Close database connection
mysqli_close($conn);

?>
