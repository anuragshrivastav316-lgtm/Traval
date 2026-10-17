

<?php  
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);  

// Delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM packages WHERE id=$id");
    header("Location: manage-packages.php");
    exit();
}

$result = $conn->query("SELECT * FROM packages");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Package</title>
<style>
body{
    background: #eadbc8;
    font-family: Arial, sans-serif;
    margin: 0;
}

.btn{
    width:100px;
    margin-top:1.5rem;
    padding:12px;
    font-size:1rem;
    cursor:pointer;
    background: #7f44b6ff;
    color: #fff;
    border:none;
    border-radius:5px;
    transition:.3s;
    text-decoration: none;
     margin-bottom:1.5rem;
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


h1{
    text-align: center;
    margin-top: 20px;
}
.add-btn{
    display: block;
    width: 180px;
    margin: 20px auto;
    background: purple;
    color: white;
    padding: 12px;
    text-align: center;
    border-radius: 6px;
    text-decoration: none;
    font-size: 18px;
}
.container{
    max-width: 1200px;
    margin: auto;
    display: grid;
    gap: 20px;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    padding: 20px;
}
.card{
    background: #d8d2c2;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 6px 15px rgba(0,0,0,0.2);
    text-align: center;
}
.card img{
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.card h3{
    margin-top: 10px;
    font-size: 22px;
}
.card p{
    color: #555;
    padding: 0 15px;
}
.btn-group{
    margin: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
}
.btn{
    padding: 8px 14px;
    border: none;
    cursor: pointer;
    color: white;
    border-radius: 4px;
}
.edit{ background: #6c47ff; }
.delete{ background: #c0392b; }
</style>
</head>
<body>


    <?php
     include 'navbar.php';
    ?>

<!-- <div class="heading" style="background:url('image/back3 - Copy.jpg') no-repeat;">
    <h1>PACKAGE</h1>
</div>

<h1>our packages</h1> -->
<?php
include 'Show.php';
?>

<div class="container">
<?php while($row = $result->fetch_assoc()){ ?>
<div class="card">
    <img src="uploads/<?php echo $row['image']; ?>" alt="">
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['description']; ?></p>
    <a href="book.php" class="btn">Book Now </a> <br>
    <br>
           
</div>
<?php } ?>

 
</div>

<!-- 
<div>
    <a href="book.php" class="btn">Book Now </a>
</div> -->


    
 <?php
     include 'footer.php';
    ?>



</body>
</html>