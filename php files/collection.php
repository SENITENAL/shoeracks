<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <style>
    .body {
      font-family: Arial, sans-serif;
    }

    .product {

      border: 1px solid #ddd;
      padding: 10px;
      margin: 10px;
      width: 300px;
      float: left;
    }

    .product img {
      max-width: 100%;
    }

    .product h2 {
      margin-top: 0;
      font-size: 1.2em;
    }

    .product p {

      margin-bottom: 0;
      font-size: 1.1em;
    }

    .order-now,
    .add-to-rack {
      display: block;
      margin-top: 10px;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-align: center;
      font-size: 1.1em;
      cursor: pointer;
    }

    .order-now:hover,
    .add-to-rack:hover {
      background-color: #0062cc;
    }

    .hotpick {
      background-color: #fff;
      padding: 30px;
      border: 1px solid #ddd;
    }

    .hotpick h1 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .hotpick .productz {
      display: grid;
      align-items: center;
    }

    .hotpick img {
      width: 300px;
      margin-right: 20px;
    }

    .hotpick h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .hotpick p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .hotpick form {
      margin-top: 20px;
    }

    .hotpick label {
      display: block;
      margin-bottom: 5px;
      font-size: 16px;
      font-weight: bold;
    }

    .hotpick input[type="text"],
    .hotpick input[type="email"],
    .hotpick input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
    }

    .hotpick button {
      background-color: #ffd700;
      color: #fff;
      font-size: 16px;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .hotpick button.order-now {
      background-color: #ff0000;
      margin-right: 10px;
    }

    .hotpick button.add-to-rack {
      background-color: #008000;
    }

    fieldset {
      border: 2px solid gray;
      padding: 20px;
      margin: 20px auto;
      width: 80%;
      max-width: 600px;
      font-size: 1.1em;
    }

    legend {
      font-weight: bold;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    textarea {
      display: block;
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid gray;
      border-radius: 4px;
      font-size: 1em;
    }

    button {
      background-color: #f7b731;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 4px;
      font-size: 1em;
      cursor: pointer;
    }

    button:hover {
      background-color: #e6a223;
    }
  </style>
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
  <section class="normal">
    <div class="product">
      <img src="images/converse.gif" alt="Product 1">
      <h2>Black Converses</h2>
      <h2>Rs.2700/-</h2>
      <p>Black Converse shoes are a timeless classic that never goes out of style with their sleek, monochromatic look.
      </p>
      <p>TO ORDER OR ADD TO RACK ENTER DETAILS BELOW: </p>
      <form method="post" action="order.php">
        <input type="hidden" name="shoe_name" value="Converse(black)">
        <label for="size">Size(36-42):</label>
          <input type="number" id="shoe_size" name="shoe_size" min="36"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="shoe_quantity" name="shoe_quantity" min="1"><br>
        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" ><br>
        <button type="submit" class="order-now" name="action" value="order">Order Now</button>
        <button type="submit" class="add-to-rack" name="action" value="rack">Add to Rack</button>
      </form>
    </div>
    <div class="product">
      <img src="images/vans.gif" alt="Product 2">
      <h2>Vans</h2>
      <h2>Rs.2800/-</h2>
      <p>Vans shoes are more than just a brand of footwear – they're a cultural icon. Vans have become a staple for
        skaters and fashion lovers alike.</p>
      <p>TO ORDER OR ADD TO RACK ENTER DETAILS BELOW: </p>
 <form method="post" action="order.php">
        <input type="hidden" name="shoe_name" value="Vans">
        <label for="size">Size(36-42):</label>
          <input type="number" id="shoe_size" name="shoe_size" min="36"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="shoe_quantity" name="shoe_quantity" min="1"><br>
        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" ><br>
        <button type="submit" class="order-now" name="action" value="order">Order Now</button>
        <button type="submit" class="add-to-rack" name="action" value="rack">Add to Rack</button>
      </form>
    </div>

    </div>
    <div class="product">
      <img src="images/jordan13.gif" alt="Product 3">
      <h2>AIR JORDAN 13's</h2>
      <h2>Rs.4800/-</h2>
      <p>Great overall as well as basketball sheos for drippy performance</p>
      <p>TO ORDER OR ADD TO RACK ENTER DETAILS BELOW: </p>
      <form method="post" action="order.php">
        <input type="hidden" name="shoe_name" value="Jordan_13">
        <label for="size">Size(36-42):</label>
          <input type="number" id="shoe_size" name="shoe_size" min="36"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="shoe_quantity" name="shoe_quantity" min="1"><br>
        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" ><br>
        <button type="submit" class="order-now" name="action" value="order">Order Now</button>
        <button type="submit" class="add-to-rack" name="action" value="rack">Add to Rack</button>
      </form>
    </div>
    <div class="product">
      <img src="images/addidas.gif" alt="Product 4">
      <h2>Addidas ULTRA BOOST 5</h2>
      <h2>Rs.4500/-</h2>
      <p>Your next running shoes or sports shoes ready to boost your performance to ultra.</p>
      <p>TO ORDER OR ADD TO RACK ENTER DETAILS BELOW: </p>
      <form method="post" action="order.php">
        <input type="hidden" name="shoe_name" value="Ultraboost">
        <label for="size">Size(36-42):</label>
          <input type="number" id="shoe_size" name="shoe_size" min="36"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="shoe_quantity" name="shoe_quantity" min="1"><br>
        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" ><br>
        <button type="submit" class="order-now" name="action" value="order">Order Now</button>
        <button type="submit" class="add-to-rack" name="action" value="rack">Add to Rack</button>
      </form>
    </div>

    <div class="product">
      <img src="images/highheels.gif" alt="Product 5">
      <h2>High Heels</h2>
      <h2>Rs.2000/-</h2>
      <p>High heels have been a fashion staple for women for centuries, and for good reason. They are the perfect way to
        add height, confidence, and style to any outfit.</p>
      <p>TO ORDER OR ADD TO RACK ENTER DETAILS BELOW: </p>
      <form method="post" action="order.php">
        <input type="hidden" name="shoe_name" value="highheels">
        <label for="size">Size(36-42):</label>
          <input type="number" id="shoe_size" name="shoe_size" min="36"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="shoe_quantity" name="shoe_quantity" min="1"><br>
        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" ><br>
        <button type="submit" class="order-now" name="action" value="order">Order Now</button>
        <button type="submit" class="add-to-rack" name="action" value="rack">Add to Rack</button>
      </form>
    </div>
  </section>
  <section class="hotpick" id="hotpicks">
    <fieldset>
      <h1>HOT PICKS FOR TODAY</h1>
      <div class="productz">
        <img src="images/j4oreo.gif" alt="Product 6">
        <h2>AIR JORDAN 4'S OREO WHITE</h2>
        <h2><s>Rs.4500/-</s> Rs.3750/-</h2>
        <p>The Air Jordan 4s Oreo White with their sleek design and clean colorway are a must-have for any sneakerhead.
        </p>
        <p>TO ORDER OR ADD TO RACK ENTER DETAILS BELOW: </p>
        <form method="post" action="order.php">
        <input type="hidden" name="shoe_name" value="j4_oreo">
        <label for="size">Size(36-42):</label>
          <input type="number" id="shoe_size" name="shoe_size" min="36"><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="shoe_quantity" name="shoe_quantity" min="1"><br>
        <label for="phone">Phone number:</label>
        <input type="number" id="phone" name="phone" ><br>
        <button type="submit" class="order-now" name="action" value="order">Order Now</button>
        <button type="submit" class="add-to-rack" name="action" value="rack">Add to Rack</button>
      </form>
      </div>
    </fieldset>
  </section>
</body>

</html>