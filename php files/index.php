<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>ShoeRacks</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="favicon" type="image" href="shoesrackslogo.png">
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
  <main>
    <h1>ShoeRacks</h1>
    <p>ShoesRacks has the widest variety of hottest sneakers and shoes in the game and even a platform to resell your
      valuable shoes at a great rate.</p>
    <div class="item_section layout_padding2">
      <div class="container">
        <div class="item_container">
          <div class="box">
            <div class="price">
              <h6>
                Best PRICE
              </h6>
            </div>
            <a href="collection.html" target="_blank">
              <div class="img-box">
                <img src="images/hypebeast1.gif" alt="">
              </div>
            </a>
            <div class="name">
              <h5>
                Hypebeasts
              </h5>
            </div>
          </div>
          <div class="box">
            <div class="price">
              <h6>
                Best PRICE
              </h6>
            </div>
            <a href="collection.html" target="_blank">
              <div class="img-box">
                <img src="images/sneakers1.gif" alt="">
              </div>
            </a>
            <div class="name">
              <h5>
                Sneakers
              </h5>
            </div>
          </div>
          <div class="box">
            <div class="price">
              <h6>
                Best PRICE
              </h6>
            </div>
            <a href="collection.html" target="_blank">
              <div class="img-box">
                <img src="images/womenshoes1.gif" alt="">
              </div>
            </a>
            <div class="name">
              <h5>
                Women Collection
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="abb">
      <a href="collection.html"><button>Shop Now</button></a>
      <a href="resell.html"><button>Resell here</button> </a>
    </section>
    <section class="about">
      <div class="design-box">
        <img src=" " alt="">
      </div>
      <div class="detail-box">
        <div class="heading_container">
          <h2>
            About ShoeRacks
          </h2>
        </div>
        <p>
          Welcome to ShoeRacks, the ultimate online platform for shoe lovers who value great prices, top quality, and
          convenience. At ShoeRacks, we make it easy for you to buy and resell shoes from the comfort of your own home.

          We understand that shoes are not just a necessity, but a way of life. That's why we're committed to providing
          you with a wide selection of high-quality shoes from top brands, at prices that won't break the bank.

          But ShoeRacks isn't just about buying shoes - it's also about selling them. We believe that everyone should
          have the opportunity to make money from their gently used or new shoes, and that's why we make it easy to
          resell your shoes on our platform. You can list your shoes for sale, set your own prices, and let our
          community of shoe enthusiasts discover your collection.

          At ShoeRacks, we're all about making the shoe buying and reselling experience as smooth and convenient as
          possible.
          So what are you waiting for? Join the ShoeRacks community today and start buying and reselling shoes with
          ease. Thank you for choosing ShoeRacks, where shoe love meets convenience.
        </p>
        <div>
          <a href="">
            Read More
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
      </div>
      </div>
      </div>
    </section>

    <section class="shoes_section layout_padding">
      <div class="design-box">
        <img src="images/design-1.png" alt="">
      </div>
      <div class="container">
        <div class="shoes_container layout_padding2">
          <div class="row">
            <div class="col-md-5">
              <div class="detail-box">
                <h4>
                  SPECIAL
                </h4>
                <h2>
                  HOT PICKS FOR TODAY
                </h2>
                <a href="collection.html#hotpicks">
                  Buy Now
                </a>
              </div>
            </div>
            <div class="col-md-7">
              <div class="img-box">
                <img src="images/j4oreo.gif" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact_section layout_padding">
      <div class="design-box">
        <img src="images/design-2.png" alt="">
      </div>
      <div class="container ">
        <div class="">
          <h2 class="">
            Contact Us
          </h2>
        </div>

      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <form action="contact.php" method="POST">
              <div>
                <input type="text" placeholder="Name" name="name">
              </div>
              <div>
                <input type="email" placeholder="Email" name="email">
              </div>
              <div>
                <input type="text" placeholder="Phone" name="phone">
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" name="message">
              </div>
              <div class="butt">
                <button type="submit" name="send">
                  SEND
                </button>
              </div>
            </form>
          </div>

          <div class="info_form">
            <div class="d-flex justify-content-center">
              <h5 class="info_heading">
                Newsletter
              </h5>
            </div>
            <form action="newsletter.php" method="POST">
              <div class="email_box">
                <label for="email2">Enter Your Email</label>
                <input type="text" name="email">
              </div>
              <div class="butt">
                <button type="submit" name="subscribe">
                  subscribe
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <div class="follow-us">
      <h2>Follow Us</h2>
      <p>Stay connected with us on social media:</p>
      <ul class="social-media-icons">
        <li><a href="https://www.instagram.com"><img src="images/instagram.svg" alt="Instagram"></a>
        </li>
        <li><a href="https://www.tiktok.com"><img src="images/tiktok.svg" alt="TikTok"></a></li>
        <li><a href="https://www.facebook.com"><img src="images/facebook.svg" alt="Facebook"></a></li>
      </ul>
    </div>

    </section>
    <section class="info-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="logo">
              <img src="images/shoesrackslogo.png" alt="Company Logo">
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-item">
              <img src="images/geo-alt.svg" class="fas fa-map-marker-alt"></i>
              <span>Durbarmarg,Kathmandu,Nepal</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-item">
              <img src="images/telephone.svg" class="fas fa-phone"></img>
              <span>0114926969</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-item">
              <img src="images/envelope-at.svg" class="fas fa-envelope"></img>
              <span>shoeracks777@gmail.com</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container-fluid footer_section">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="">ShoeRacks Team 2023</a>
      </p>
    </section>
  </main>
</body>

</html>