<?php
// ===============================
// Include database connection
// ===============================
include '../config/db.php';  // Make sure your db.php has the correct DB connection

// Initialize message variable
$message = "";

if(isset($_POST['submit'])) {

    $order_id = $conn->insert_id;

    // ====== Replace these variables with your own project fields ======
    $full_name = $_POST['full_name'];               // Replace 'name' with your form input name
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];             // Replace 'email' with your form input name
    $created_at = $_POST['created_at'];   // Replace 'department' with your form input name
    // ==================================================================

    // ====== Replace 'students' with your table name ======
    $sql = "INSERT INTO customers (full_name, phone_no, email, created_at) VALUES ('$full_name', '$phone_no', '$email', '$created_at')";
    // =====================================================

    if(mysqli_query($conn, $sql)){
        $message = "Record added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }

}

$sql_fetch = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql_fetch);
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

<h2>Cafe Management System</h2>

<button><a href="http://localhost/cafe_management_system/public/Create.php">Add new Customers</a></button>
<!-- Display message -->
<?php if($message != "") { echo "<p class='message'>$message</p>"; } ?>

<!-- ===============================
     Form to add new record
     Replace input fields according to your project fields
================================ -->
<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="full_name" required>  <!-- Replace 'name' -->
    
    <label>Phone Number:</label>
    <input type="text" name="phone_no" required>

    <label>Email:</label>
    <input type="email" name="email" required> <!-- Replace 'email' -->
    
    <label>Department:</label>
    <input type="text" name="created_at" required> <!-- Replace 'department' -->
    
    <input type="submit" name="submit" value="Add Record">
</form>

<!-- ===============================
     Display table of records
     Replace table headers and $row fields according to your project
================================ -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>         <!-- Replace 'Name' -->
            <th>Phone Number</th>
            <th>Email</th>        <!-- Replace 'Email' -->
            
        </tr>
    </thead>
    <tbody>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['customer_id']."</td>           <!-- Usually 'id', keep same -->
                        <td>".$row['full_name']."</td>        <!-- Replace 'name' with your field -->
                        <td>".$row['phone_no']."</td>
                        <td>".$row['email']."</td>       <!-- Replace 'email' with your field -->
                       
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
