<?php
session_start();
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Logout
if(isset($_GET['logout'])){
    session_destroy();
    header("location: admin.php");
    exit();
}

// Login
$message = "";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "anurag" && $password == "radheradhe@70520"){
        $_SESSION['admin'] = $username;
    } else {
        $message = "Wrong username or password";
    }
}

// Delete Booking
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM book_form WHERE id=$id");
    header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<!-- 
<link rel="stylesheet" href="style.css"> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

    

    body{
        background: url('image/back3 - Copy.jpg') no-repeat;";
    }

    .icon {
        font-size: 60px;
        margin-bottom: 15px;
    }

    td{
        color: #140cfdbe;
    }
       .logo{
        font-size: 2.5rem;
        font-weight: bold;
    }
    .admin-container{
        width: 95%;
        margin: auto;
        padding: 20px;
    }

    table{
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td{
        padding: 10px;
        border: 1px solid #0d00fcfb;
        text-align: center;
    }

    table th{
        background: #333;
        color: #fa0707b9;
    }

    .delete-btn{
        background: red;
        color: white;
        padding: 6px 10px;
        border-radius: 5px;
        text-decoration: none;
    }

    .login-box{
        width: 300px;
        margin: 180px auto;
        background: white;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        background: #e6d8c324;
    }

    .login-box input{
        width: 90%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-box button{
        width: 100%;
        padding: 10px;
        background: #333;
        color: white;
        border: none;
        margin-top: 15px;
        border-radius: 6px;
        cursor: pointer;
    }
</style>
</head>
<body  oncontextmenu="return false;">

<?php if(!isset($_SESSION['admin'])) { ?>

<!-- LOGIN FORM -->
<div class="login-box">
      <i class="fas fa-user-secret icon"></i>
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button name="login">Login</button>
    </form>
    <p style="color:red;"><?php echo $message; ?></p>
</div>

<?php } else { ?>

    <?php
     include 'admin-navbar.php';
    ?>

<!-- ADMIN PANEL -->
<!-- <section class="header">
    <a class="logo">Admin</a>
    <nav class="navbar">
        <a href="index.php">Website</a>
        <a href="admin.php?logout=true">Logout</a>
    </nav>
</section> -->
<!-- <div class="heading" style="background: url(./image/back3.jpg) no-repeat">
    <h1>Admin here!</h1>
</div> -->







<div class="admin-container">
    <!-- <h1>Booking Records</h1> -->
    <h1 class="headung-title">Booking Records</h1>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
            <th>Address</th><th>Location</th><th>Guests</th>
            <th>Arrival</th><th>Leaving</th><th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM book_form");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['address']."</td>
                <td>".$row['location']."</td>
                <td>".$row['guests']."</td>
                <td>".$row['arrivals']."</td>
                <td>".$row['leaving']."</td>
                <td><a class='delete-btn' href='admin.php?delete=".$row['id']."' onclick='return confirm(\"Delete?\")'>Delete</a></td>
                </tr>";
                
            }
        } else {
            echo "<tr><td colspan='10'>No data found</td></tr>";
        }
        ?>
    </table>
</div>

<?php } ?>

</body>
</html>