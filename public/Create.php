<?php
    include '../config/db.php';
    if(isset($_POST['submit'])) {

        $order_id = $conn->insert_id;

        // ====== Replace these variables with your own project fields ======
        $full_name = $_POST['full_name'];               // Replace 'name' with your form input name
        $phone_no = $_POST['phone_no'];
        $email = $_POST['email'];             // Replace 'email' with your form input name
        // ==================================================================

        // ====== Replace 'students' with your table name ======
        $sql = "INSERT INTO customers (full_name, phone_no, email) VALUES ('$full_name', '$phone_no', '$email')";
        // =====================================================

        if(mysqli_query($conn, $sql)){
            $message = "Record added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

        $product_id = $conn->insert_id;

        $order_id = $_POST['order_id'];               // Replace 'name' with your form input name
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];             // Replace 'email' with your form input name
        $price = $_POST['price'];   // Replace 'department' with your form input name
        // ==================================================================

        // ====== Replace 'students' with your table name ======
        $sql1 = "INSERT INTO orderitems (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
        // =====================================================

        if(mysqli_query($conn, $sql1)){
            $message = "Record added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

        $customer_id = $_POST['customer_id'];               // Replace 'name' with your form input name
        $order_date = $_POST['order_date'];
        $total = $_POST['total'];             

        // ====== Replace 'students' with your table name ======
        $sql2 = "INSERT INTO orders (customer_id, order_date, total) VALUES ('$customer_id', '$order_date', '$total')";
        // =====================================================

        if(mysqli_query($conn, $sql2)){
            $message = "Record added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

        $name = $_POST['name'];               // Replace 'name' with your form input name
        $category = $_POST['category'];
        $price = $_POST['price'];             // Replace 'email' with your form input name
        $stock = $_POST['stock'];   // Replace 'department' with your form input name
        // ==================================================================

        // ====== Replace 'students' with your table name ======
        $sql3 = "INSERT INTO price (name, category, price, stock ) VALUES ('$name', '$category', '$price', '$stock')";
        // =====================================================

        if(mysqli_query($conn, $sql3)){
            $message = "Record added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

        $name = $_POST['name'];               // Replace 'name' with your form input name
        $email = $_POST['email'];             // Replace 'email' with your form input name
        $password = $_POST['password']; 
        $role = $_POST['role'];  // Replace 'department' with your form input name
        // ==================================================================

        // ====== Replace 'students' with your table name ======
        $sql4 = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        // =====================================================

        if(mysqli_query($conn, $sql4)){
            $message = "Record added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px 12px; text-align: left; }
        form { margin-bottom: 20px; }
        input[type=text], input[type=email], input[type=date], input[type=number] { padding: 6px; margin: 4px 0; width: 200px; }
        input[type=submit] { padding: 6px 12px; }
        .message { color: green; }
    </style>
</head>
<body>

<h1>Cafe Management System</h1>

<!-- ===============================
     Form to add new record
     Replace input fields according to your project fields
================================ -->
<form method="POST" action="Create.php">
    <h2>Customer</h2>
    <label>Name:</label>
    <input type="text" name="full_name" required>  <!-- Replace 'name' -->
    
    <label>Phone Number:</label>
    <input type="text" name="phone_no" required> 

    <label>Email:</label>
    <input type="email" name="email" required> <!-- Replace 'email' -->

    <label>Quantity:</label>
    <input type="number" name="quantity" required> <!-- Replace 'email' -->
    
    <label>Price:</label>
    <input type="number" name="price" required>

    <h2>Orders</h2>
    
    <label>Total:</label>
    <input type="number" name="total" required>

    <h2>Products</h2>
    
    <label>Name:</label>
    <input type="text" name="name" required> 

    <label>Category:</label>
    <input type="text" name="category" required> 
    
    <label>Price:</label>
    <input type="number" name="price" required> <!-- Replace 'email' -->
    
    <label>Stock:</label>
    <input type="number" name="stock" required>

     <h2>Users</h2>
    
    <label>Name:</label>
    <input type="text" name="name" required> 

    <label>Email:</label>
    <input type="email" name="email" required> 
    
    <label>Password:</label>
    <input type="text" name="password" required> <!-- Replace 'email' -->
    
    <label>Role:</label>
    <input type="text" name="role" required>

    <input type="submit" name="submit" value="Add Record">
</form>