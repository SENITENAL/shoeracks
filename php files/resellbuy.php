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
        <li><a href="index.html">Home</a></li>
        <li><a href="collection.html">Collection</a></li>
        <li><a href="rack.html">Rack</a></li>
        <li><a href="resell.html">Resell</a></li>
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
  <h1> TO BUY THE SHOES CURRENTLY ON RESELL</h1>
<form method="post">
        <label for="resellname">Shoes name:</label>
        <input type="text" id="resellname" name="resellname"><br>
        <input type="hidden" name="product_id" value="1">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label type="">Phone number:</label>
        <input type="number" name="pnum" id="pnum"><br>
        <label type="">Location:</label>
        <input type="text" name="location" id="location"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1"><br>
        <button type="submit" class="order-now">Order Now</button>
      </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product_id = $_POST['product_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $pnum= $_POST['pnum'];
  $quantity = $_POST['quantity'];
  $resellname=$_POST['resellname'];
  if (empty($name) || empty($email) || empty($quantity)) {
    die('Please fill out all fields.');
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Please enter a valid email address.');
  }

  if ($quantity <= 0) {
    die('Please enter a valid quantity.');
  }

  // Connecting to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "shoeracks";
  $connection = mysqli_connect($servername, $username, $password, $database);

  // Checking for errors
  if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
  }

  $sql = "INSERT INTO orders (product_id, name, email, quantity, pnum, location, resell_name) VALUES ('$product_id', '$name', '$email', '$quantity', '$pnum', '$location','$resellname')";

  if (mysqli_query($connection, $sql)) {
    echo 'Order successfully placed! Your order will be shipped within 1-2 days and in your door steps within 3 days. Thank you for trusting us :) !!';
    ?>
    <a href="collection.html"><button>BACK TO COLLECTION</button></a>
    <?php
  } else {
    echo 'Error: ' . mysqli_error($connection);
  }

  // Close the database connection
  mysqli_close($connection);
}

?>

</body>

</html>