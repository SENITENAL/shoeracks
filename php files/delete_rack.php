<?php
require("dbConn.php");
require("loginchecker.php");

// Get order ID from URL parameter
$order_id = $_GET["id"];


    $sql = "DELETE FROM rack WHERE order_id = '$order_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Order deleted successfully.";
    } else {
        echo "Error deleting order: " . mysqli_error($conn);
    }
 
// Close database connection
mysqli_close($conn);

?>
