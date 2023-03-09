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

  <h1>ADD FOLLOWING INFORMATION TO BEGIN YOUR SHOE JOURNEY</h1>
  <form method="POST" action="add.php" enctype="multipart/form-data">
    <label for="picture">Add Profile Picture:</label>
    <input type="file" id="pfpicture" name="pfpicture" accept="image/*" onchange="previewImage(event)">

 <label for="location">Add Location:</label>
  <input type="text" id="location" name="location" required><br>

  <label for="email">Add Email:</label>
  <input type="email" id="email" name="email" required><br>

    <div>
      <img id="preview" src="#" alt="Preview" style="display: none; max-width: 300px;">
    </div>
    
    <div class="butt">
    <button type="submit">Add</button>
    </div>
</form>
</body>
</html>

