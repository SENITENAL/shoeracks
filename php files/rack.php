<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    error_reporting(0);
require("dbConn.php");        
require("loginchecker.php");
?>
  <header>
    <div class="logo">
      <img src="images/shoesrackslogo.png" alt="Logo">
      <h1>ShoeRacks</h1>
    </div>
    <nav class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="collection.php">Collection</a></li>
        <li><a href="rack.php">Rack</a></li>
        <li><a href="resell.php">Resell</a></li>
                <?php    
                if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT username FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                            echo "<li>Logged in as: <a href='profile.php'>" . $row['username'] . "</a></li>";
                        }
                    } else {
                        echo "<li>No users found</li>";
                    }
                    mysqli_close($conn);
                  }?>
         <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
<?php
require("dbConn.php");
require("loginchecker.php");
echo"  <h1>YOUR ORDERS</h1>";
// Get user phone number from session
$username = $_SESSION["username"];

// Query the users table to get the user ID for the given phone number
$sql = "SELECT user_id FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row["user_id"];

    // Query the orders table to get the orders for the given user ID
    $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display orders in a table
echo "<table style='border: 1px solid black;margin: auto; padding: 10px; text-align: center;'>";
echo "<tr style='background-color: #ccc;'><th style='border: 1px solid black;'>Shoe Name</th><th style='border: 1px solid black;'>Shoe Size</th><th style='border: 1px solid black;'>Shoe Quantity</th><th style='border: 1px solid black;'>Order Date</th><th style='border: 1px solid black;'>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $shoe_name = $row["shoes_name"];
    $shoe_size = $row["shoes_size"];
    $shoe_quantity = $row["shoes_quantity"];
    $order_date = $row["order_date"];
    $order_id = $row["order_id"];

    echo "<tr style='border: 1px solid black;'><td style='border: 1px solid black;'>$shoe_name</td><td style='border: 1px solid black;'>$shoe_size</td><td style='border: 1px solid black;'>$shoe_quantity</td><td style='border: 1px solid black;'>$order_date</td><td style='border: 1px solid black;'><a href='delete_rack.php?id=$order_id'>Delete</a></td></tr>";
}
echo "</table>";

    } else {
        echo "No orders found.";
    }
} else {
    echo "User not found";
}

// Close database connection
mysqli_close($conn);

?>

<?php
require("dbConn.php");
require("loginchecker.php");
echo"  <h1>YOUR RACK</h1>";
// Get user phone number from session
$username = $_SESSION["username"];

// Query the users table to get the user ID for the given phone number
$sql = "SELECT user_id FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row["user_id"];

    // Query the orders table to get the orders for the given user ID
    $sql = "SELECT * FROM rack WHERE user_id = '$user_id' ORDER BY order_date DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display orders in a table
        echo "<table style='border: 1px solid black;margin: auto; padding: 10px; text-align: center;'>";
echo "<tr style='background-color: #ccc;'><th style='border: 1px solid black;'>Shoe Name</th><th style='border: 1px solid black;'>Shoe Size</th><th style='border: 1px solid black;'>Shoe Quantity</th><th style='border: 1px solid black;'>Order Date</th><th style='border: 1px solid black;'>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $shoe_name = $row["shoes_name"];
    $shoe_size = $row["shoes_size"];
    $shoe_quantity = $row["shoes_quantity"];
    $order_date = $row["order_date"];
    $order_id = $row["order_id"];

    echo "<tr style='border: 1px solid black;'><td style='border: 1px solid black;'>$shoe_name</td><td style='border: 1px solid black;'>$shoe_size</td><td style='border: 1px solid black;'>$shoe_quantity</td><td style='border: 1px solid black;'>$order_date</td><td style='border: 1px solid black;'><a href='delete_rack.php?id=$order_id'>Delete</a></td></tr>";
}
echo "</table>";

    } else {
        echo "No shoes added to rack yet.";
    }
} else {
    echo "User not found";
}

// Close database connection
mysqli_close($conn);

?>
</body>

</html>