<?php
include "../config/db.php";

$customer_id = $_GET['customer_id'];
$result = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id=$customer_id");
$row = mysqli_fetch_assoc($result) ?? [];

$result1 = mysqli_query($conn, "SELECT * FROM orders WHERE customer_id=$customer_id");
$row1 = mysqli_fetch_assoc($result1) ?? [];

$result2 = mysqli_query($conn, "SELECT * FROM products WHERE customer_id=$customer_id");
$row2 = mysqli_fetch_assoc($result1) ?? [];

$result3 = mysqli_query($conn, "SELECT * FROM users WHERE customer_id=$customer_id");
$row3 = mysqli_fetch_assoc($result3) ?? [];

if (isset($_POST['update'])) {

    /* =========================
       CUSTOMER
    ==========================*/
    $full_name = $_POST['full_name'];
    $phone_no  = $_POST['phone_no'];
    $email     = $_POST['email'];
    $quantity  = $_POST['quantity'];

    mysqli_query($conn, "UPDATE customers SET full_name='$full_name', phone_no='$phone_no', email='$email', quantity='$quantity' WHERE customer_id=$customer_id");

    /* =========================
       ORDERS
    ==========================*/
    $total = $_POST['total'];

    mysqli_query($conn, "UPDATE orders SET total='$total' WHERE customer_id=$customer_id");

    /* =========================
       PRODUCTS
    ==========================*/
    $product_name = $_POST['product_name'];
    $category     = $_POST['category'];
    $price        = $_POST['price'];
    $stock        = $_POST['stock'];

    mysqli_query($conn, "UPDATE products SET product_name='$product_name', category='$category', price='$price', stock='$stock' WHERE customer_id=$customer_id");

    /* =========================
       USERS
    ==========================*/
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];   // same email field used
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($conn, "UPDATE users SET user_name='$user_name', user_email='$user_email', password='$password', role='$role' WHERE customer_id=$customer_id");
    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cafe Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    
</head>
<body>

<h1>Cafe Management System</h1>

<?php if (isset($message)) { ?>
    <p class="message"><?php echo $message; ?></p>
<?php } ?>

<form method="POST" action="update.php?customer_id=<?php echo $customer_id; ?>">

    <h2>Customer</h2>
    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?=$row['full_name'] ?? '' ?>" required><br>

    <label>Phone:</label>
    <input type="text" name="phone_no" value="<?=$row['phone_no'] ?? '' ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?=$row['email'] ?? '' ?>" required><br>

    <label>Quantity:</label>
    <input type="number" name="quantity" value="<?=$row['quantity'] ?? '' ?>" required><br>

    <h2>Order</h2>
    <label>Order Name:</label>
    <input type="text" name="order_name" value="<?=$row1['order_name'] ?? '' ?>" required><br>
    
    <label>Total:</label>
    <input type="number" name="total" value="<?=$row1['total'] ?? '' ?>" required><br>

    <h2>Product</h2>
    <label>Product Name:</label>
    <input type="text" name="product_name" value="<?=$row2['product_name'] ?? '' ?>" required><br>

    <label>Category:</label>
    <input type="text" name="category" value="<?=$row2['category'] ?? '' ?>" required><br>

    <label>Price:</label>
    <input type="number" name="price" value="<?=$row2['price'] ?? '' ?>" required><br>

    <label>Stock:</label>
    <input type="number" name="stock" value="<?=$row2['stock'] ?? '' ?>" required><br>

    <h2>User</h2>
    <label>User Name:</label>
    <input type="text" name="user_name" value="<?=$row3['user_name'] ?? '' ?>" required><br>

    <label>Email:</label>
    <input type="email" name="user_email" value="<?=$row3['user_email'] ?? '' ?>" required><br>

    <label>Password:</label>
    <input type="text" name="password" value="<?=$row3['password'] ?? '' ?>" required><br>

    <label>Role:</label>
    <input type="text" name="role" value="<?=$row3['role'] ?? '' ?>" required><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
