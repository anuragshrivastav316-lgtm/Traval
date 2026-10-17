<?php
$conn = new mysqli("sql202.infinityfree.com", "if0_40482293", "CG2tSMyU8YU", "if0_40482293_book");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $role = $_POST['role'];
    $rating = $_POST['rating'];
    $review = $_POST['review_text'];

    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);

    $conn->query("INSERT INTO reviews(name,role,rating,review_text,image) 
                  VALUES('$name','$role','$rating','$review','$image')");

    header("Location: about-page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Review</title>
<style>
form{
    width: 400px;
    margin: auto;
    background: #d8d2c2;
    padding: 20px;
    margin-top: 40px;
    border-radius: 8px;
}
input, textarea, select{
    width: 100%;
    padding: 8px;
    margin-top: 10px;
}
button{
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: purple;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
</head>
<body>

    
 <?php
     include 'navbar.php';
    ?>


<form method="POST" enctype="multipart/form-data">
<h2>Add Review</h2>

<input type="text" name="name" placeholder="Name" required>
<input type="text" name="role" placeholder="Role (Traveler)" required>

<select name="rating" required>
    <option value="">Select Rating</option>
    <option value="5">5 ★</option>
    <option value="4">4 ★</option>
    <option value="3">3 ★</option>
    <option value="2">2 ★</option>
    <option value="1">1 ★</option>
</select>

<textarea name="review" placeholder="Enter review..." required></textarea>

<input type="file" name="image" required>

<button type="submit" name="submit">Save</button>

</form>

</body>
</html>