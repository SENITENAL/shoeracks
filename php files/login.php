<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="shoeracks";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    die("Connection failed:".mysqli_connect_error());

    session_start();
        if (isset($_POST['login'])) {
            $username = $_POST['uname'];
            $password = $_POST['password'];
        $sql = "SELECT username, password FROM users WHERE username='$username'";
            $run_sql = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($run_sql)){
                if($row['username'] == $_POST['uname']){
                    if($row['password'] == $_POST['password']){
                        $_SESSION['logged_in'] = true ;
                        $_SESSION['username'] = $row['username'];
                        header("Location:addinfo.php");
                    }
                    else {
                       echo "Invalid username or password";
                    ?> <br><a href="login.html"><button>Back to Login </button></a> <?php
                    }
                }
            }
        }
?>
