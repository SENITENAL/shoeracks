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
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoeracks";


$conn = new mysqli($servername, $username, $password, $dbname);
$uname = "";
$email = "";
$location = "";
$phone = "";
$username = $_SESSION['username'];

$sql = "SELECT username, email, location, phone, upicturepath FROM users WHERE username='$username'";
?>
<form action="">
            <table class="table table-hover table-bordered" width="900px" style="text-align: center">
                <tr>
                    <th>ProfilePicture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Phone number</th>
                    <th>Modify</th>
                </tr>
                <?php
                    $run_sql = mysqli_query($conn, $sql);
                    WHILE ($row = mysqli_fetch_assoc($run_sql)){
                        $path = $row['upicturepath'];
                        $uname = $row['username'];
                        $email = $row['email'];
                        $location = $row['location'];
                        $phone =$row['phone'];

                        ?>
                        <tr>
                            <td><?php echo "<img src='" . $path . "' height='100' width='100'>";?></td>
                            <td><?php echo $uname;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $location;?></td>
                            <td><?php echo $phone;?></td>
                            <td><button><a href="addinfo.php">Click to edit</button></td>
                        </tr><?php
              }
                              ?>
            </table>
        </form>
  <a href="logout.php"><button>Logout</button></a>
</body>
</html>