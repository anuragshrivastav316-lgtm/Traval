<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Delete review if button clicked
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $conn->query("DELETE FROM reviews WHERE id = $id");
}

// Fetch all reviews
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Reviews</title>

<style>
    body{
        background: #e6d6c4;
        font-family: Arial, sans-serif;
        margin: 0;
    }

    h1{
        text-align: center;
        font-size: 35px;
        margin: 30px 0;
    }

    .review-container{
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 15px;
        padding: 20px;
    }

    .review-box{
        background: #d8ccb9;
        border: 1px solid #aaa;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .stars{
        color: purple;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .review-text{
        font-style: italic;
        font-size: 15px;
        color: #444;
        margin-bottom: 15px;
    }

    .name{
        font-weight: bold;
        font-size: 18px;
    }

    .role{
        color: purple;
        font-size: 15px;
        margin-bottom: 10px;
        display: block;
    }

    .profile{
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        margin-top: 10px;
        border: 2px solid #fff;
    }

    .btn{
        width:100px;
        margin-top:1.5rem;
        padding:12px;
        font-size:1rem;
        cursor:pointer;
        background: #7d308e79;
        color: #fff;
        border:none;
        border-radius:5px;
        transition:.3s;
        margin-left:8vh;
        margin-bottom:6vh;
    }

    .btn:hover{
        background: #2e2e2d;
    }

    .delete-btn{
        background:#b51f1f;
        color:#fff;
        border:none;
        padding:8px 15px;
        cursor:pointer;
        border-radius:5px;
        margin-top:12px;
    }

    .delete-btn:hover{
        background:#7a0f0f;
    }
</style>
</head>
<body>

<?php
     include 'admin-navbar.php';
    ?>

<h1>Traveler Reviews</h1>

<div class="review-container">

<?php while($row = $result->fetch_assoc()){ ?>
<div class="review-box">

    <div class="stars">
        <?php for($i=1; $i <= $row['rating']; $i++) echo "★"; ?>
        <?php for($i=$row['rating']; $i < 5; $i++) echo "☆"; ?>
    </div>

    <p class="review-text">"<?php echo $row['review_text']; ?>"</p>

    <p class="name"><?php echo $row['name']; ?></p>

    <span class="role"><?php echo $row['role']; ?></span>

    <img src="uploads/<?php echo $row['image']; ?>" class="profile">

    <!-- Delete Button -->
    <form method="POST" onsubmit="return confirm('Delete this review?');">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" name="delete" class="delete-btn">Delete</button>
    </form>

</div>
<?php } ?>

</div>

<div>
 <button class="btn"><a href="Add-review.php" style="color:white; text-decoration:none;">Review</a></button>
</div>

</body>
</html>