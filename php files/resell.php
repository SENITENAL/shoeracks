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
  <script>
    function previewImage(event) {
      const input = event.target;
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const preview = document.getElementById('preview');
          preview.setAttribute('src', e.target.result);
          preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

  <h1>RESELL YOUR SHOES AT YOUR DESIRED PRICE</h1>
  <form method="POST" action="insert_shoes.php" enctype="multipart/form-data">
    <label for="picture">Picture:</label>
    <input type="file" id="picture" name="picture" accept="image/*" onchange="previewImage(event)">

    <label for="name">Shoes Name:</label>
    <input type="text" id="name" name="name">

    <label for="price">Expected Price:</label>
    <input type="number" id="price" name="price">

    <label for="period">Used for:</label>
    <input type="text" id="period" name="period">

    <label for="condition">Condition:</label>
    <select id="condition" name="condition">
      <option value="brand-new">Brand New</option>
      <option value="like-new">Like New</option>
      <option value="used">Used</option>
    </select>

    <div>
      <img id="preview" src="#" alt="Preview" style="display: none; max-width: 300px;">
    </div>
    
    <div class="butt">
    <button type="submit">Submit</button>
    </div>
  </form>
   <h1>SHOES AVAILABE ON RESELL</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoeracks";


$conn = new mysqli($servername, $username, $password, $dbname);
$name = "";
$price = "";
$period = "";
$condition = "";

$sql = "SELECT name, price,period,'condition',picturepath FROM shoes"; 
?>
<form action="">
            <table class="table table-hover table-bordered" width="900px" style="text-align: center">
                <tr>
                    <th>Picture</th>
                    <th>Shoes name</th>
                    <th>Shoes price</th>
                    <th>Shoes period</th>
                    <th>Shoes condition</th>
                    <th>CLICK TO ORDER</th>
                </tr>
                <?php
                    $run_sql = mysqli_query($conn, $sql);
                    WHILE ($row = mysqli_fetch_assoc($run_sql)){
                        $path = $row['picturepath'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $period = $row['period'];
                        $condition =$row['condition'];

                        ?>
                        <tr>
                            <td><?php echo "<img src='" . $path . "' height='100' width='100'>";?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo $period;?></td>
                            <td><?php echo $condition;?></td>
                            <td><button><a href="resellbuy.php">Order now</button></td>
                        </tr><?php
              }
                              ?>
            </table>
        </form>
</body>
</html>

