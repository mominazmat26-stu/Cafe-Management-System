<?php
include "../config/db.php";

$customer_id= $_GET['customer_id'];
mysqli_query($conn, "DELETE FROM customers WHERE customer_id=$customer_id");
mysqli_query($conn, "DELETE FROM orders WHERE customer_id=$customer_id");
mysqli_query($conn, "DELETE FROM products WHERE customer_id=$customer_id");
mysqli_query($conn, "DELETE FROM users WHERE customer_id=$customer_id");

header("Location: index.php");
?>