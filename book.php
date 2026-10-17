<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<style>

:root{
    --main:#ff9800;
    --black:#222;
    --white:#fff;
    --gray:#777;
    --bg:#f5f5f5;
    --border:.1rem solid #ccc;
}

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#fafafa;
}

.heading{
    padding:6rem 2rem;
    text-align:center;
    background-size:cover;
    background-position:center;
}

.heading h1{
    color:#fff;
    font-size:5rem;
}

.booking{
    max-width:900px;
    margin:50px auto;
    padding:20px;
}

.heading-title{
    text-align:center;
    font-size:2rem;
    color:var(--black);
    margin-bottom:25px;
    text-transform:capitalize;
}

.book-form{
    background:#fff;
    padding:2rem;
    border-radius:8px;
    box-shadow:0 0 12px rgba(0,0,0,0.1);
}

.book-form .flex{
    display:flex;
    flex-wrap:wrap;
    gap:4rem;
}

.book-form .inputBox{
    flex:1 1 45%;
}

.book-form .inputBox span{
    font-size:1rem;
    color:var(--black);
}

.book-form .inputBox input{
    width:100%;
    margin-top:.7rem;
    padding:1rem;
    font-size:1rem;
    border:var(--border);
    border-radius:5px;
    outline:none;
    color:var(--black);
}

.book-form .inputBox input:focus{
    border:.1rem solid #7f44b6ff;
}

.btn{
    width:100px;
    margin-top:1.5rem;
    padding:12px;
    font-size:1rem;
    cursor:pointer;
    background: #7f44b6ff;
    color:#fff;
    border:none;
    border-radius:5px;
    transition:.3s;
}

.btn:hover{
    background:#2e2e2dff;
}

@media(max-width:600px){
    .book-form .inputBox{
        flex:1 1 100%;
    }
}

</style>

</head>
<body oncontextmenu="return false;">

<?php include 'navbar.php'; ?>
<?php include 'Show.php'; ?>

<section class="booking">

<h1 class="heading-title">book your trip!</h1>

<?php
// Database connection
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");

if ($conn->connect_error) {
    die("<p style='color:red;text-align:center;'>Database connection failed</p>");
}

if(isset($_POST['send'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $request = "INSERT INTO book_form(name,email,phone,address,location,guests,arrivals,leaving)
                VALUES('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";
    
    if($conn->query($request) === TRUE){
        echo "<p style='color:green;text-align:center;'>Booking submitted successfully</p>";
    } else {
        echo "<p style='color:red;text-align:center;'>Something went wrong</p>";
    }
}
?>

<form action="" method="post" class="book-form">

<div class="flex">
    <div class="inputBox">
        <span>Name</span>
        <input type="text" placeholder="Enter your name" name="name" required>
    </div>
    <div class="inputBox">
        <span>Email</span>
        <input type="email" placeholder="Enter your email" name="email" required>
    </div>
    <div class="inputBox">
        <span>Phone</span>
        <input type="number" placeholder="Enter your number" name="phone" required>
    </div>
    <div class="inputBox">
        <span>Address</span>
        <input type="text" placeholder="Enter your address" name="address" required>
    </div>
    <div class="inputBox">
        <span>Where to</span>
        <input type="text" placeholder="Place you want to visit" name="location" required>
    </div>
    <div class="inputBox">
        <span>Guests</span>
        <input type="number" placeholder="How many guests" name="guests" required>
    </div>
    <div class="inputBox">
        <span>Arrival date</span>
        <input type="date" name="arrivals">
    </div>
    <div class="inputBox">
        <span>Leaving date</span>
        <input type="date" name="leaving">
    </div>
</div>

<input type="submit" value="Submit" class="btn" name="send">

</form>

</section>

<?php include 'footer.php'; ?>

</body>
</html>