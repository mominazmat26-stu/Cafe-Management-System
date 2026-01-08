<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "cafe_management_system";

    // Create connection
    $conn = mysqli_connect("127.0.0.1", "root", "", "cafe_management_system");


    // Check connection
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
?>