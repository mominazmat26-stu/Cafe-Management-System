<?php
include '../config/db.php';

if (isset($_POST['submit'])) {

    /* =========================
       CUSTOMER
    ==========================*/
    $full_name = $_POST['full_name'];
    $phone_no  = $_POST['phone_no'];
    $email     = $_POST['email'];
    $quantity  = $_POST['quantity'];

    $sql = "INSERT INTO customers (full_name, phone_no, email, quantity)
            VALUES ('$full_name', '$phone_no', '$email', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        $customer_id = $conn->insert_id;
    } else {
        die("Customer Error: " . mysqli_error($conn));
    }

    /* =========================
       ORDERS
    ==========================*/
    $total = $_POST['total'];

    $sql2 = "INSERT INTO orders (customer_id, total)
             VALUES ('$customer_id', '$total')";

    if (mysqli_query($conn, $sql2)) {
        $order_id = $conn->insert_id;
    } else {
        die("Order Error: " . mysqli_error($conn));
    }

    /* =========================
       PRODUCTS
    ==========================*/
    $product_name = $_POST['product_name'];
    $category     = $_POST['category'];
    $price        = $_POST['price'];
    $stock        = $_POST['stock'];

    $sql3 = "INSERT INTO products (product_name, category, price, stock)
             VALUES ('$product_name', '$category', '$price', '$stock')";

    if (!mysqli_query($conn, $sql3)) {
        die("Product Error: " . mysqli_error($conn));
    }

    /* =========================
       USERS
    ==========================*/
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql4 = "INSERT INTO users (user_name, user_email, password, role)
             VALUES ('$user_name', '$user_email', '$password', '$role')";

    if (!mysqli_query($conn, $sql4)) {
        die("User Error: " . mysqli_error($conn));
    }

    $message = "All records added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cafe Management System</title>
    <link rel="stylesheet" href="style.css">

    <style>
        /* Body & Headings */
        body {
            font-family: 'Verdana', Geneva, Tahoma, sans-serif;
            background-color: #f0f8ff; /* Alice blue */
            color: #4b2e83; /* deep purple */
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #ff6f61; /* Coral red */
            text-shadow: 1px 1px 2px #d4a5a5;
        }

        h2 {
            color: #9d4edd; /* Medium purple */
            margin-top: 20px;
            border-bottom: 2px solid #fcd5ce; /* soft peach underline */
            padding-bottom: 5px;
        }

        /* Form Styling */
        form {
            width: 650px;
            margin: 0 auto;
            background-color: #fff0f5; /* lavender blush */
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(155, 89, 182, 0.3);
        }

        label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
            color: #6a0572; /* deep magenta */
        }

        input {
            margin-bottom: 12px;
            padding: 8px;
            width: 220px;
            border-radius: 6px;
            border: 1px solid #c08497; /* muted pink border */
            background-color: #fce4ec; /* soft pink background */
        }

        input[type=submit] {
            background-color: #7b2cbf; /* deep purple */
            color: #ffe8d6; /* soft cream */
            font-weight: bold;
            cursor: pointer;
            width: 150px;
            transition: 0.3s;
        }

        input[type=submit]:hover {
            background-color: #9d4edd; /* lighter purple on hover */
        }

        /* Success Message */
        .message {
            color: #ff9f1c; /* orange */
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            form {
                width: 90%;
                padding: 15px;
            }

            label, input {
                width: 100%;
                display: block;
            }

            input {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>

<h1>Cafe Management System</h1>

<?php if (isset($message)) { ?>
    <p class="message"><?php echo $message; ?></p>
<?php } ?>

<form method="POST" action="Create.php">

    <h2>Customer</h2>
    <label>Full Name:</label>
    <input type="text" name="full_name" required><br>

    <label>Phone:</label>
    <input type="text" name="phone_no" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Quantity:</label>
    <input type="number" name="quantity" required><br>

    <h2>Order</h2>
    <label>Order Name:</label>
    <input type="text" name="order_name" required><br>
    
    <label>Total:</label>
    <input type="number" name="total" required><br>

    <h2>Product</h2>
    <label>Product Name:</label>
    <input type="text" name="product_name" required><br>

    <label>Category:</label>
    <input type="text" name="category" required><br>

    <label>Price:</label>
    <input type="number" name="price" required><br>

    <label>Stock:</label>
    <input type="number" name="stock" required><br>

    <h2>User</h2>
    <label>User Name:</label>
    <input type="text" name="user_name" required><br>

    <label>Email:</label>
    <input type="email" name="user_email" required><br>

    <label>Password:</label>
    <input type="text" name="password" required><br>

    <label>Role:</label>
    <input type="text" name="role" required><br>

    <input type="submit" name="submit" value="Add Record">
</form>

</body>
</html>