<?php
// ===============================
// Include database connection
// ===============================
include '../config/db.php';  

// Initialize message variable
$message = "";

if(isset($_POST['submit'])) {

    $order_id = $conn->insert_id;

    $full_name = $_POST['full_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $created_at = $_POST['created_at'];

    $sql = "INSERT INTO customers (full_name, phone_no, email, created_at) VALUES ('$full_name', '$phone_no', '$email', '$created_at')";

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
    <link rel="stylesheet" href="style.css">

    <style>
        /* General Body */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f1f8; 
            color: #3e2f5b; 
            margin: 20px;
        }

        h2 {
            color: #9469a0ff; 
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
        }

        /* Buttons */
        button a {
            text-decoration: none;
            color: #fff8e7; 
            background-color: #7b2cbf; 
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        button a:hover {
            background-color: #9d4edd; 
        }

        button {
            border: none;
            margin-bottom: 15px;
            cursor: pointer;
        }

        /* Message */
        .message {
            color: #000000ff; 
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Table Styling */
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto 30px auto;
            background-color: #f7c5ffff; 
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(123, 44, 191, 0.25);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e6d3f3;
        }

        th {
            background-color: #7b2cbf; 
            color: #ffe8d6; 
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f3d9fa; 
        }

        tr:hover {
            background-color: #ffc6ff; 
        }

        a {
            color: #dda7ffff; 
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #e9a2ffff; 
        }

        /* Form Inputs */
        input[type=text],
        input[type=email],
        input[type=date],
        input[type=number] {
            padding: 8px;
            width: 200px;
            border-radius: 6px;
            border: 1px solid #9d4edd; 
            margin: 4px 0;
            background-color: #fff1f3; 
        }

        input[type=submit] {
            padding: 8px 15px;
            background-color: #7b2cbf; 
            color: #e1a0ffff; 
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        input[type=submit]:hover {
            background-color: #9d4edd; /* lighter purple */
        }

        /* Responsive Table */
        @media screen and (max-width: 768px) {
            table, th, td {
                width: 100%;
                display: block;
            }

            tr {
                margin-bottom: 15px;
                display: block;
            }

            th, td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            th::before, td::before {
                position: absolute;
                left: 10px;
                width: 45%;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            th::before { content: attr(data-th); }
            td::before { content: attr(data-th); }
        }
        .logo-container {
    text-align: center;
    margin-top: 20px;
}

.cafe-icon {
    font-size: 50px;
    background: #6c5ce7; /* Purple */
    color: white;
    width: 80px;
    height: 80px;
    line-height: 80px;
    border-radius: 50%; /* Makes it a circle */
    display: inline-block;
    margin-bottom: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.cafe-name {
    display: block;
    font-size: 28px;
    font-weight: bold;
    color: #792379ff; 
    letter-spacing: 2px;
    text-transform: uppercase;
}
    </style>
    
</head>
<body>

<div class="logo-container">
    <div class="cafe-icon">☕</div>
    <span class="cafe-name">Cafe Management System</span>
</div>
<hr style="border: 1px solid #5b09a7ff; width: 80%; margin: 20px auto;">

<button><a href="http://localhost/cafe_management_system/public/Create.php">Add new Customers</a></button>

<!-- Display message -->
<?php if($message != "") { echo "<p class='message'>$message</p>"; } ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>".$row['customer_id']."</td>
                    <td>".$row['full_name']."</td>
                    <td>".$row['phone_no']."</td>
                    <td>".$row['email']."</td>
                    <td><a href='update.php?customer_id=".$row['customer_id']."'>Edit</a></td>
                    <td><a href='delete.php?customer_id=".$row['customer_id']."'>Delete</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
